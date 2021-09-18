<?php

namespace Database\Seeders\Movies;

use Illuminate\Database\Seeder;
use App\Models\Movie\MovieCategory;

class MovieCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieCategory::factory()
            ->count(10)
            // ->hasMovies(2)
            ->create();
    }
}
