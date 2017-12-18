<?php

namespace App\Helpers\Database;

use App\RaceResult;
use App\ResultPlaces;
use App\User;
use App\RaceClass;
use Illuminate\Support\Facades\DB;


class ResultDatabaseHelper
{
    /**
     * Store the results for a particular race.
     *
     * @param $racers
     * @param $race_classes
     * @param $result_places
     *
     * @return void
     */
    public static function add_results($racers, $race_classes, $result_places)
    {
        self::store_racers($racers);
        self::store_classes($race_classes);
        self::store_race_result_places($result_places);
    }

    /**
     * @param $id
     * @param $value
     *
     * @return void
     */
    public static function set_has_results($id, $value)
    {
        $result = RaceResult::find($id);

        $result->has_results = $value;

        $result->save();
    }

    /**
     * Gets race class information from the parsed CSV file.
     *
     * @param $results
     *
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
     *
     * @param $results
     *
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
     *
     * @param $result_places
     * @param $result_id
     *
     * @return array
     */
    public static function get_result_places($result_places, $result_id)
    {
        $row = array();

        foreach ($result_places as $result_place)
        {
            $row[ 'racer_id' ] = $result_place[ 10 ];
            $row[ 'race_results_id' ] = $result_id;
            $row[ 'race_class_id' ] = $result_place[ 7 ];
            $row[ 'moto_1' ] = $result_place[ 5 ];
            $row[ 'moto_2' ] = $result_place[ 6 ];
            $row[ 'overall' ] = $result_place[ 3 ];

            $result_positions[] = $row;
        }

        return $result_positions;
    }

    /**
     * Stores racers in the User table.
     * Checks to see if a record exists, if the record exists,
     * the row from the CSV file is skipped.
     *
     * @param $racers
     *
     * @return void
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
     *
     * @param $race_classes
     *
     * @return void
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
     *
     * @param $result_places
     *
     * @return void
     */
    public static function store_race_result_places($result_places)
    {
        foreach ($result_places as $row)
        {
            ResultPlaces::create([
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
     *
     * @return \Illuminate\Support\Collection
     */
    public static function get_class_results($result_id, $class_id)
    {
        return DB::table('race_results')
            ->select('race_results.id', 'race_results.name as event_name', 'race_results.date as event_date', 'race_classes.name as class_name', 'race_classes.class_id', 'users.first_name', 'users.last_name', 'result_places.moto_1', 'result_places.moto_2', 'result_places.overall')
            ->join('result_places', 'race_results_id', '=', 'race_results.id')
            ->join('race_classes', 'race_classes.class_id', '=', 'result_places.race_class_id')
            ->join('users', 'users.racer_id', '=', 'result_places.racer_id')
            ->where('race_results.id', '=', $result_id)
            ->where('race_classes.class_id', '=', $class_id)
            ->orderBy('race_classes.name')
            ->orderBy('result_places.overall')
            ->get();
    }
}