<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutentificacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
        ->name('index')
        ->middleware('auth');

Route::get('/login', [AutentificacionController::class, 'index'])
        ->name('login');
Route::post('/do-login', [AutentificacionController::class, 'doLogin'])
        ->name('do-login');
Route::get('/logout', [AutentificacionController::class, 'logout'])->name('logout');
Route::get('/registro-nuevo-usuario', [AutentificacionController::class, 'registroNuevoUsuario'])
        ->name('registro-nuevo-usuario');
Route::post('/do-registro', [AutentificacionController::class, 'doRegistro'])
        ->name('do-registro');

Route::get('/new',[PublicacionController::class,'create'])->middleware('auth');
Route::post('/pub',[PublicacionController::class,'store'])->middleware('auth');
Route::get('/resultados',[PerfilController::class,'perfil'])->middleware('auth');
Route::post('/seguir',[PerfilController::class,'seguir'])->middleware('auth');
Route::delete('/seguir',[PerfilController::class,'seguir'])->middleware('auth');
Route::get('/edit/{id}',[PerfilController::class,'editar'])->middleware('auth');
Route::patch('/editar/{id}',[PerfilController::class,'updateperfil'])->middleware('auth');

Route::get('/perfiles/{id}', [PerfilController::class, 'index'])
        ->name('Perfil.show')
        ->middleware('auth');