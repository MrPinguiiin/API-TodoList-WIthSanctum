<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\AuthController;
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

// Route::group([ 'middleware' => 'api', 'prefix' => 'auth:sanctum' ], function ($router) {
//     Route::post('register', AuthController::class, 'register');
//     Route::get('login', AuthController::class);
//     Route::post('logout', AuthController::class);
//     Route::post('refresh', AuthController::class);
//     Route::post('me', 'AuthController::class');
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', RegisterController::class);
Route::get('login', LoginController::class);


Route::middleware('auth:sanctum')->apiResource('todos', TodoController::class);


