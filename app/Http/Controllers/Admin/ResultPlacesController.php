<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Database\ResultDatabaseHelper;
use App\Helpers\FileUploads\ResultsUploadHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RaceResult;
use App\ResultPlaces;

class ResultPlacesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the form for creating a new resource.
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $result = RaceResult::find($id);

        return view('admin.result_places.create', compact('result'));
    }

    /**
     * Add results to an existing race event.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file_upload' => 'required'
        ]);

        $result_id = request('id');
        $result = RaceResult::find($result_id);

        // Get the uploaded file and parse it.
        $file = $request->file('file_upload');
        $results = ResultsUploadHelper::parse_csv_file($file);

        // Get the Racers.
        $racers = ResultDatabaseHelper::get_racers($results);
        // Get the Race Classes.
        $race_classes = ResultDatabaseHelper::get_race_classes($results);
        // Get the Result Positions.
        $result_places = ResultDatabaseHelper::get_result_places($results, $result->id);

        ResultDatabaseHelper::add_results($racers, $race_classes, $result_places);
        ResultDatabaseHelper::set_has_results($result->id, 1);

        session()->flash('message', 'Results added to ' . $result->name);

        return redirect('admin/results');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = RaceResult::find($id);
        $result_places = ResultPlaces::where('race_results_id', '=', $result->id)->get();
        foreach ($result_places as $result_place)
        {
            $result_place->delete();
        }

        ResultDatabaseHelper::set_has_results($result->id, 0);

        session()->flash('message', 'Results removed from ' . $result->name);

        return redirect('admin/results');
    }
}