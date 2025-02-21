<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    // Made with ❤️ by Nekuso
    // Home Page
    public function index()
    {
        $user_id = session()->get('LoggedUser');
        $current_user = User::where('id', $user_id)->first();

        $friends = DB::table('friends')
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('users.id', 'users.fname', 'users.lname')
            ->where('friends.acount_id', $user_id)
            ->orderBy('users.lname', 'asc')
            ->orderBy('users.fname', 'asc')
            ->orderBy('users.mname', 'asc')
            ->get();

        $friendsPostRef = DB::table('friends')
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('users.id', 'users.fname', 'users.lname')
            ->where('friends.acount_id', $user_id)
            ->pluck('id')
            ->toArray();

        $posts = DB::table('posts')
            ->join('users', 'posts.user', '=', 'users.id')
            ->select('posts.*', 'users.fname', 'users.mname', 'users.lname')
            ->whereIn('posts.user', array_merge([$user_id], $friendsPostRef))
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $notFriendList = User::whereNotIn('id', function ($query) use ($user_id) {
            $query->select('friend_id')
                ->from('friends')
                ->where('acount_id', $user_id);
        })
            ->where('id', '<>', $user_id)
            ->orderBy('lname', 'asc')
            ->orderBy('fname', 'asc')
            ->orderBy('mname', 'asc')
            ->get();

        return view('home', compact('current_user', 'posts', 'friends', 'notFriendList'));
    }

    public function chats($friend_id = null)
    {
        $user_id = session()->get('LoggedUser');
        $current_user = User::where('id', $user_id)->first();

        $friends = DB::table('friends')
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('users.id', 'users.fname', 'users.lname')
            ->where('friends.acount_id', $user_id)
            ->orderBy('users.lname', 'asc')
            ->orderBy('users.fname', 'asc')
            ->orderBy('users.mname', 'asc')
            ->get();

        return view('chats', compact('current_user', 'friends'));
    }

    public function sendChat(Request $request)
    {
        $user_id = session()->get('LoggedUser');
        $friend_id = $request->input('friend_id');
        $message = $request->input('message');

        DB::table('messages')->insert([
            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'message' => $message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $chats = DB::table('messages')
            ->where(function ($query) use ($user_id, $friend_id) {
                $query->where('user_id', $user_id)
                    ->where('friend_id', $friend_id);
            })
            ->orWhere(function ($query) use ($user_id, $friend_id) {
                $query->where('user_id', $friend_id)
                    ->where('friend_id', $user_id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('new_chat', compact('chats'))->render();
    }

    // Shows all the users
    public function users_list()
    {
        $user_list = User::orderby('id', 'asc')->orderby('lname', 'asc')->orderby('fname', 'asc')->orderby('mname', 'asc')->get();
        return view('users_list', compact('user_list'));
    }

    // Logout's an account
    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    // View's an account that will be edited
    public function updateView($id)
    {
        $user_info = User::orderby('lname', 'asc')->where('id', $id)->first();
        return view('update_userView', compact('user_info'));
    }

    // View's a post that will be edited
    public function editPostView($id)
    {
        $post_info = DB::table('posts')
            ->join('users', 'posts.user', '=', 'users.id')
            ->select('posts.*', 'users.fname', 'users.mname', 'users.lname')
            ->where('posts.id', $id)
            ->first();
        return view('update_postView', compact('post_info'));
    }

    // Update's an account
    public function updateUser($id, Request $request)
    {
        $validated = $request->validate([
            'mname' => 'string|required|min:2',
            'fname' => 'string|required|min:2',
            'lname' => 'string|required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

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

    // Delete's an account
    public function delete($id)
    {
        $delete = User::where('id', '=', $id)->delete();
        if ($delete) {
            return response()->json(['message' => 'User deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong, please try again']);
        }
    }

    // Insert's a post
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


    // Delete's a post
    public function deletePost($id)
    {
        $delete = DB::table('posts')->where('id', '=', $id)->delete();
        if ($delete) {
            return response()->json(['message' => 'Post deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong, please try again']);
        }
    }

    // Update's a post
    public function updatePost($id, Request $request)
    {
        $validated = $request->validate([
            'post' => 'string|required|min:2',
        ]);

        $updated = DB::table('posts')->where('id', '=', $id)->update([
            'post' => $request->post,
        ]);


        if ($updated) {
            return back()->with('success', 'Post updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please update your text or try again');
        }
    }

    // Add friend's a user
    public function addFriend($id)
    {
        $user_id = session()->get('LoggedUser');
        $friendship = DB::table('friends')
            ->where('acount_id', $user_id)
            ->where('friend_id', $id)
            ->first();

        if (!$friendship) {
            DB::table('friends')->insert([
                'acount_id' => $user_id,
                'friend_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Friend request sent!');
        } else {
            return redirect()->back()->with('fail', 'Friend request already sent!');
        }
    }

    // Unfriend's a user
    public function unfriend($id)
    {
        $user_id = session()->get('LoggedUser');
        $delete = DB::table('friends')
            ->where('acount_id', $user_id)
            ->where('friend_id', $id)
            ->delete();

        if ($delete) {
            return redirect()->back()->with('success', 'Friend removed!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, please try again');
        }
    }

    // View's a user's profile
    public function profile($id)
    {
        $user_id = session()->get('LoggedUser');
        $current_user = User::where('id', $user_id)->first();

        $user = User::findOrFail($id);

        $posts = DB::table('posts')
            ->join('users', 'posts.user', '=', 'users.id')
            ->select('posts.*', 'users.fname', 'users.mname', 'users.lname')
            ->where('posts.user', $id)
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $friends = DB::table('friends')
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('users.*')
            ->where('friends.acount_id', $id)
            ->get();

        $mutual_friends_count = 0;
        $is_friend = DB::table('friends')
            ->where('acount_id', $current_user->id)
            ->where('friend_id', $user->id)
            ->exists();
        foreach ($friends as $friend) {
            $is_mutual = DB::table('friends')
                ->where('acount_id', $current_user->id)
                ->where('friend_id', $friend->id)
                ->exists();
            if ($is_mutual) {
                $mutual_friends_count++;
                $friend->is_mutual = true;
            } else {
                $friend->is_mutual = false;
            }
        }

        return view('profile', compact('user', 'posts', 'current_user', 'friends', 'mutual_friends_count', 'is_friend'));
    }
}
