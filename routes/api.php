<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Publicacion;
use App\Http\Controllers\PublicacionesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/publicaciones', [PublicacionesController::class, 'getAll']);
Route::get('/publicaciones/{id}', [PublicacionesController::class, 'find']);
Route::post('/publicaciones/', [PublicacionesController::class, 'create']);
Route::put('/publicaciones/{id}', [PublicacionesController::class, 'update']);
Route::delete('/publicaciones/{id}', [PublicacionesController::class, 'delete']);