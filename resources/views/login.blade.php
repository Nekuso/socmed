<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @vite('resources/css/login.css')

</head>

<body>
    <div class="container">
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
                    <h2 class="animation a1">Login</h2>
                    <h4 class="animation a2">
                        Welcome back, Please login to your account
                    </h4>
                </header>
                <form method="post" action="{{ route('signIn') }}">
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
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field animation a3" />
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field animation a4" />
                    <p class="animation a5">Dont have an account?<a href="{{ route('signup') }}">Sign up</a></p>
                    <button class="animation a6" type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="right"></div>
    </div>
</body>

</html>