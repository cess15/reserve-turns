<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Turn;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('guests.create', compact('reservation'));
    }

    public function store(Request $request)
    {
        $reservation = $this->saveReservation($request);
        return redirect()->route('students.show', $reservation->student->slug);
    }

    public function guests(Request $request)
    {
        $reservation = $this->saveReservation($request);
        return redirect()->route('reservations.show', $reservation->id);
    }

    public function saveReservation(Request $request)
    {
        $reservation = Reservation::create([
            'student_id' => $request->student_id,
            'turn_id' => $request->turn_id
        ]);
        Turn::where('id', $request->turn_id)->update([
            'status' => 0
        ]);
        return $reservation;
    }
}
