@extends('layouts.app')
@section('title', 'Student Results')
@section('content')
<div class="card">
    <div class="actions" style="justify-content:space-between">
        <h1>Student Details & Results</h1>
        <a class="btn btn-secondary" href="{{ route('students.index') }}">Back to Students</a>
    </div>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Roll:</strong> {{ $student->roll }}</p>
    <p><strong>Department:</strong> {{ $student->department }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
</div>
<div class="card">
    <h1>Result Sheet</h1>
    @if($student->results->count())
    <div class="table-wrap"><table>
        <thead><tr><th>Course Code</th><th>Marks</th><th>Grade</th><th>Action</th></tr></thead>
        <tbody>
        @foreach($student->results as $result)
            <tr><td>{{ $result->course_code }}</td><td>{{ number_format($result->marks, 2) }}</td><td><strong>{{ $result->grade }}</strong></td>
            <td><form method="POST" action="{{ route('students.results.destroy', [$student, $result]) }}" onsubmit="return confirm('Delete this result?')">@csrf @method('DELETE')<button class="btn-danger">Delete</button></form></td></tr>
        @endforeach
        </tbody>
    </table></div>
    @else
        <p class="muted">No results have been added for this student.</p>
    @endif
</div>
<div class="card">
    <h1>Add Course Result</h1>
    <form method="POST" action="{{ route('students.results.store', $student) }}">
        @csrf
        <label for="course_code">Course Code</label>
        <input id="course_code" name="course_code" value="{{ old('course_code') }}" placeholder="e.g. CSE 0613-3208" required>
        @error('course_code')<div class="error">{{ $message }}</div>@enderror
        <label for="marks">Marks (0–100)</label>
        <input id="marks" type="number" name="marks" min="0" max="100" step="0.01" value="{{ old('marks') }}" required>
        @error('marks')<div class="error">{{ $message }}</div>@enderror
        <p><button type="submit">Add Result & Calculate Grade</button></p>
    </form>
    <p class="muted">Grade scale: A+ (80–100), A (70–79), A- (60–69), B (50–59), C (40–49), F (below 40).</p>
</div>
@endsection
