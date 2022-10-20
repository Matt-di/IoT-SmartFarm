<?php

use App\Http\Controllers\Api\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/devices', [DeviceController::class, 'index']);
Route::post('/device/{device}/toggle', [DeviceController::class, 'toggleMotor']);
Route::post('/device/{device}/toggleMode', [DeviceController::class, 'toggleMode']);
Route::get('/device/{device}/setting', [DeviceController::class, 'setting']);
Route::post('/device/{device}/setting', [DeviceController::class, 'updateSetting']);


Route::get('/device/{device}/sensor', [DeviceController::class, 'data']);
Route::post('/device/{device}/sensor', [DeviceController::class, 'storeSensorData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
