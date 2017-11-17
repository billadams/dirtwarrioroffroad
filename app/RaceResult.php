<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    protected $fillable = ['name', 'date'];

    public function positions()
    {
        return $this->hasMany(RaceResultPosition::class);
    }
}
