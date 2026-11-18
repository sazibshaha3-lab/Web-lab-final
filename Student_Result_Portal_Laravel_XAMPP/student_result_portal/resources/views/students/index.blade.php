@extends('layouts.app')
@section('title', 'Students')
@section('content')
<div class="card">
    <div class="actions" style="justify-content:space-between">
        <h1>Students</h1><a class="btn" href="{{ route('students.create') }}">+ Add Student</a>
    </div>
    @if($students->count())
    <div class="table-wrap"><table>
        <thead><tr><th>Name</th><th>Roll</th><th>Department</th><th>Email</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td><td>{{ $student->roll }}</td><td>{{ $student->department }}</td><td>{{ $student->email }}</td>
                <td><div class="actions">
                    <a class="btn" href="{{ route('students.show', $student) }}">Results</a>
                    <a class="btn btn-secondary" href="{{ route('students.edit', $student) }}">Edit</a>
                    <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete this student and all results?')">
                        @csrf @method('DELETE')<button class="btn-danger">Delete</button>
                    </form>
                </div></td>
            </tr>
        @endforeach
        </tbody>
    </table></div>
    <p>{{ $students->links() }}</p>
    @else
        <p class="muted">No students found. Add the first student.</p>
    @endif
</div>
@endsection
