@extends('layouts.app')
@section('content')

<div class="container-fluid mt-5 pt-4 pb-4" style="max-width: 90%;">
    <div class="row gap-2 justify-content-center">
        <div class="col-sm-2 d-none d-md-block">
            <!-- Profile Sidebar -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="font-size: 1rem;">Profile</h4>
                    <p class="card-text" style="font-size: .6rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus massa ut lorem bibendum, ac pharetra nibh ultricies. Duis quis ante lectus.</p>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <!-- Post Input -->
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group mb-3">
                            <textarea class="form-control" rows="3" placeholder="What's on your mind?" style="font-size: .7rem; min-height: 120px; max-height: 120px;"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-auto" style="font-size: .7rem;">Post</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Posts -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex">
                        <h4 class="card-title mb-3 bg-dark rounded-5 text-white" style="padding: .5rem 1rem; font-size: .8rem;">Posts</h4>
                    </div>
                    <div class="card p-4 bg-light">
                        <div class="media d-flex flex-column gap-4">
                            <div class="d-flex align-items-center gap-2">
                                <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/c2/1e/5b/c21e5b0f13b015143dac6a18e8ddd899.jpg" alt="Profile Image" width="50">
                                <h5 class="mt-0 fw-bold" style="font-size: .7rem;">Justin Gutierrez</h5>
                            </div>
                            <div class="media-body">
                                <p style="font-size: .6rem;">
                                    Supp Bitches! We out tonight drinking booze and shit at Sargine's Tarburn!! :>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="card col-sm-2 d-none d-md-block">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 1rem;">Friends</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item " style="font-size: .6rem;">Friend 2</li>
                    <li class="list-group-item " style="font-size: .6rem;">Friend 1</li>
                    <li class="list-group-item " style="font-size: .6rem;">Friend 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>