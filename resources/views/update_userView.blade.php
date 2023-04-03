@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center flex-wrap" style="margin-top: 6rem; gap: 1rem;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="success alert alert-success" style="font-size: .7rem;">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('fail'))
            <div class="failed alert alert-danger" style="font-size: .7rem;">
                {{ Session::get('fail') }}
            </div>
            @endif
            <div class="card rounded mt-3">
                <div class="card-header">
                    <h4 style="font-size: .7rem;">Update User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" id="formSubmit" action="{{ route('updateUser', $user_info->id) }}">

                        @csrf
                        <div class="form-group mb-3">
                            <label style="font-size: .7rem; font-weight:800;" for="fname">First Name</label>
                            <input style="font-size: .6rem;" type="text" id="fname" name="fname" placeholder="First Name" class="form-control form-control-sm" value="{{ $user_info->fname }}">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: .7rem; font-weight:800;" for="mname">Middle Name</label>
                            <input style="font-size: .7rem;" type="text" id="mname" name="mname" placeholder="Middle Name" class="form-control form-control-sm" value="{{ $user_info->mname }}">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: .7rem; font-weight:800;" for="lname">Last Name</label>
                            <input style="font-size: .6rem;" type="text" id="lname" name="lname" placeholder="Last Name" class="form-control form-control-sm" value="{{ $user_info->lname }}">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: .7rem; font-weight:800;" for="email">Email</label>
                            <input style="font-size: .6rem;" type="email" id="email" name="email" placeholder="Email" class="form-control form-control-sm" value="{{ $user_info->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label style="font-size: .7rem; font-weight:800;" for="password">Password</label>
                            <input style="font-size: .6rem;" type="password" id="password" name="password" placeholder="Password" class="form-control form-control-sm" value="{{ $user_info->password }}">
                        </div>
                        <div class="form-group">
                            <label style="font-size: .7rem; font-weight:800;" for="password_confirmation">Verify Password</label>
                            <input style="font-size: .6rem;" type="password" id="password_confirmation" name="password_confirmation" placeholder="Verify Password" class="form-control form-control-sm">
                        </div>
                        <div class="footer" style="display: flex; justify-content: space-around;">
                            <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
                            <a href="{{ route('home') }}" class="btn btn-danger btn-sm mt-3">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection