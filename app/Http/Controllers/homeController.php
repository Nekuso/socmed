<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{

    public function index()
    {
        return view('users_list');
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
