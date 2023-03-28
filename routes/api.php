<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
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

Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);


    Route::middleware('auth:api')->group(function () {

        Route::get('/user', [AuthController::class, 'user']);

        Route::apiResource('countries', CountryController::class);
        Route::get('country/cities/{id}', [CountryController::class, 'countryCities']);
        Route::apiResource('cities', CityController::class);

        Route::post('logout', [AuthController::class, 'logout']);
    });

});
