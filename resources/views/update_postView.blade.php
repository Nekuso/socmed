@extends('layouts.app')
@section('content')


<div class="container-fluid mt-5 pt-4 pb-4" style="display: flex; width: 90%; justify-content: center; flex-direction: column; align-items: center;">
    @if ($errors->any())
    <div class="card p-4 bg-light hoverableCard alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('success'))
    <div class=" card p-4 bg-light hoverableCard success alert alert-success" style="font-size: .7rem;">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::has('fail'))
    <div class="card p-4 bg-light hoverableCard failed alert alert-danger" style="font-size: .7rem;">
        {{ Session::get('fail') }}
    </div>
    @endif
    <div class="col-md-5 col-sm-12">
        <div class="card p-4 bg-light hoverableCard" id="{{$post_info->id}}">
            <div class="media d-flex flex-column gap-4">
                <div class="d-flex align-items-start justify-content-between gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/e4/06/5e/e4065e894d2573adffbd2194895fc653.jpg" alt="Profile Image" width="50">
                        <div style="display: flex; flex-direction: column; gap: .4rem;">
                            <h5 class="mt-0 fw-bold" style="font-size: .7rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{$post_info->fname." ".$post_info->lname}}</h5>
                            <p style="font-size: .5rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{ \Carbon\Carbon::parse($post_info->created_at)->format('M d, Y')}}</p>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><button class="dropdown-item" onclick="handleDeletePost('{{$post_info->id}}')">DELETE</button></li>
                        </ul>
                    </div>
                </div>
                <form class="media-body" id="formSubmit" method=" POST" id="formSubmit" action="{{ route('updatePost', $post_info->id) }}">
                    <div class="form-group mb-3">
                        <textarea name="post" id="user_text_input" class="form-control p-3" rows="3" placeholder="What's on your mind?" style="font-size: .7rem; min-height: 120px; max-height: 120px;" aria-label="With textarea">{{ $post_info->post }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{route('home')}}" class="btn btn-secondary btn-sm mt-3" style="font-size: .7rem;">CANCEL</a>
                        <button type="submit" class="btn btn-primary btn-sm mt-3" style="font-size: .7rem;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection