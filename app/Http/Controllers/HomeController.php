<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Helpers\Database\ResultDatabaseHelper;
use App\RaceClass;
use App\RaceResult;
use App\RaceSchedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gather race results.
        $latest_event = RaceResult::where('has_results', '=', '1')->orderBy('date', 'desc')->first();
        // TODO Loads these with ajax and cycle each class result.
        if ($latest_event) {
            $class = RaceClass::find(84);
            $results = ResultDatabaseHelper::get_class_results($latest_event->id, 84)->take(3);
        }

        // Gather announcements
        $announcements = Announcement::orderby('created_at', 'desc')->get()->take(3);

        // Gather upcoming revents.
        $upcoming_events = RaceSchedule::orderby('date', 'asc')->get()->take(3);

        return view('home', compact('latest_event', 'results', 'announcements', 'upcoming_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
