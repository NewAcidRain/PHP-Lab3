<?php

namespace App\Http\Controllers\API;

use App\Action\DailyCreateAction;
use App\Action\DailyDeleteAction;
use App\Action\DailyGetAction;
use App\Action\DailyUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\DailyPatchRequest;
use App\Http\Requests\DailyRequest;
use App\Http\Resources\DailyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DailyForecastController extends Controller
{
    public function getDailyForecast(DailyGetAction $action, int $city_id) : AnonymousResourceCollection
    {
        return DailyResource::collection($action->handle($city_id));
    }

    public function deleteDailyForecast(DailyDeleteAction $action, $id): DailyResource
    {
        return new DailyResource($action->handle($id));
    }

    public function createDailyForecast(DailyRequest $request, DailyCreateAction $action): DailyResource
    {
        return new DailyResource($action->handle($request));
    }

    public function updateDailyForecast($id, DailyUpdateAction $action, DailyRequest $request): DailyResource
    {
        return new DailyResource($action->handel($id, $request->validated()));
    }

    public function patchDailyForecast($id, DailyUpdateAction $action, DailyPatchRequest $request): DailyResource
    {
        return new DailyResource($action->handel($id, $request->validated()));
    }
}
