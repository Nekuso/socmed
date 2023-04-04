@extends('layouts.app')
@section('content')

<div class="container-fluid mt-5 pt-4 pb-4" style="width: 90%;">
    <div class="row justify-content-center">
        <div class="col-md-3 d-none d-md-block"> <!-- Profile Sidebar -->
            <div class="card">
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex align-items-center" style="align-items: center; gap: .5rem;"> <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/c2/1e/5b/c21e5b0f13b015143dac6a18e8ddd899.jpg" alt="Profile Image" width="30">
                        <h4 class="card-title m-0 text-wrap" style="font-size: .6rem;">{{$current_user->fname." ". $current_user->lname}}</h4>
                    </div>
                    <p class="card-text" style="font-size: .5rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus massa ut lorem bibendum, ac pharetra nibh ultricies. Duis quis ante lectus.</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12">
            <!-- Post Input -->
            <div class="card">
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
            <!-- Posts -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title mb-3 bg-dark rounded-5 text-white" style="padding: .5rem 1rem; font-size: .8rem;">Posts</h4>
                    </div>
                    <div class="d-flex flex-column gap-3" id="postHere">

                        @foreach($posts as $post)
                        <div class="card p-4 bg-light hoverableCard" id="{{$post->id}}">
                            <div class="media d-flex flex-column gap-4">
                                <div class="d-flex align-items-start justify-content-between gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/90/20/2a/90202add028b5fc5fd0474c613b95403.jpg" alt="Profile Image" width="50">
                                        <div style="display: flex; flex-direction: column; gap: .4rem;">
                                            <h5 class="mt-0 fw-bold" style="font-size: .7rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{$post->fname." ".$post->lname}}</h5>
                                            <p style="font-size: .5rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y')}}</p>
                                        </div>
                                    </div>

                                    @if($post->user == $current_user->id)
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title bg-dark rounded-5 text-white" style="padding: .5rem 1rem; font-size: .7rem;">Friends</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item " style="font-size: .6rem;">Elon Musk</li>
                        <li class="list-group-item " style="font-size: .6rem;">Mark Zuckerberg</li>
                        <li class="list-group-item " style="font-size: .6rem;">Mr. Beast</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection