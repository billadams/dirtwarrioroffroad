<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    public function positions()
    {
        return $this->hasMany(RaceResultPosition::class);
    }
}
