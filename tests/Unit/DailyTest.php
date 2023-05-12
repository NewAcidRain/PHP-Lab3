<?php

namespace Tests\Unit;

use App\Models\Cities;
use App\Models\DailyForecast;
use Database\Seeders\DailySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DailyTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_read_daily_forecast()
    {
        Cities::factory()->create();
        $daily_forecast = DailyForecast::factory()->create();
        $response = $this->getJson("/api/v1/daily/{$daily_forecast->city_id}");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $daily_forecast->id,
            'temperature' => $daily_forecast->temperature,
            'humidity' => $daily_forecast->humidity,
            'wind' => $daily_forecast->wind,
            'precipitation' => $daily_forecast->precipitation,
            'type' => $daily_forecast->type,
            'date' => $daily_forecast->date,
            'city_id' => $daily_forecast->city_id
        ]);
    }

    /** @test */
    public function test_create_daily_forecast()
    {
        Cities::factory()->create();
        $daily_forecast = DailyForecast::factory()->raw();
        $response = $this->postJson('/api/v1/daily', $daily_forecast);
        $response->assertStatus(201);
        $this->assertDatabaseHas('daily_forecasts', $daily_forecast);
    }

    /** @test */
    public function test_update_daily_forecast()
    {
        Cities::factory()->create();
        $daily_forecast = DailyForecast::factory()->create();
        $daily_forecast_raw = DailyForecast::factory()->raw();
        $response = $this->putJson("/api/v1/daily/{$daily_forecast->id}", $daily_forecast_raw);
        $response->assertStatus(200);
        $this->assertDatabaseHas('daily_forecasts', $daily_forecast_raw);
    }

    /** @test */
    public function test_delete_daily_forecast()
    {
        Cities::factory()->create();
        $daily_forecast = DailyForecast::factory()->create();
        $response = $this->deleteJson("api/v1/daily/{$daily_forecast->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('daily_forecasts', $daily_forecast->toArray());
    }


}

