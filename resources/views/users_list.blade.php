@extends('layouts.app')
@section('content')


<div class="container d-flex justify-content-center flex-wrap" style="margin-top: 6rem; gap: 1rem;">
    <div class="title" style="width: 100%; display: flex;">
        <h2 class="text-left" style="font-size: .8rem; background-color: black; color: white; border-radius: 10px; padding: .7rem; width: auto;">Users List</h2>
    </div>
    <div class="container text-center ">
        <div class="table-responsive ">
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
                            <button class="btn btn-danger deleteBtn" style="font-size: .6rem;" onclick="handleDelete('{{$user->id}}')">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- <div class=" card" style="width: 18rem;">
                                <img src="https://i.pinimg.com/originals/e1/60/60/e16060d20c3c32f0946f4cf5469a5266.gif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold" style="font-size: .6rem;">Grannys Noodle Shop</h5>
                                    <p class="card-text" style="font-size: .6rem;">
                                        Grannys Noodle Shop is a restaurant located in the heart of the city. We serve a variety of dishes, including noodles, rice, and more.
                                    </p>
                                    <a href="#" class="btn btn-primary" style="font-size: .6rem;">OPEN</a>
                                </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://i.pinimg.com/originals/e1/60/60/e16060d20c3c32f0946f4cf5469a5266.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold" style="font-size: .6rem;">Grannys Noodle Shop</h5>
                <p class="card-text" style="font-size: .6rem;">
                    Grannys Noodle Shop is a restaurant located in the heart of the city. We serve a variety of dishes, including noodles, rice, and more.
                </p>
                <a href="#" class="btn btn-primary" style="font-size: .6rem;">OPEN</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://i.pinimg.com/originals/e1/60/60/e16060d20c3c32f0946f4cf5469a5266.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold" style="font-size: .6rem;">Grannys Noodle Shop</h5>
                <p class="card-text" style="font-size: .6rem;">
                    Grannys Noodle Shop is a restaurant located in the heart of the city. We serve a variety of dishes, including noodles, rice, and more.
                </p>
                <a href="#" class="btn btn-primary" style="font-size: .6rem;">OPEN</a>
            </div>
        </div> -->
</div>