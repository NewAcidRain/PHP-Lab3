<?php

namespace App\Action;

use App\Models\Cities;

class CityDeleteAction
{
    public function handle($id): Cities
    {
        $city_delete = Cities::findOrFail($id);
        $city_delete->delete();
        return $city_delete;
    }
}
