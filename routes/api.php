<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

Route::post('/devices/register', [DeviceController::class, 'register']);
Route::post('/devices/{device_id}/lock', [DeviceController::class, 'lock']);
Route::middleware('auth:sanctum')->post('/devices/{device_id}/unlock', [DeviceController::class, 'unlock']);
