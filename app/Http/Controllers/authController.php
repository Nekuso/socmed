<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class authController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function logmein(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|min:2',
            'password' => 'required|min:4'
        ]);

        $query = DB::table('users')->where('email', $request->email);

        if ($query->exists()) {


            if (Hash::check($request->password, $query->first()->password)) {
                return "matched";
            } else {
                return "not matched";
            }
        }
    }

    public function signup()
    {
        return view('signup');
    }

    public function home()
    {
        return "welcome to home";
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'string|required|min:2',
            'lname' => 'string|required|min:2',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        $insertToTheDB = DB::table('users')->insert([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($insertToTheDB) {
            return redirect()->route('login');
        }
    }
}
