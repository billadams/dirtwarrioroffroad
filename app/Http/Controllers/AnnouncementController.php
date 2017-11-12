<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
//        dd(request()->all());
        // Create new announcement using the request data
//        $announcement = new Announcement;

//        $announcement->title = request('title');
//        $announcement->body = request('body');

        // Save it to the database
//        $announcement->save();

        Announcement::create([
            'title' => request('title'),
            'body'  => request('body')
        ]);

        // And then redirect to admin announcements index
        return redirect('admin/announcements');
    }

    /**
     * Display the specified resource.
     *
     * @param  Announcement $announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //        $announcement = Announcement::find($id);
//        return $announcement;

        return view('announcements.show', compact('announcement'));
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
        $announcement = Announcement::find($id);

        return view('admin.announcements.edit', compact('announcement'));
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
        $announcement = Announcement::find($id);

        Announcement::where('id', $id)
            ->update([
               'title' => request('title'),
                'body' => request('body')
            ]);

        return redirect('admin/announcements');
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
        $announcement = Announcement::find($id);
        $announcement->delete();

        return redirect('admin/announcements');
    }
}
