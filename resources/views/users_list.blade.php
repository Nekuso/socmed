@extends('layouts.app')
@section('content')


<div class="container d-flex justify-content-center flex-wrap" style="margin-top: 6rem; gap: 1rem;">
    <div class="title" style="width: 100%; display: flex;">
        <h2 class="text-left" style="font-size: .8rem; background-color: black; color: white; border-radius: 10px; padding: .7rem; width: auto;">Users List</h2>
    </div>
    <div class="container text-center">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr style="font-size: .6rem;">
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody style="font-size: .6rem;">
                    <tr>
                        <td>Ezzer</td>
                        <td>Dave</td>
                        <td>Camal</td>
                        <td>ezzer@cornhub.com</td>
                        <td><button class="btn btn-primary" style="font-size: .6rem;">Edit</button> <button class="btn btn-danger" style="font-size: .6rem;">Delete</button></td>
                    </tr>
                    <tr>
                        <td>Ezzer</td>
                        <td>Dave</td>
                        <td>Camal</td>
                        <td>ezzer@cornhub.com</td>
                        <td><button class="btn btn-primary" style="font-size: .6rem;">Edit</button> <button class="btn btn-danger" style="font-size: .6rem;">Delete</button></td>
                    </tr>
                    <tr>
                        <td>Ezzer</td>
                        <td>Dave</td>
                        <td>Camal</td>
                        <td>ezzer@cornhub.com</td>
                        <td><button class="btn btn-primary" style="font-size: .6rem;">Edit</button> <button class="btn btn-danger" style="font-size: .6rem;">Delete</button></td>
                    </tr>
                    <tr>
                        <td>Ezzer</td>
                        <td>Dave</td>
                        <td>Camal</td>
                        <td>ezzer@cornhub.com</td>
                        <td><button class="btn btn-primary" style="font-size: .6rem;">Edit</button> <button class="btn btn-danger" style="font-size: .6rem;">Delete</button></td>
                    </tr>
                </tbody>
            </table>
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
</div>