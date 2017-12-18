<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//        $logged_in_user = Auth::user();
//        $first_name = $logged_in_user->first_name;
//        dd($first_name);
//        session('logged_in_user');

        return redirect('/admin');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/admin/login');
    }
}
