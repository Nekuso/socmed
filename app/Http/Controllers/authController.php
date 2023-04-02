<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function signIn(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|min:2',
            'password' => 'required|min:4'
        ]);

        $query = User::where('email', "=", $request->email)->first();

        if (!$query) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            if (Hash::check($request->password, $query->password)) {
                $request->session()->put('LoggedUser', $query->id);
                return redirect('home');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function signup()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'string|required|min:2',
            'lname' => 'string|required|min:2',
            'email' => 'required|unique:users|email',
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
            return back()->with('success', 'You have been registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
