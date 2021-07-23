<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Turn;
use Illuminate\Http\Request;

class TurnController extends Controller
{

    public function loadData(Request $request)
    {
        $turn = Turn::where('days', $request->days)->where('status', 1)->first();

        $student = Student::where('slug', $request->student_id)->first();
        if ($turn != null) {
            return redirect()->route('turns.detail', [strtolower($turn->days), $student->slug]);
        } else {
            return redirect()->route('turns.index');
        }
    }

    public function detail(string $days, string $studentSlug)
    {
        $turns = Turn::where('days', $days)->where('status', 1)->get();
        $student = Student::where('slug', $studentSlug)->first();
        return view('turns.detail', compact('turns','student'));
    }

}
