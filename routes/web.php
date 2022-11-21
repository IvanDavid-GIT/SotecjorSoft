<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\materialController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\medidaController;
use App\Http\Controllers\reporteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\proyectodeobraController;
use App\Http\Controllers\entradaController;
use App\Http\Controllers\salidaController;


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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//AUTH
Auth::routes();

//Dashboard

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('index', [DashboardController::class, 'index'])->name('index');
});

//Rutas usuarios


Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function () {
    Route::get('index', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('edit/{users}', [UserController::class, 'edit'])->name('edit');
    Route::post('update/{users}', [UserController::class, 'update'])->name('update');
});

Route::get('/usuario/cambiar/estado/{id}/{estado}', [App\Http\Controllers\UserController::class, 'updateState']);
Route::get('/usuario/listar', [App\Http\Controllers\UserController::class, 'listar']);


//Rutas Categorias
Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function () {
    Route::get('index', [categoriaController::class, 'index'])->name('index');
    Route::get('create', [categoriaController::class, 'create'])->name('create');
    Route::post('store', [categoriaController::class, 'store'])->name('store');
    Route::delete('destroy/{categoria}', [categoriaController::class, 'destroy'])->name('destroy');
    Route::get('edit/{categoria}', [categoriaController::class, 'edit'])->name('edit');
    Route::post('update/{categoria}', [categoriaController::class, 'update'])->name('update');
});

Route::get('/categoria/cambiar/estado/{id}/{estado}', [App\Http\Controllers\categoriaController::class, 'updateState']);
Route::get('/categoria/listar', [App\Http\Controllers\categoriaController::class, 'listar']);

//Rutas Materiales
Route::group(['prefix' => 'material', 'as' => 'material.'], function () {
    Route::get('index', [materialController::class, 'index'])->name('index');
    Route::get('create', [materialController::class, 'create'])->name('create');
    Route::post('store', [materialController::class, 'store'])->name('store');
    Route::delete('destroy/{material}', [materialController::class, 'destroy'])->name('destroy');
    Route::get('edit/{materiales}', [materialController::class, 'edit'])->name('edit');
    Route::post('update/{materiales}', [materialController::class, 'update'])->name('update');
});

Route::get('/material/cambiar/estado/{id}/{Estado}', [App\Http\Controllers\materialController::class, 'updateState']);
Route::get('/material/listar', [App\Http\Controllers\materialController::class, 'listar']);
Route::get('/material/obtenerCantidad', [App\Http\Controllers\materialController::class, 'obtenerCantidad']);

//Rutas medidas
Route::group(['prefix' => 'medidas', 'as' => 'medidas.'], function () {
    Route::get('index', [medidaController::class, 'index'])->name('index');
    Route::get('create', [medidaController::class, 'create'])->name('create');
    Route::post('store', [medidaController::class, 'store'])->name('store');
    Route::delete('destroy/{medidas}', [medidaController::class, 'destroy'])->name('destroy');
    Route::get('edit/{medidas}', [medidaController::class, 'edit'])->name('edit');
    Route::post('update/{medidas}', [medidaController::class, 'update'])->name('update');
});

Route::get('/medidas/cambiar/estado/{id}/{Estado}', [App\Http\Controllers\medidaController::class, 'updateState']);
Route::get('/medidas/listar', [App\Http\Controllers\medidaController::class, 'listar']);



//Rutas entradas
Route::group(['prefix' => 'entradas', 'as' => 'entradas.'], function () {
    Route::get('index', [entradaController::class, 'index'])->name('index');
    Route::get('create', [entradaController::class, 'create'])->name('create');
    Route::post('store', [entradaController::class, 'store'])->name('store');
    Route::delete('destroy/{entradas}', [entradaController::class, 'destroy'])->name('destroy');
    Route::get('detalle', [entradaController::class, 'detalle'])->name('detalle');
    Route::post('update/{entradas}', [entradaController::class, 'update'])->name('update');
});

Route::post('/entradas/cambiar/estado', [App\Http\Controllers\entradaController::class, 'updateState']);
Route::get('/entradas/listar', [App\Http\Controllers\entradaController::class, 'listar']);


//Rutas salidas
Route::group(['prefix' => 'salidas', 'as' => 'salidas.'], function () {
    Route::get('index', [salidaController::class, 'index'])->name('index');
    Route::get('create', [salidaController::class, 'create'])->name('create');
    Route::post('store', [salidaController::class, 'store'])->name('store');
    Route::delete('destroy/{salidas}', [salidaController::class, 'destroy'])->name('destroy');
    Route::get('detalle', [salidaController::class, 'detalle'])->name('detalle');
    Route::post('update/{salidas}', [salidaController::class, 'update'])->name('update');
});

Route::post('/salidas/cambiar/estado', [App\Http\Controllers\salidaController::class, 'updateState']);
Route::get('/salidas/listar', [App\Http\Controllers\salidaController::class, 'listar']);




//Rutas proyectos de obras
Route::group(['prefix' => 'proyectosdeobras', 'as' => 'proyectosdeobras.'], function () {
    Route::get('index', [proyectodeobraController::class, 'index'])->name('index');
    Route::get('create', [proyectodeobraController::class, 'create'])->name('create');
    Route::post('store', [proyectodeobraController::class, 'store'])->name('store');
    Route::delete('destroy/{proyectosdeobras}', [proyectodeobraController::class, 'destroy'])->name('destroy');
    Route::get('edit/{proyectosdeobras}', [proyectodeobraController::class, 'edit'])->name('edit');
    Route::post('update/{proyectosdeobras}', [proyectodeobraController::class, 'update'])->name('update');
});

Route::get('/proyectosdeobras/cambiar/estado/{id}/{estado}', [App\Http\Controllers\proyectodeobraController::class, 'updateState']);
Route::get('/proyectosdeobras/listar', [App\Http\Controllers\proyectodeobraController::class, 'listar']);


//Rutas Reportes
Route::group(['prefix' => 'reporte', 'as' => 'reporte.'], function () {
    Route::get('index', [reporteController::class, 'index'])->name('index');
});

Route::post('reporte/fechaEntradas/export', [App\Http\Controllers\reporteController::class, 'export']);

Route::get('reporte/reporte/materialesReport/exportM', [App\Http\Controllers\reporteController::class, 'exportM']);