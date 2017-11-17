<?php


namespace App\Http\Controllers;

use App\RaceResult;
use App\RaceResultPosition;

class RaceResultPositionController
{
    /**
     * Display an admin listing of the resource.
     *
     * @param  RaceResult $result
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RaceResult $result)
    {
//        dd(request()->all());
        $positions = RaceResultPosition::all();

        return view('admin.resultpositions.index', compact('result', 'positions'));
    }

    /**
     * Display a public listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $announcements = Announcement::all();

        return view('announcements.index', compact('announcements'));
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
            'date' => 'required'
        ]);

        RaceResult::create([
            'name' => request('name'),
            'date' => request('date')
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
                'date' => request('date')
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