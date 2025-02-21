<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        $booking = Booking::with('bookings')->latest()->paginate(10);

        return view('bookings.index', ['booking' => $booking]);
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
}
