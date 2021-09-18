<?php

namespace Database\Factories\Movies;

use App\Models\Movie\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheaterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theater::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->sentence(),
        ];
    }
}
