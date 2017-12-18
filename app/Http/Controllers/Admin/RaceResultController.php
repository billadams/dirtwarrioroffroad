<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RaceResult;

class RaceResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display an admin listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = RaceResult::orderBy('date', 'desc')->get();

        return view('admin.results.index', compact('results'));
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
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'date'  => 'required'
        ]);

        RaceResult::create([
            'name' => request('name'),
            'date' => request('date')
        ]);

        session()->flash('message', 'New race result successfully published.');

        return redirect('admin/results');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
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
        $this->validate(request(), [
            'name' => 'required',
            'date'  => 'required'
        ]);

        RaceResult::where('id', $id)
            ->update([
                'name' => request('name'),
                'date'  => request('date')
            ]);

        session()->flash('message', 'Race result successfully updated.');

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

        session()->flash('message', 'Race result successfully removed.');

        return redirect('admin/results');
    }
}
