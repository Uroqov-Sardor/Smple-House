<?php

use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\HomeCardImgApiController;
use App\Http\Controllers\Api\HomeCardNoodleApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// *********************************************************************************** //
# *********************************** HOME MODELS *********************************** #
// *********************************************************************************** //
// HOME //
Route::apiResource('home',HomeApiController::class);

// HOME CARD IMG //
Route::apiResource('homeCardImg',HomeCardImgApiController::class);

// HOME CARD NOODLE
Route::apiResource('homeCardNoodle',HomeCardNoodleApiController::class);