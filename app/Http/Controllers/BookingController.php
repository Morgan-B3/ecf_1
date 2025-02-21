<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index() {
        $user = Auth::user();
        $bookings = $user->bookings;

        return view('bookings.index', ['bookings' => $bookings, 'user' => $user]);
    }

    public function create() {
        return view('bookings.create');
    }

    public function show(Booking $booking) {
        return view('bookings.show', [ 'booking' => $booking ] );
    }

    public function store() {
        request()->validate([
            'timeslot_id' => 'required',
            'user_id' => 'required',
        ]);

        booking::create([
            'timeslot_id' => request('timeslot_id'),
            'user_id' => request('user_id')
        ]);

        return redirect('/sports/'.request('sport_id'));
    }

    public function destroy(Booking $booking) {
        $booking->delete();
        return redirect('/bookings');
    }
}
