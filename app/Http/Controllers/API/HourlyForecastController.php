<?php

namespace App\Http\Controllers\API;

use App\Action\HourlyCreateAction;
use App\Action\HourlyDeleteAction;
use App\Action\HourlyGetAction;
use App\Action\HourlyUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\HourlyPatchRequest;
use App\Http\Requests\HourlyRequest;
use App\Http\Resources\HourlyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HourlyForecastController extends Controller
{
    public function getHourlyForecast(HourlyGetAction $action, int $city_id) : AnonymousResourceCollection
    {
        return HourlyResource::collection($action->handle($city_id));
    }

    public function deleteHourlyForecast(HourlyDeleteAction $action, $id): HourlyResource
    {
        return new HourlyResource($action->handle($id));
    }

    public function createHourlyForecast(HourlyRequest $request, HourlyCreateAction $action): HourlyResource
    {
        return new HourlyResource($action->handle($request));
    }

    public function updateHourlyForecast($id, HourlyUpdateAction $action, HourlyRequest $request): HourlyResource
    {
        return new HourlyResource($action->handel($id, $request->validated()));
    }

    public function patchHourlyForecast($id, HourlyUpdateAction $action, HourlyPatchRequest $request): HourlyResource
    {
        return new HourlyResource($action->handel($id, $request->validated()));
    }
}
