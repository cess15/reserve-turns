<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Turn;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    public function show($slug)
    {
        $student = Student::where('slug', $slug)->first();
        $turns = Turn::getDaysOrdered();
        return view('turns.index', compact('student', 'turns'));
    }

    public function validateStudent(StudentRequest $request)
    {
        $student = Student::where('identification', $request->identification)
            ->where('career_id', 1)
            ->where('semester_id', 10)
            ->first();

        if ($student != null) {
            return redirect()->route('students.show', $student->slug);
        } else {
            return redirect()->route('students.index')
                ->with('message', 'Lo sentimos, no esta autorizado');
        }
    }
}
