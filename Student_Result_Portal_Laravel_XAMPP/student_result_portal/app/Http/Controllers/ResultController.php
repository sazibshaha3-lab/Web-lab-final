<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResultController extends Controller
{
    public function store(Request $request, Student $student)
    {
        $data = $request->validate([
            'course_code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('results', 'course_code')->where('student_id', $student->id),
            ],
            'marks' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $student->results()->create($data);

        return redirect()->route('students.show', $student)->with('success', 'Result added. Grade calculated automatically.');
    }

    public function destroy(Student $student, Result $result)
    {
        abort_unless($result->student_id === $student->id, 404);
        $result->delete();

        return redirect()->route('students.show', $student)->with('success', 'Result deleted successfully.');
    }
}
