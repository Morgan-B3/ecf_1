<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index() {
        $sport = Sport::with('timeslots')->latest()->paginate(10);

        return view('sports.index', ['sport' => $sport]);
    }

    public function create() {
        return view('sports.create');
    }

    public function show(Sport $sport) {
        return view('sports.show', [ 'sport' => $sport ] );
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        sport::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/sports');
    }

    public function edit(sport $sport) {
        return view('sports.edit', [ 'sport' => $sport ]  );
    }

    public function update(sport $sport) {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $sport->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/sports/'.$sport->id );
    }

    public function destroy(sport $sport) {
        $sport->delete();
        return redirect('/');
    }
}
