<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('admin/sessions/create');
    }

    public function store()
    {
        dd(request());
        if (! auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return redirect('/admin');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/admin/login');
    }
}
