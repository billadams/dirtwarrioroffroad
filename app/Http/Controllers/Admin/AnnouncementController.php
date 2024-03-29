<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;

class AnnouncementController extends Controller
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
        $announcements = Announcement::orderBy('created_at', 'date')->get();

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
        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        Announcement::create([
            'title' => request('title'),
            'body'  => request('body')
        ]);

        session()->flash('message', 'New announcement successfully published.');

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Announcement $announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
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
    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        $announcement = Announcement::find($id);

        Announcement::where('id', $id)
            ->update([
               'title' => request('title'),
                'body' => request('body')
            ]);

        session()->flash('message', 'Announcement successfully updated.');

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

        session()->flash('message', 'Announcement successfully removed.');

        return redirect('admin/announcements');
    }
}
