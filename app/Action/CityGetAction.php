<?php

namespace App\Action;

use App\Models\Cities;

class CityGetAction
{
    public function handle($id): Cities
    {

        return Cities::findOrFail($id);
    }
}
