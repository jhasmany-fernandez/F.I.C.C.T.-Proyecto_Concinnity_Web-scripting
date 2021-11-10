<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard/index');
});

//Roles
Route::get('roles', [RolController::class, 'index']);
Route::post('rol/desactivar', [RolController::class, 'desactivar']);
Route::post('rol/activar', [RolController::class, 'activar']);

//Users
Route::get('users', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user/create', [UserController::class, 'store']);
Route::get('user/edit/{id}', [UserController::class, 'edit']);
Route::post('user/update', [UserController::class, 'update']);
Route::post('user/desactivar', [UserController::class, 'desactivar']);
Route::post('user/activar', [UserController::class, 'activar']);
Route::get('user/busqueda', [UserController::class, 'busqueda']);

//Clientes
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('cliente/create', [ClienteController::class, 'create']);
Route::post('cliente/create', [ClienteController::class, 'store']);
Route::get('cliente/edit/{id}', [ClienteController::class, 'edit']);
Route::post('cliente/update', [ClienteController::class, 'update']);
Route::get('cliente/busqueda', [ClienteController::class, 'busqueda']);