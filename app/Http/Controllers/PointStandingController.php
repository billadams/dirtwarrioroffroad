<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointStandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
}
