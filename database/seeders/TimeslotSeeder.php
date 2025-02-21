<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = Sport::all();

        foreach ($sports as $sport) {

            $start = Carbon::createFromTime(8, 0); // Débute à 08:00
            $end = Carbon::createFromTime(19, 0);  // Dernier créneau à 19:00

            while ($start < $end) {
                    Timeslot::factory()->create([
                        'sport_id'  => $sport->id,
                        'starts_at' => $start->format('H:i'),
                        'ends_at'   => $start->copy()->addHour()->format('H:i'),
                    ]);
                $start->addHour();
            }
        }
    }
}
