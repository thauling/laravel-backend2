<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RecipeController;

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
Route::prefix('recipe')->group(function () {
    Route::get('/',[ RecipeController::class, 'getAll']);
    Route::post('/',[ RecipeController::class, 'create']);
    Route::delete('/{id}',[ RecipeController::class, 'delete']);
    Route::get('/{id}',[ RecipeController::class, 'get']);
    Route::put('/{id}',[ RecipeController::class, 'update']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
