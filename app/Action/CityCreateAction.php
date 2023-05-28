<?php

namespace App\Action;

use App\Models\Cities;

class CityCreateAction
{
    public function handle($request): Cities
    {
        return Cities::create($request->validated());
    }
}
