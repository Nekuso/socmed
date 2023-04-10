@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5 pt-4 pb-4" style="width: 90%;">
    <div class="row justify-content-center">
        <div class="col-md-3 d-none d-md-block">
            <div class="card mb-2">
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center" style="align-items: center; justify-content: space-between; gap: .5rem;">
                        <div class="d-flex align-items-center" style="align-items: center; gap: .5rem;">
                            <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/e4/06/5e/e4065e894d2573adffbd2194895fc653.jpg" alt="Profile Image" width="30">
                            <h4 class="card-title m-0 text-wrap" style="font-size: .7rem;">{{$user->fname." ". $user->lname}}</h4>
                        </div>
                        @if ($user->id == $current_user->id)
                        <a href="{{route('userView', $user->id)}}" class="btn btn-primary" style="font-size: .5rem;">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        @endif
                        @if ($user->id != $current_user->id)
                        @if ($is_friend)
                        <form action="{{ route('unfriend', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="font-size: .5rem;">
                                <i class="fas fa-user-minus"></i>
                            </button>
                        </form>
                        @else
                        <form action="{{ route('add.friend', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="font-size: .5rem;">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </form>
                        @endif
                        @endif
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="d-flex align-items-center justify-content-between" style="align-items: center;">
                        <h4 class=" card-title bg-dark rounded-5 text-white m-0" style="padding: .5rem 1rem; font-size: .5rem;">Friends</h4>
                        @if ($user->id != $current_user->id)
                        <p style="margin: 0; font-size: .5rem;">({{ $mutual_friends_count }} mutual friends)</p>
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($friends as $friend)
                        <li class="list-group-item" style="font-size: .6rem; display: flex; justify-content: space-between; align-items: center;">
                            <a href="{{ route('profile', $friend->id) }}" style="text-decoration:none; color:black; font-size: .6rem;">
                                {{$friend->fname." ".$friend->lname}}
                            </a>
                            @if($user->id == $current_user->id)
                            <form action="{{ route('unfriend', $friend->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="font-size: .5rem;">
                                    <i class="fas fa-user-minus"></i>
                                </button>
                            </form>
                            @elseif ($friend->is_mutual)
                            <p style="margin: 0; font-size: .5rem;">(mutual)</p>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-5 col-sm-12">

            <!-- Post Input -->
            @if($user->id == $current_user->id)
            <div class="card mb-3">
                <div class="card-body">
                    <div>
                        <div class="form-group mb-3">
                            <textarea name="post" onchange="handleInputChange()" id="user_text_input" class="form-control p-3" rows="3" placeholder="What's on your mind?" style="font-size: .7rem; min-height: 120px; max-height: 120px;" aria-label="With textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button onclick="handleCreatePost()" class="btn btn-primary w-auto" style="font-size: .7rem;">Post</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Posts -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title mb-3 bg-dark rounded-5 text-white" style="padding: .5rem 1rem; font-size: .8rem;">Posts</h4>
                    </div>
                    <div class="d-flex flex-column gap-3" id="postHere">

                        @if($posts->count() >0)
                        @foreach($posts as $post)
                        <div class="card p-4 bg-light hoverableCard" id="{{$post->id}}">
                            <div class="media d-flex flex-column gap-4">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/e4/06/5e/e4065e894d2573adffbd2194895fc653.jpg" alt="Profile Image" width="50">
                                        <div style="display: flex; flex-direction: column; gap: .4rem;">
                                            <a href="{{ route('profile', $post->user) }}" class="mt-0 fw-bold" style="text-decoration:none; color:black; font-size: .7rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end:
    0px;">{{$post->fname." ".$post->lname}}</a>
                                            <p style="font-size: .5rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}</p>
                                        </div>
                                    </div>

                                    @if($post->user == $current_user->id)
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{route('postView', $post->id)}}">EDIT</a></li>
                                            <li><button class="dropdown-item" onclick="handleDeletePost('{{$post->id}}')">DELETE</button></li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <div class="media-body">
                                    <p class="" style="font-size: .6rem; margin-bottom: 0;">
                                        {{$post->post}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        @else
                        <div class="alert alert-info" style="font-size: .6rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">
                            No posts yet!

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> @endsection