<?php

namespace App\Action;

use App\Http\Resources\HourlyResource;
use App\Models\HourlyForecast;
use Illuminate\Auth\Access\Response;


class HourlyDeleteAction
{
    public function handle($id) : HourlyForecast
    {
        $hourly_delete = HourlyForecast::findOrFail($id);

        $hourly_delete->delete();

        return $hourly_delete;

    }
}
