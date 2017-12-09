<?php

namespace App\Http\Controllers;

use App\Helpers\Database\ResultDatabaseHelper;
use App\Helpers\FileUploads\ResultsUploadHelper;
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
        $results = RaceResult::orderBy('date', 'desc')->get();

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
        $results = $race_result->get_event_results($most_recent_event->id);

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
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'date'  => 'required',
            'file_upload' => 'required'
        ]);

        // Get the uploaded file and parse it.
        $file = $request->file('file_upload');
        $results = ResultsUploadHelper::parse_csv_file($file);

        // Get the Racers.
        $racers = ResultDatabaseHelper::get_racers($results);

        // Get the Race Classes.
        $race_classes = ResultDatabaseHelper::get_race_classes($results);

        // Get the Result Positions.
        $result_positions = ResultDatabaseHelper::get_race_position_results($results);

        // Store the results in the related tables.
//        $race_result = new RaceResult();
//        $race_result->store_results($results);

        // Store the actual race result event.
        RaceResult::create([
            'name' => request('name'),
            'date' => request('date')
        ]);

        ResultDatabaseHelper::store_racers($racers);
        ResultDatabaseHelper::store_classes($race_classes);
        ResultDatabaseHelper::store_race_position_results($result_positions);

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
