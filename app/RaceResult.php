<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RaceResult extends Model
{
    protected $fillable = ['name', 'date'];
    protected $dates = ['date'];
    protected $cases = ['has_results' => 'boolean'];

    public function positions()
    {
        return $this->hasMany(ResultPlaces::class, 'race_results_id');
    }

    public function getFormattedDate()
    {
        return Carbon::createFromFormat('m/d/Y', $this->date);
    }

    public function get_event_results($id)
    {
        return DB::table('race_results')
            ->select('race_results.id', 'race_results.name as event_name', 'race_results.date as event_date', 'race_classes.name as class_name', 'race_classes.class_id', 'users.first_name', 'users.last_name', 'result_places.moto_1', 'result_places.moto_2', 'result_places.overall')
            ->join('result_places', 'race_results_id', '=', 'race_results.id')
            ->join('race_classes', 'race_classes.class_id', '=', 'result_places.race_class_id')
            ->join('users', 'users.racer_id', '=', 'result_places.racer_id')
            ->where('race_results.id', '=', $id)
            ->orderBy('race_classes.name')
            ->orderBy('result_places.overall')
            ->get();
    }
}
