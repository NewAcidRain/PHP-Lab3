<?php

namespace App\Action;
use App\Models\HourlyForecast;

class HourlyCreateAction
{
    public function handle($request) : HourlyForecast
    {
        return HourlyForecast::create($request->validated());
    }

}
