<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('admin/sessions/create');
    }

    public function store()
    {
        if (! auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        session()->flash('message', 'Login success. Logged in as ' . request('email'));

        return redirect('/admin');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/admin/login');
    }
}
