<?php

namespace Database\Factories\Movies;

use App\Models\Movie\MovieCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
