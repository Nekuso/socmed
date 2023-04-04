<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{

    public function index()
    {
        $user_id = session()->get('LoggedUser');
        $current_user = User::where('id', $user_id)->first();

        $posts = DB::table('posts')
            ->join('users', 'posts.user', '=', 'users.id')
            ->select('posts.*', 'users.fname', 'users.mname', 'users.lname')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('home', compact('current_user', 'posts'));
    }

    public function users_list()
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
        $updated = User::where('id', '=', $id)->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($updated) {
            return back()->with('success', 'User updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again');
        }
    }

    public function delete($id)
    {
        $delete = User::where('id', '=', $id)->delete();
        if ($delete) {
            return response()->json(['message' => 'User deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong, please try again']);
        }
    }

    public function insertPost($text)
    {
        $userId = session()->get('LoggedUser');
        $insertToPost = DB::table('posts')->insert([
            'post' => $text,
            'user' => $userId,
            'created_at' => now(),
        ]);

        $current_post = DB::table('posts')
            ->join('users', 'posts.user', '=', 'users.id')
            ->select('posts.*', 'users.fname', 'users.mname', 'users.lname')
            ->where('posts.user', $userId)
            ->orderBy('posts.created_at', 'desc')
            ->first();

        return view('new_post', compact('current_post'));
    }

    public function deletePost($id)
    {
        $delete = DB::table('posts')->where('id', '=', $id)->delete();
        if ($delete) {
            return response()->json(['message' => 'Post deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong, please try again']);
        }
    }
}
