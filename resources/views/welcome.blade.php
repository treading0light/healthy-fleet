<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome-style.css') }}">
</head>
<body>
    <main>

        <h1>Welcome to</h1>

        <img src="{{ asset('images/hf_logo.jpg') }}">

        <div class="welcome-buttons">
            <div class="button">
                <a href="/login">Log In</a>
            </div>

            <div class="button">
                <a href="/register">Register</a>
            </div>

            <div class="button">
                <a href="#">Demo</a>
            </div>
        </div>
    </main>
</body>
</html>