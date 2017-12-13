<?php

namespace App\Http\Controllers;

use App\RaceSchedule;
use Illuminate\Http\Request;

class RaceScheduleController extends Controller
{
    /**
     * Display a public listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $race_events = RaceSchedule::orderBy('date', 'asc')->where('date', '>=', now())->get();

        return view('schedule.index', compact('race_events'));
    }
}
