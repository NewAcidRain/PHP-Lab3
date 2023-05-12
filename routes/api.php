<?php

use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\DailyForecastController;
use App\Http\Controllers\API\HourlyForecastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/hourly/{city_id}', [HourlyForecastController::class, 'getHourlyForecast']);
Route::delete('v1/hourly/{id}', [HourlyForecastController::class, 'deleteHourlyForecast']);
Route::post('v1/hourly/', [HourlyForecastController::class, 'createHourlyForecast']);
Route::put('v1/hourly/{id}', [HourlyForecastController::class, 'updateHourlyForecast']);
Route::patch('v1/hourly/{id}', [HourlyForecastController::class, 'patchHourlyForecast']);

Route::get('v1/daily/{city_id}', [DailyForecastController::class, 'getDailyForecast']);
Route::delete('v1/daily/{id}', [DailyForecastController::class, 'deleteDailyForecast']);
Route::post('v1/daily/', [DailyForecastController::class, 'createDailyForecast']);
Route::put('v1/daily/{id}', [DailyForecastController::class, 'updateDailyForecast']);
Route::patch('v1/daily/{id}', [DailyForecastController::class, 'patchDailyForecast']);

Route::get('v1/city/{id}', [CityController::class, 'getCity']);
Route::delete('v1/city/{id}', [CityController::class, 'deleteCity']);
Route::post('v1/city/', [CityController::class, 'createCity']);
Route::put('v1/city/{id}', [CityController::class, 'updateCity']);
Route::patch('v1/city/{id}', [CityController::class, 'patchCity']);
