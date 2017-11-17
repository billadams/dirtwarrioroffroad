<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResultPosition extends Model
{
    public function race_result()
    {
        return $this->belongsTo(RaceResult::class);
    }

    public function race_class()
    {
        return $this->belongsTo(RaceClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
