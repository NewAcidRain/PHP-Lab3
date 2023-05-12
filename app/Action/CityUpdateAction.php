<?php

namespace App\Action;

use App\Models\Cities;

class CityUpdateAction
{
    public function handel($id, $new): Cities
    {
        $hourly_forecast = Cities::findOrFail($id);
        $hourly_forecast->update($new);
        return $hourly_forecast;
    }
}
