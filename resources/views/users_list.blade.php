@extends('layouts.app')
@section('content')

<!-- Made with ❤️ by Nekuso -->

<div class="container d-flex justify-content-center flex-wrap" style="margin-top: 6rem; gap: 1rem;">
    <div class="card-title" style="width: 100%; display: flex;">
        <h2 class="text-left" style="font-size: .8rem; background-color: black; color: white; border-radius: 10px; padding: .6rem .7rem; width: auto;">Users List</h2>
    </div>
    <div class="container text-center ">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center ">
                <thead>
                    <tr style="font-size: .6rem;">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody style="font-size: .6rem;">
                    @foreach($user_list as $user)
                    <tr id="{{$user->id}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->fname}}</td> 
                        <td>{{$user->mname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('userView', $user->id)}}" class="btn btn-primary" style="font-size: .6rem;">Update</a>
                            <button class="btn btn-danger delete-button" onclick="handleDelete('{{$user->id}}')" style="font-size: .6rem;">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection