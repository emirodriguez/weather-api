<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'query' => fake()->city(),
            'observation_time' => fake()->time(),
            'temperature' => fake()->numberBetween(0, 100),
            'description' => fake()->text(25),
            'wind_speed' => fake()->numberBetween(0, 100),
            'wind_degree' => fake()->numberBetween(0, 100),
            'wind_dir' => 'N',
            'pressure' => fake()->numberBetween(0, 100),
            'precip' => fake()->numberBetween(0, 100),
            'humidity' => fake()->numberBetween(0, 100),
            'cloudcover' => fake()->numberBetween(0, 100),
            'feels_like' => fake()->numberBetween(0, 100),
            'uv_index' => fake()->numberBetween(0, 100),
            'visibility' => fake()->numberBetween(0, 100),
        ];
    }
}
