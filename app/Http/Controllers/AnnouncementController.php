<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a public listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();

        return view('announcements.index', compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  AnnouncementController $announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
