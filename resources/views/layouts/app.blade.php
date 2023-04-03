<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous" />
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        /* CSS for profile */
        .profile {
            padding: 20px;
            background-color: #f7f7f7;
        }

        /* CSS for input post */
        .post {
            padding: 20px;
            background-color: #fff;
        }

        /* CSS for friends list */
        .friends {
            padding: 20px;
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Nekuso</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{route('home')}}" style="font-size: .7rem; display: flex; align-items: center;"><i class="fas fa-plus-circle pe-2"></i>Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!" style="font-size: .7rem; display: flex; align-items: center;"><i class="fas fa-bell pe-2"></i>Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{route('users_list')}}" style="font-size: .7rem; display: flex; align-items: center;"><i class="fas fa-user pe-2"></i>Users</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-light btn-rounded" href="{{route('logout')}}" style="font-family: 'Press Start 2P', cursive; font-size: .7rem;">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>