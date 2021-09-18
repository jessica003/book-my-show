<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\Movies\TheaterSeeder;
use Database\Seeders\Movies\BookMovieSeatSeeder;
use Database\Seeders\Movies\MovieCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        $adminUser = [
            'name' => 'Swati',
            'email' => 'bookmyshow@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$h3EXWuOGeKafu7C0QraDzeu7ELk0Oi.kIrfxLriGgVd7wI5/zoLW2', // 12345678
            'remember_token' => Str::random(10),
        ];
        User::create($adminUser);

        $this->call([
            MovieCategorySeeder::class,
            TheaterSeeder::class,
            BookMovieSeatSeeder::class
        ]);
    }
}
