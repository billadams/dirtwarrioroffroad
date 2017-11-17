<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceClass extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function positions()
    {
        return $this->hasMany(RaceResultPosition::class);
    }
}