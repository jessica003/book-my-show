<?php

namespace Database\Factories\Movies;

use App\Models\Movie\BookMovieSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookMovieSeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookMovieSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = now();
        $movieBeginAt = $now->format('H:i:s');
        return [
            'seats' => $this->faker->numberBetween(1, 4),
            'show_at' => date('Y-m-d'),
            'show_time' => $movieBeginAt,
            'movie_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 2),
            'theater_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
