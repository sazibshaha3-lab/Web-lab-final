@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
<div class="card">
    <h1>Edit Student</h1>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf @method('PUT')
        @include('students._form')
        <p class="actions"><button type="submit">Update Student</button><a class="btn btn-secondary" href="{{ route('students.index') }}">Cancel</a></p>
    </form>
</div>
@endsection
