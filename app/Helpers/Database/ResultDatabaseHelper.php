<?php

namespace App\Helpers\Database;

use App\RaceResult;
use App\RaceResultPosition;
use App\User;
use App\RaceClass;
use Illuminate\Support\Facades\DB;


class ResultDatabaseHelper
{
    public static function get_race_classes($results)
    {
        $race_classes = array();
        $row = array();

        foreach ($results as $result)
        {
            $row[ 'class_id' ] = $result[ 7 ];
            $row[ 'name' ] = $result[ 0 ];

            $race_classes[] = $row;
        }
//        dd($race_classes);
        return $race_classes;
    }

    public static function get_racers($results)
    {
        $racers = array();
        $row = array();

        foreach ($results as $result) {
            $row[ 'first_name' ] = $result[ 1 ];
            $row[ 'last_name' ] = $result[ 2 ];
            $row[ 'racer_id' ] = $result[ 10 ];

            $racers[] = $row;
        }
//        dd($racers);
        return $racers;
    }

    public static function get_race_position_results($results)
    {
        $result_positions = array();
        $row = array();

        foreach ($results as $result)
        {
            $row[ 'racer_id' ] = $result[ 10 ];
            $nextRaceResultsTableID = DB::table('race_results')->max('id') + 1;
            $row[ 'race_results_id' ] = $nextRaceResultsTableID;
            $row[ 'race_class_id' ] = $result[ 7 ];
            $row[ 'moto_1' ] = $result[ 5 ];
            $row[ 'moto_2' ] = $result[ 6 ];
            $row[ 'overall' ] = $result[ 3 ];

            $result_positions[] = $row;
        }
//        dd($result_positions);
        return $result_positions;
    }

    public static function store_racers($racers)
    {
        foreach ($racers as $row)
        {
            $record = User::where('racer_id', '=', $row[ 'racer_id' ])->first();

            if (isset($record->racer_id) && $record->racer_id == $row[ 'racer_id' ]) {
                continue;
            }
            User::create([
                'racer_id' => $row['racer_id'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name']
            ]);
        }
    }

    public static function store_classes($race_classes)
    {
        foreach ($race_classes as $row)
        {
            $record = RaceClass::where('class_id', '=', $row[ 'class_id' ])->first();
//            dd($record->class_id);
            if (isset($record->class_id) &&  $record->class_id == $row['class_id'])
            {
//                dd($class_id);
                continue;
            }
            RaceClass::create([
                'class_id' => $row[ 'class_id' ],
                'name'     => $row[ 'name' ]
            ]);
        }
    }

    public static function store_race_position_results($result_positions)
    {
        // Store the actual race result event.
        foreach ($result_positions as $row)
        {
            RaceResultPosition::create([
                'racer_id' => $row['racer_id'],
                'race_results_id' => $row['race_results_id'],
                'race_class_id' => $row['race_class_id'],
                'moto_1'  => $row['race_class_id'],
                'moto_2' => $row['moto_2'],
                'overall' => $row['overall']
            ]);
        }

    }


}