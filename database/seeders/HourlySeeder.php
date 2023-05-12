<?php

namespace Database\Seeders;

use App\Models\HourlyForecast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HourlyForecast::factory()
            ->count(100)
            ->create();
    }
}
