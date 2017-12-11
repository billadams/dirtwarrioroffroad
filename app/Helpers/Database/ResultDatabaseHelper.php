<?php

namespace App\Helpers\Database;

use App\RaceResult;
use App\RaceResultPosition;
use App\User;
use App\RaceClass;
use Illuminate\Support\Facades\DB;


class ResultDatabaseHelper
{
    /**
     * Gets race class information from the parsed CSV file.
     * @param $results
     * @return array
     */
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

        return $race_classes;
    }

    /**
     * Gets racer information from the parsed CSV file.
     * @param $results
     * @return array
     */
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

        return $racers;
    }

    /**
     * Gets the position results from the parsed CSV file,
     * as well as related column information to parents.
     * @param $results
     * @return array
     */
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

        return $result_positions;
    }

    /**
     * Stores racers in the User table.
     * Checks to see if a record exists, if the record exists,
     * the row from the CSV file is skipped.
     * @param $racers
     */
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

    /**
     * Stores race classes in the RaceClass table.
     * Checks to see if a record exists, if the record exists,
     * the row from the CSV file is skipped.
     * @param $race_classes
     */
    public static function store_classes($race_classes)
    {
        foreach ($race_classes as $row)
        {
            $record = RaceClass::where('class_id', '=', $row[ 'class_id' ])->first();
            if (isset($record->class_id) &&  $record->class_id == $row['class_id'])
            {
                continue;
            }
            RaceClass::create([
                'class_id' => $row[ 'class_id' ],
                'name'     => $row[ 'name' ]
            ]);
        }
    }

    /**
     * Stores race positions in the RacePosition table.
     * @param $result_positions
     */
    public static function store_race_position_results($result_positions)
    {
        foreach ($result_positions as $row)
        {
            RaceResultPosition::create([
                'racer_id' => $row['racer_id'],
                'race_results_id' => $row['race_results_id'],
                'race_class_id' => $row['race_class_id'],
                'moto_1'  => $row['moto_1'],
                'moto_2' => $row['moto_2'],
                'overall' => $row['overall']
            ]);
        }
    }

    /**
     * Gets the race results of a specific class.
     *
     * @param RaceResult $result_id
     * @param RaceClass $class_id
     * @return \Illuminate\Support\Collection
     */
    public static function get_class_results($result_id, $class_id)
    {
        return DB::table('race_results')
            ->select('race_results.id', 'race_results.name as event_name', 'race_results.date as event_date', 'race_classes.name as class_name', 'race_classes.class_id', 'users.first_name', 'users.last_name', 'race_result_positions.moto_1', 'race_result_positions.moto_2', 'race_result_positions.overall')
            ->join('race_result_positions', 'race_results_id', '=', 'race_results.id')
            ->join('race_classes', 'race_classes.class_id', '=', 'race_result_positions.race_class_id')
            ->join('users', 'users.racer_id', '=', 'race_result_positions.racer_id')
            ->where('race_results.id', '=', $result_id)
            ->where('race_classes.class_id', '=', $class_id)
            ->orderBy('race_classes.name')
            ->orderBy('race_result_positions.overall')
            ->get();
    }
}