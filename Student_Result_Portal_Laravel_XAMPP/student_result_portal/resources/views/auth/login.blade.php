@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')
<div class="card" style="max-width:460px;margin:45px auto">
    <h1>Admin Login</h1>
    <p class="muted">Sign in to manage students and results.</p>
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')<div class="error">{{ $message }}</div>@enderror
        <label for="password">Password</label><input id="password" type="password" name="password" required>
        @error('password')<div class="error">{{ $message }}</div>@enderror
        <p><label style="font-weight:400"><input type="checkbox" name="remember" value="1" style="width:auto"> Remember me</label></p>
        <button type="submit">Login</button>
    </form>
</div>
@endsection
