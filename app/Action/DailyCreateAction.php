<?php

namespace App\Action;

use App\Models\DailyForecast;

class DailyCreateAction
{
    public function handle($request) : DailyForecast
    {
        return DailyForecast::create($request->validated());
    }
}
