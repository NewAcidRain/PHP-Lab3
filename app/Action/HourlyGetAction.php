<?php

namespace App\Action;
use App\Models\HourlyForecast;


class HourlyGetAction
{
    public function handle($city_id)
    {
        $hourly = HourlyForecast::all()->where('city_id','=',$city_id);
        if (!$hourly->first()){
            abort(404);
        }
        return $hourly;
    }
}
