<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RaceClass;
use App\RaceResult;


class RaceResultController extends Controller
{
    /**
     * Display a public listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $most_recent_event = RaceResult::where('has_results', '=', 1)->orderBy('date', 'desc')->first();
        $classes = RaceClass::all();

        $race_result = new RaceResult();
        if ($most_recent_event != null)
        {
            $results = $race_result->get_event_results($most_recent_event->id);

            $past_results = RaceResult::where('id', '!=', $most_recent_event->id)->where('has_results', '=', 1)->orderBy('date', 'desc')->get();
        }

        return view('results.index', compact('most_recent_event', 'results', 'classes', 'past_results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  RaceResult $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(RaceResult $event)
    {
        $classes = RaceClass::all();

        $race_result = new RaceResult();
        $results = $race_result->get_event_results($event->id);
        $past_results = RaceResult::where('id', '!=', $event->id)->where('has_results', '=', 1)->orderBy('date', 'desc')->get();
        return view('results.show', compact('results', 'classes', 'event', 'past_results'));
    }

}
