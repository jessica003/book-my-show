<?php

namespace Database\Factories\Movies;

use App\Models\Movie\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'poster_url' => 'https://source.unsplash.com/random',
            'movie_category_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
