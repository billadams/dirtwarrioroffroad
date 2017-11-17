<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RaceClass;

class RaceClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = RaceClass::all()->sortByDesc('name');

        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        RaceClass::create([
            'name' => request('name')
        ]);

        return redirect('admin/classes');
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
        $class = RaceClass::find($id);

        return view('admin.classes.edit', compact('class'));
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
        RaceClass::where('id', $id)
            ->update([
                'name' => request('name')
            ]);

        return redirect('admin/classes');
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
        $class = RaceClass::find($id);
        $class->delete();

        return redirect('admin/classes');
    }
}