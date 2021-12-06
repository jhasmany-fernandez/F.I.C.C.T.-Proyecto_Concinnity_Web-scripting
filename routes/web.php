<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaProductoController;
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
    return view('login');
})->name('/');

Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);

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

    //Marcas
    Route::get('marcas', [MarcaController::class, 'index']);
    Route::get('marca/create', [MarcaController::class, 'create']);
    Route::post('marca/create', [MarcaController::class, 'store']);
    Route::get('marca/edit/{id}', [MarcaController::class, 'edit']);
    Route::post('marca/update', [MarcaController::class, 'update']);
    Route::get('marca/busqueda', [MarcaController::class, 'busqueda']);

    //Categorias
    Route::get('categorias', [CategoriaController::class, 'index']);
    Route::get('categoria/create', [CategoriaController::class, 'create']);
    Route::post('categoria/create', [CategoriaController::class, 'store']);
    Route::get('categoria/edit/{id}', [CategoriaController::class, 'edit']);
    Route::post('categoria/update', [CategoriaController::class, 'update']);
    Route::get('categoria/busqueda', [CategoriaController::class, 'busqueda']);

    //Materiales
    Route::get('materiales', [MaterialController::class, 'index']);
    Route::get('material/create', [MaterialController::class, 'create']);
    Route::post('material/create', [MaterialController::class, 'store']);
    Route::get('material/edit/{id}', [MaterialController::class, 'edit']);
    Route::post('material/update', [MaterialController::class, 'update']);
    Route::get('material/busqueda', [MaterialController::class, 'busqueda']);

    //Tallas
    Route::get('tallas', [TallaController::class, 'index']);
    Route::get('talla/create', [TallaController::class, 'create']);
    Route::post('talla/create', [TallaController::class, 'store']);
    Route::get('talla/edit/{id}', [TallaController::class, 'edit']);
    Route::post('talla/update', [TallaController::class, 'update']);
    Route::get('talla/busqueda', [TallaController::class, 'busqueda']);

    //Productos
    Route::get('productos', [ProductoController::class, 'index']);
    Route::get('producto/create', [ProductoController::class, 'create']);
    Route::post('producto/create', [ProductoController::class, 'store']);
    Route::get('producto/edit/{id}', [ProductoController::class, 'edit']);
    Route::get('producto/ver/{id}', [ProductoController::class, 'ver']);
    Route::post('producto/update', [ProductoController::class, 'update']);
    Route::post('producto/desactivar', [ProductoController::class, 'desactivar']);
    Route::post('producto/activar', [ProductoController::class, 'activar']);
    Route::get('producto/busqueda', [ProductoController::class, 'busqueda']);

    //TallaProductos
    Route::post('tallaproducto/update', [ProductoController::class, 'updateTallaProducto']);
    Route::get('tallaproducto/ver/{id}', [TallaProductoController::class, 'ver']);
    Route::post('tallaproducto/updatestock', [TallaProductoController::class, 'update']);
});