<?php

namespace App\Action;

use App\Models\DailyForecast;

class DailyDeleteAction
{
    public function handle($id) : DailyForecast
    {
        $daily_delete = DailyForecast::findOrFail($id);

        $daily_delete->delete();

        return $daily_delete;

    }
}
