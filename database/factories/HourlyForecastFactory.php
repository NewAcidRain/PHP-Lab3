<?php

namespace Database\Factories;

use App\Models\Cities;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HourlyForecastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enum = ['sunny','rainy','cloudy','storm','snow'];
        $rand_enum = array_rand($enum);
        return [
            "temperature" => fake()->numberBetween(0,100),
            "type" => $enum[$rand_enum],
            "city_id" => Cities::all()->random()->id,
            "date" => Carbon::now()->format('Y-m-d H:i:s'),


        ];
    }
}
