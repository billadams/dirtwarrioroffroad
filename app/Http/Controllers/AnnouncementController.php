<?php

namespace App\Http\Controllers;

use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();

        return view('announcements.index', compact('announcements'));
    }

    // Using route model binding. Looks for the name of the variable
    // from the route and must be the same.
    public function show(Announcement $announcement)
    {

//        $announcement = Announcement::find($id);

//        return $announcement;

        return view('announcements.show', compact('announcement'));
    }

    public function create(Announcement $announcement)
    {

//        $announcement = Announcement::find($id);

//        return $announcement;

        return view('admin.announcements.create', compact('announcement'));
    }
}
