<?php

namespace App\Http\Controllers;

use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    // Using route model binding. Looks for the name of the variable
    // from the route and must be the same.
    public function show(Announcement $announcement)
    {
//        $announcement = Announcement::find($id);
//        return $announcement;

        return view('announcements.show', compact('announcement'));
    }

    public function create()
    {
//        $announcement = Announcement::find($id);
//        return $announcement;

        return view('admin.announcements.create');
    }

    public function store()
    {
//        dd(request()->all());
        // Create new announcement using the request data
        $announcement = new Announcement;

//        $announcement->title = request('title');
//        $announcement->body = request('body');

        // Save it to the database
//        $announcement->save();

        Announcement::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        // And then redirect to admin announcements index
        return redirect('/admin/announcements');
    }
}
