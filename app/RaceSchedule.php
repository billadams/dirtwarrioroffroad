<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceSchedule extends Model
{
    protected $fillable = ['title', 'date', 'gate_open_time', 'practice_start_time', 'rider_meeting_time', 'race_start_time', 'description', 'directions'];
    public $timestamps = false;

    public function RaceClass()
    {
        return $this->hasMany(RaceClass::class);
    }
}
