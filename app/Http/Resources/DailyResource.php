<?php

namespace App\Http\Resources;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyResource extends JsonResource
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
            'precipitation' => $this->precipitation,
            'wind' => $this->wind,
            'humidity' => $this->humidity,
            'city_id' => $this->city_id,
            'date' => $this->date
        ];
    }
}
