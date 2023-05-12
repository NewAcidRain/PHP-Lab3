<?php

namespace Database\Factories;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DailyForecastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enum = ['sunny','rainy','cloudy','storm','snow'];
        $rand_enum = array_rand($enum,1);
        $float_to_string = fake()->numberBetween(0,40);
        return [
            "temperature" => fake()->numberBetween(0,40),
            "humidity" => fake()->numberBetween(0, 10),
            "wind" => "$float_to_string",
            "precipitation" => fake()->numberBetween(0,10),
            "type" => $enum[$rand_enum],
            "date" => fake()->date,
            "city_id" => Cities::all()->random()->id
        ];
    }
}
