<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = [
            'Basketball',
            'Football',
            'Tennis',
            'Swimming',
            'Golf',
            'Volleyball',
            'Baseball',
            'Rugby',
            'Cricket',
            'Hockey',
        ];

        foreach ($name as $sport) {
            Sport::factory()->create([
                'name' => $sport,
            ]);
        }
    }
}
