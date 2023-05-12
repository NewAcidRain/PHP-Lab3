<?php

namespace App\Action;

use App\Models\HourlyForecast;

class HourlyUpdateAction
{
    public function handel($id, $new)
    {
        $hourly_forecast = HourlyForecast::findOrFail($id);
        $hourly_forecast->update($new);
        return $hourly_forecast;
    }

}
