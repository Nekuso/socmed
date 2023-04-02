<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class homeController extends Controller
{

    public function index()
    {
        $user_list = User::orderby('id', 'asc')->orderby('lname', 'asc')->orderby('fname', 'asc')->orderby('mname', 'asc')->get();
        return view('users_list', compact('user_list'));
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    public function updateView($id)
    {
        $user_info = User::orderby('lname', 'asc')->where('id', $id)->first();
        return view('update_userView', compact('user_info'));
    }

    public function updateUser($id, Request $request)
    {
        $updated = User::where('id','=', $id)->update([
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($updated) {
            return back()->with('success', 'User has been updated');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }

    }
}
