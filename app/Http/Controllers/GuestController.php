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

        $reservations = Reservation::join('turns', 'turns.id', 'reservations.turn_id')
            ->join('students', 'students.id', 'reservations.student_id')
            ->join('guests', 'guests.student_id', 'students.id')
            ->select(DB::raw('count(turns.days) as total, turns.days'))
            ->where('turns.days', strtolower($reservation->turn->days))
            ->groupBy('turns.days')->get();

        if ($reservations[0]->total <= 1) {
            return redirect()->route('reservations.show', $reservation->id)->with('message', 'Todavía puede invitar un amigo más');
        } else {
            return redirect()->route('students.show', $reservation->student->slug);
        }
    }
}
