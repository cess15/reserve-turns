<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Student;
use App\Models\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function store(GuestRequest $request)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);

        Guest::create([
            'student_id' => $reservation->student->id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'mothers_lastname' => $request->mothers_lastname

        ]);

        return redirect()->route('students.show', $reservation->student->slug);
    }
}
