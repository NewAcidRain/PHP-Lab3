<?php

namespace App\Action;

use App\Models\DailyForecast;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Collection;


class DailyGetAction
{
    public function handle($city_id): JsonResponse | Collection
    {
        $daily = DailyForecast::all()->where('city_id', '=', $city_id);
        if (!$daily->first()){
            abort(404);
        }
        return $daily;
    }
}
