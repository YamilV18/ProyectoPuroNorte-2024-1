<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
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

//jwt
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
});
Route::group(['middleware' => ['jwt.auth']], function () {
    //Usuarios
    Route::get('usuarios',[UserController::class,'index'])->middleware('jwt.permission:Listar usuario');
    Route::post('usuarios',[UserController::class,'store'])->middleware('jwt.permission:Crear usuario');
    Route::put('usuarios/{usuario}',[UserController::class,'update'])->middleware('jwt.permission:Editar usuario');
    Route::get('usuarios/{usuario}',[UserController::class,'show'])->middleware('jwt.permission:Listar usuario');
    Route::delete('usuarios/{usuario}',[UserController::class,'destroy'])->middleware('jwt.permission:Eliminar usuario');
    //Productos
    Route::get('products',[ProductController::class,'index'])->middleware('jwt.permission:Listar Productos');
    Route::post('products',[ProductController::class,'store'])->middleware('jwt.permission:Crear Productos');
    Route::put('products/{product}',[ProductController::class,'update'])->middleware('jwt.permission:Editar Productos');
    Route::get('products/{product}',[ProductController::class,'show'])->middleware('jwt.permission:Listar Productos');
    Route::delete('products/{product}',[ProductController::class,'destroy'])->middleware('jwt.permission:Eliminar Productos');
    //Mesas
    Route::get('tables', [TableController::class, 'index'])->middleware('jwt.permission:Listar Mesas');
    Route::post('tables',[TableController::class,'store'])->middleware('jwt.permission:Crear Mesas');
    Route::put('tables/{table}',[TableController::class,'update'])->middleware('jwt.permission:Editar Mesas');
    Route::get('tables/{table}',[TableController::class,'show'])->middleware('jwt.permission:Listar Mesas');
    Route::delete('tables/{table}',[TableController::class,'destroy'])->middleware('jwt.permission:Eliminar Mesas');
    //Pedidos
    Route::get('orders',[OrderController::class,'index'])->middleware('jwt.permission:Listar Pedidos');
    Route::post('orders',[OrderController::class,'store'])->middleware('jwt.permission:Crear Pedidos');
    Route::put('orders/{order}',[OrderController::class,'update'])->middleware('jwt.permission:Editar Pedidos');
    Route::get('orders/{order}',[OrderController::class,'show'])->middleware('jwt.permission:Listar Pedidos');
    Route::delete('orders/{order}',[OrderController::class,'destroy'])->middleware('jwt.permission:Eliminar Pedidos');;
    //Cobranza
    Route::get('collections',[CollectionController::class,'index'])->middleware('jwt.permission:Listar Cobranza');
    Route::post('collections',[CollectionController::class,'store'])->middleware('jwt.permission:Crear Cobranza');
    Route::put('collections/{collection}',[CollectionController::class,'update'])->middleware('jwt.permission:Editar Cobranza');
    Route::get('collections/{collection}',[CollectionController::class,'show'])->middleware('jwt.permission:Listar Cobranza');
    Route::delete('collections/{collection}',[CollectionController::class,'destroy'])->middleware('jwt.permission:Eliminar Cobranza');
    //Auditoría
    Route::get('audit',[AuditController::class,'index'])->middleware('jwt.permission:Listar usuario');
    Route::post('audit',[AuditController::class,'store'])->middleware('jwt.permission:Crear usuario');
    Route::put('audit/{audit}',[AuditController::class,'update'])->middleware('jwt.permission:Editar usuario');
    Route::get('audit/{audit}',[AuditController::class,'show'])->middleware('jwt.permission:Listar usuario');
    Route::delete('audit/{audit}',[AuditController::class,'destroy'])->middleware('jwt.permission:Eliminar usuario');

});

