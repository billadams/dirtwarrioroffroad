<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResultPosition extends Model
{
    protected $fillable = ['racer_id', 'race_results_id', 'race_class_id',
        'moto_1', 'moto_2', 'overall'];

    public function result()
    {
        return $this->belongsTo(RaceResult::class, 'race_results_id');
    }

    public function class()
    {
        return $this->belongsTo(RaceClass::class, 'race_class_id', 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'racer_id', 'racer_id');
    }
}
