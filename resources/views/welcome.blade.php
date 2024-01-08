<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BICYCLE4SHARE</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
</head>

<body>
    <div style="margin-top: 200px">
        <div class="adminButton">
            <a href="/login">
                <button class="loginButton">
                    Login As Admin
                </button>
            </a>
        </div>
        <br>
        <div class="adminButton">
            <a href="/loginStudent">
                <button class="loginButton">
                    Login As Student
                </button>
            </a>
        </div>

    </div>

</body>

</html>
