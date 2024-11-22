<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UkmController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LecturerController;
use App\Http\Controllers\Api\ScheduleController;

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

Route::apiResource('/schedules', ScheduleController::class);
Route::apiResource('/courses', CourseController::class);
Route::apiResource('lecturers', LecturerController::class);
Route::apiResource('ukms', UkmController::class);
