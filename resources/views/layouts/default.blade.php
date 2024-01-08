<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BICYCLE4SHARE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="wraper">
        {{-- Top Navigation Bar --}}

        <div class="topnav">

            <!-- Centered link -->
            <div class="topnav-centered">
                <a href="" class="active"><img src="{{ url('/images/latestlogoB4S.png') }}" alt="" width="400"></a>
            </div>

            {{-- account logo right align --}}
            <div class="topnav-right">
                <a href="#profile">
                    <svg class="avatar" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </a>
            </div>


            <!-- Right-aligned links for name-->
            <div class="topnav-right">
                <br><a>Hi,{{ Auth::user()->name }}</a>
            </div>




        </div>

        {{-- SideBar --}}
        <div class="sidebar">
            <br><br><br><br>
            @if (Auth::user()->type == 'student')
                <a href="/dashboard"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="/{{ Auth::user()->id }}/viewStudentProfile"><i class="fa fa-fw fa-wrench"></i> Profile</a>
                <a href="/manageComplaint"><i class="fa fa-fw fa-user"></i> Complaint</a>
                <a href="/managePenalty"><i class="fa fa-fw fa-envelope"></i> Penalty</a>
                <a href="/manageNotification"><i class="fa fa-fw fa-envelope"></i> Notification</a>
            @else
                <a href="/dashboard"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="/manageUserProfile"><i class="fa fa-fw fa-wrench"></i> Profile</a>
                <a href="/manageBicycle"><i class="fa fa-fw fa-wrench"></i> Bicycle</a>
                <a href="/manageComplaint"><i class="fa fa-fw fa-user"></i> Complaint</a>
                <a href="/managePenalty"><i class="fa fa-fw fa-envelope"></i>Penalty</a>
                <a href="/manageNotification"><i class="fa fa-fw fa-envelope"></i> Notification</a>
                <a href="/manageReport"><i class="fa fa-fw fa-envelope"></i> Report</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-danger" style="min-width: 80%">Logout</button>
            </form>
        </div>



        {{-- Content --}}
        <div class="main">
            @yield('contents')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
