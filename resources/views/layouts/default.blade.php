<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="wraper">
        {{-- Top Navigation Bar --}}
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard">
                    <img src="{{ asset('images/logo-bicycle.png') }}" alt="logo" width="70" height="60">
                </a>
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard">Bicycle4Share</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="row g-1">
                        <div class="col-9">
                            <div class="p-3">
                                <a class="username">Hi, {{ Auth::user()->name }}</a>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="p-3">
                                <a href="#profile"><img class="avatar" src="{{ url('images/account-logo.png') }}"
                                        alt="Avatar" width="55" height="50">
                                </a>
                            </div>
                        </div>
                    </div>

                </span>
            </div>
        </nav>

        {{-- SideBar --}}
        @if (Auth::user()->type == 'student')
            <div class="sidebar">
                <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="#services"><i class="fa fa-fw fa-wrench"></i> Profile</a>
                <a href="#clients"><i class="fa fa-fw fa-user"></i> Complaint</a>
                <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Penalty</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @else
        <div class="sidebar">
            <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="#services"><i class="fa fa-fw fa-wrench"></i> Profile</a>
            <a href="#services"><i class="fa fa-fw fa-wrench"></i> Bicycle</a>
            <a href="#clients"><i class="fa fa-fw fa-user"></i> Complaint</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Penalty</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Notification</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Report</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        @endif


        {{-- Content --}}
        <div class="main">
            @yield('contents')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
