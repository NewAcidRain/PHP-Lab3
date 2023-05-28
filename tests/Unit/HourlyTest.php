<?php

use App\Models\Cities;
use App\Models\HourlyForecast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HourlyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_hourly_forecast()
    {
        Cities::factory()->create();
        $hourly_forecast = HourlyForecast::factory()->create();
        $response = $this->getJson("/api/v1/hourly/{$hourly_forecast->city_id}");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $hourly_forecast->id,
            'temperature' => $hourly_forecast->temperature,
            'type' => $hourly_forecast->type,
            'date' => $hourly_forecast->date,
            'city_id' => $hourly_forecast->city_id
        ]);
    }
    /** @test */
    public function test_create_hourly_forecast()
    {
        Cities::factory()->create();
        $hourly_forecast = HourlyForecast::factory()->raw();
        $response = $this->postJson('/api/v1/hourly', $hourly_forecast);
        $response->assertStatus(201);
        $this->assertDatabaseHas('hourly_forecasts', $hourly_forecast);
    }
    /** @test */
    public function test_update_hourly_forecast()
    {
        Cities::factory()->create();
        $hourly_forecast = HourlyForecast::factory()->create();
        $hourly_forecast_raw = HourlyForecast::factory()->raw();
        $response = $this->putJson("/api/v1/hourly/{$hourly_forecast->id}", $hourly_forecast_raw);
        $response->assertStatus(200);
        $this->assertDatabaseHas('hourly_forecasts', $hourly_forecast_raw);
    }

    public function test_delete_hourly_forecast()
    {
        Cities::factory()->create();
        $hourly_forecast = HourlyForecast::factory()->create();
        $response = $this->deleteJson("api/v1/hourly/{$hourly_forecast->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('hourly_forecasts', $hourly_forecast->toArray());
    }

}
