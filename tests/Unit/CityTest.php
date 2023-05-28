<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cities;

class CityTest extends TestCase
{
    /** @test */
    public function test_get_city()
    {
        $city = Cities::factory()->create();
        $response = $this->getJson("/api/v1/city/{$city->id}");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "id" => $city->id,
            "name" => $city->name
        ]);
    }

    public function test_city_create()
    {
        $city = Cities::factory()->raw();
        $response = $this->postJson('/api/v1/city', $city);
        $response->assertStatus(201);
        $this->assertDatabaseHas('cities', $city);
    }

    public function test_city_update()
    {
        $city = Cities::factory()->create();
        $city_row = Cities::factory()->raw();
        $response = $this->putJson("/api/v1/city/{$city->id}", $city_row);
        $response->assertStatus(200);
        $this->assertDatabaseHas('cities', $city_row);
    }

    public function test_city_delete()
    {
        $city = Cities::factory()->create();
        $response = $this->deleteJson("api/v1/city/{$city->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('cities', $city->toArray());
    }
}
