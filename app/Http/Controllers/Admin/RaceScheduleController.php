<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RaceSchedule;

class RaceScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('view');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = RaceSchedule::orderBy('date', 'asc')->get();

        return view('admin.schedule.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'date'  => 'required'
        ]);

        RaceSchedule::create([
            'title' => request('title'),
            'date' => request('date'),
            'gate_open_time' => request('gate_open_time'),
            'practice_start_time' => request('practice_start_time'),
            'rider_meeting_time' => request('rider_meeting_time'),
            'race_start_time' => request('race_start_time'),
            'description' => request('description'),
            'directions' => request('directions')
        ]);

        session()->flash('message', 'New race schedule successfully published.');

        return redirect('admin/schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = RaceSchedule::find($id);

        return view('admin.schedule.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'date'  => 'required'
        ]);

        RaceSchedule::where('id', $id)
            ->update([
                'title'               => request('title'),
                'date'                => request('date'),
                'gate_open_time'      => request('gate_open_time'),
                'practice_start_time' => request('practice_start_time'),
                'rider_meeting_time'  => request('rider_meeting_time'),
                'race_start_time'     => request('race_start_time'),
                'description'         => request('description'),
                'directions'          => request('directions')
            ]);

        session()->flash('message', 'Schedule successfully updated.');

        return redirect('admin/schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
