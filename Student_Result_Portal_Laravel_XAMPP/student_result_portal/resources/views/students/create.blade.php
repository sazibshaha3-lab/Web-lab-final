@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<div class="card">
    <h1>Add Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @include('students._form')
        <p class="actions"><button type="submit">Save Student</button><a class="btn btn-secondary" href="{{ route('students.index') }}">Cancel</a></p>
    </form>
</div>
@endsection
