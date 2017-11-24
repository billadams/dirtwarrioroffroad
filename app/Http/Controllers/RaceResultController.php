<?php

namespace App\Http\Controllers;

use App\RaceClass;
use Illuminate\Http\Request;
use App\RaceResult;

class RaceResultController extends Controller
{
    /**
     * Display an admin listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = RaceResult::all();

        return view('admin.results.index', compact('results'));
    }

    /**
     * Display a public listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $most_recent_event = RaceResult::orderBy('date', 'desc')->first();
        $classes = RaceClass::all();

        $race_result = new RaceResult();
        $results = $race_result->event_results($most_recent_event->id);
//        dd($results);

        return view('results.index', compact('most_recent_event', 'results', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.results.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'date'  => 'required'
        ]);

        RaceResult::create([
            'name' => request('name'),
            'date'  => request('date')
        ]);

        return redirect('admin/results');
    }

    /**
     * Display the specified resource.
     *
     * @param  RaceResult $result
     *
     * @return \Illuminate\Http\Response
     */
    public function show(RaceResult $result)
    {
        return view('results.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  RaceResult $result
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(RaceResult $result)
    {
        return view('admin.results.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $result = RaceResult::find($id);

        RaceResult::where('id', $id)
            ->update([
                'name' => request('name'),
                'date'  => request('date')
            ]);

        return redirect('admin/results');
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
        $result = RaceResult::find($id);
        $result->delete();

        return redirect('admin/results');
    }
}
