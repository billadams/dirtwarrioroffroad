<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceClass extends Model
{
    protected $fillable = [ 'class_id', 'name'];
    public $timestamps = false;

    public function positions()
    {
        return $this->hasMany(RaceResultPosition::class, 'race_class_id', 'class_id');
    }
}