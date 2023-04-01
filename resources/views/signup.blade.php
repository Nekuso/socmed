<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sihnup</title>
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
                <header>
                    <h2 class="animation a1">Sign up</h2>
                    <h4 class="animation a2">
                        Welcome, Please fill in the form below to create an account.
                    </h4>
                </header>
                <form method="POST" action="{{ route('register') }}">

                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    @csrf
                    <input type="email" id="email" name="fname" placeholder="First Name" class="input-field animation a3" />
                    <input type="email" id="mname" name="mname" placeholder="Middle Name" class="input-field animation a3" />
                    <input type="email" id="lname" name="lname" placeholder="Last Name" class="input-field animation a3" />
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field animation a3" />
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field animation a4" />
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password" class="input-field animation a4" />
                    <p class="animation a5">Already have an account?<a href="{{ route('login') }}">Login</a></p>
                    <button class="animation a6" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>