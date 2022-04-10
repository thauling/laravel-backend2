<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RecipeController;
use App\Http\Controllers\API\Auth\UserController;

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
Route::post('register', [UserController::class, 'create']);
Route::post('login', [UserController::class, 'login']);

// Route::prefix('recipe')->group(function () {
//     Route::get('/',[ RecipeController::class, 'getAll']);
//     Route::post('/',[ RecipeController::class, 'create']);
//     Route::delete('/{id}',[ RecipeController::class, 'delete']);
//     Route::get('/{id}',[ RecipeController::class, 'get']);
//     Route::put('/{id}',[ RecipeController::class, 'update']);
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('recipe')->group(function () {
        Route::get('/',[ RecipeController::class, 'getAll']);
        Route::get('/{id}',[ RecipeController::class, 'get']);
        Route::post('/',[ RecipeController::class, 'create']);
        Route::put('/{id}',[ RecipeController::class, 'update']);
        Route::delete('/{id}',[ RecipeController::class, 'delete']);
       
    });


    Route::post('logout', [UserController::class, 'logout']);
});
