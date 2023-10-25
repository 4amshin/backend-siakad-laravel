<?php

use App\Http\Controllers\Api\AbsensiMatkulController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KhsController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//api for get user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api for login
Route::post('/login', [AuthController::class, 'login']);

//api for logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

//api for get schedules
Route::apiResource('schedules', ScheduleController::class)
    ->middleware('auth:sanctum');

//api for schedules-2
// Route::middleware(['auth:sanctum'])->group(function() {
//     Route::apiResource('schedules', ScheduleController::class);
// });

//api for Khs
Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('khs', KhsController::class);
});

//api for AbsensiMatkul
Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('absensi', AbsensiMatkulController::class);
});
