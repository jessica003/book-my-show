<?php

namespace Database\Seeders\Movies;

use App\Models\Movie\Movie;
use App\Models\Movie\Theater;
use Illuminate\Database\Seeder;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theater::factory()
            ->count(10)
            ->has(Movie::factory()->count(3))
            ->create();
    }
}
