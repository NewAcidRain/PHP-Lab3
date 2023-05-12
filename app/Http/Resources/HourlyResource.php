<?php

namespace App\Http\Resources;

use App\Models\Cities;
use App\Models\HourlyForecast;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HourlyResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'temperature' => $this->temperature,
            'type' => $this->type,
            'city_id' => $this->city_id,
            'date' => $this->date,
        ];
    }
}
