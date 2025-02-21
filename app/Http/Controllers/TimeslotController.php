<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index() {
        $timeslot = Timeslot::with('timeslots')->latest()->paginate(10);

        return view('timeslots.index', ['timeslot' => $timeslot]);
    }

    public function create() {
        return view('timeslots.create');
    }

    public function show(Timeslot $timeslot) {
        return view('timeslots.show', [ 'timeslot' => $timeslot ] );
    }

    public function store() {
        request()->validate([
            'sport_id' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required',
            'capacity' => 'required',
        ]);

        timeslot::create([
            'sport_id' => request('sport_id'),
            'starts_at' => request('starts_at'),
            'ends_at' => request('ends_at'),
            'capacity' => request('capacity')
        ]);

        return redirect('/sports/'.request('sport_id').'/edit');
    }

    public function edit(timeslot $timeslot) {
        return view('timeslots.edit', [ 'timeslot' => $timeslot ]  );
    }

    public function update(timeslot $timeslot) {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $timeslot->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/sports/'.$timeslot->sport->id.'/edit' );
    }

    public function destroy(timeslot $timeslot) {
        $timeslot->delete();
        return redirect('/sports/'.$timeslot->sport->id.'/edit');
    }
}
