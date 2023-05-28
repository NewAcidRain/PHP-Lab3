<?php

namespace App\Http\Controllers\API;

use App\Action\CityCreateAction;
use App\Action\CityDeleteAction;
use App\Action\CityGetAction;
use App\Action\CityUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityPatchRequest;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    public function getCity(string $id, CityGetAction $action): CityResource
    {
        return new CityResource($action->handle($id));
    }

    public function createCity(CityRequest $request, CityCreateAction $action): CityResource
    {
        return new CityResource($action->handle($request));
    }

    public function updateCity($id, CityUpdateAction $action, CityRequest $request): CityResource
    {
        return new CityResource($action->handel($id, $request->validated()));
    }

    public function deleteCity(CityDeleteAction $action, $id): CityResource
    {
        return new CityResource($action->handle($id));
    }

    public function patchCity($id, CityPatchRequest $request, CityUpdateAction $action): CityResource
    {
        return new CityResource($action->handel($id,$request->validated()));
    }
}
