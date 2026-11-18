<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Result Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <div><strong>Student Result Portal</strong></div>
    <nav>
        @auth
            <a href="{{ route('students.index') }}">Students</a>
            <form class="inline" method="POST" action="{{ route('logout') }}">@csrf<button class="btn-secondary">Logout</button></form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </nav>
</header>
<main class="container">
    @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
    @yield('content')
</main>
</body>
</html>
