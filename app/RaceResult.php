<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RaceResult extends Model
{
    protected $fillable = ['name', 'date'];
    protected $dates = ['date'];

    public function positions()
    {
        return $this->hasMany(RaceResultPosition::class, 'race_results_id');
    }

    public function getFormattedDate()
    {
        return Carbon::createFromFormat('m/d/Y', $this->date);
    }

    public function event_results($id)
    {
//        dd($id);
        return $event_results = DB::table('race_results')
            ->select('race_results.name as event_name', 'race_results.date as event_date', 'race_classes.name as class_name', 'race_classes.class_id', 'users.first_name', 'users.last_name', 'race_result_positions.moto_1', 'race_result_positions.moto_2', 'race_result_positions.overall')
            ->join('race_result_positions', 'race_results_id', '=', 'race_results.id')
            ->join('race_classes', 'race_classes.class_id', '=', 'race_result_positions.race_class_id')
            ->join('users', 'users.racer_id', '=', 'race_result_positions.racer_id')
//            ->where('race_results.id', '=', ':id')
            ->whereRaw('race_results.id = :id', ['id' => $id])
            ->orderBy('race_classes.name')
//            ->setBindings(['id' => $id])
            ->get();
    }
}
