<?php

namespace App\Action;

use App\Models\DailyForecast;

class DailyUpdateAction
{
    public function handel($id, $new): DailyForecast
    {
        $hourly_forecast = DailyForecast::findOrFail($id);
        $hourly_forecast->update($new);
        return $hourly_forecast;
    }
}
