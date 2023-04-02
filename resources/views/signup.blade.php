<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite('resources/css/signup.css')

</head>

<body>
    <div class="container">
        <div class="right"></div>

        <div class="left">
            <div class="login-section">
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
                <header>
                    <h2 class="animation a1">Sign up</h2>
                    <h4 class="animation a2">
                        Welcome, Please fill in the form below to create an account.
                    </h4>
                </header>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" id="email" name="fname" placeholder="First Name" class="input-field animation a3" value="{{old('fname')}}" />
                    <input type="text" id="mname" name="mname" placeholder="Middle Name" class="input-field animation a3" value="{{old('mname')}}" />
                    <input type="text" id="lname" name="lname" placeholder="Last Name" class="input-field animation a3" value="{{old('lname')}}" />
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field animation a3" value="{{old('email')}}" />
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field animation a4" value="{{old('password')}}" />
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Verify Password" class="input-field animation a4" value="{{old('password_confirmation')}}" />
                    <p class="animation a5">Already have an account?<a href="{{ route('login') }}">Login</a></p>
                    <button class="animation a6" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>