<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResultPosition extends Model
{
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
