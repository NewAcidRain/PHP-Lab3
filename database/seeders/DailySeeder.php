<?php

namespace Database\Seeders;

use App\Models\DailyForecast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DailyForecast::factory()
            ->count(100)
            ->create();

    }
}
