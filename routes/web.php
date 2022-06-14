<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//administracion
use App\Http\Controllers\administracion;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//administracion de usuario

Route::get('administracion', [administracion::class,'index']);
Route::get('administracion/usuarios/eliminados', [administracion::class,'eliminados']);
Route::get('administracion/usuarios/create', [administracion::class,'create']);
Route::get('administracion/usuarios/restaurar/{id}',[ administracion::class , 'restaurar']);
Route::get('administracion/usuarios/destroy/{id}',[ administracion::class , 'destroy']);
Route::post('administracion/usuarios/store', [administracion::class,'store']);
Route::get('administracion/usuarios/edit/{id}', [administracion::class,'edit']);// ->can('administracion');
Route::post('administracion/usuarios/update/{id}', [administracion::class,'update']);

//roles

Route::get('administracion/roles', [administracion::class,'indexROL']);
Route::get('administracion/roles/create', [administracion::class,'createROL']);
Route::post('administracion/roles/store', [administracion::class,'storeROL']);
Route::get('administracion/roles/destroy/{id}',[ administracion::class , 'destroyROL']);
Route::get('administracion/roles/eliminados', [administracion::class,'eliminadosROL']);
Route::get('administracion/roles/restaurar/{id}',[ administracion::class , 'restaurarROL']);
Route::get('administracion/roles/edit/{id}', [administracion::class,'editROL']);
Route::post('administracion/roles/update/{id}', [administracion::class,'updateROL']);

//permiso

Route::get('administracion/permisos/{id}', [administracion::class,'indexPERMISO']);
Route::post('administracion/permisos/update/{id}', [administracion::class,'updatePERMISO']);