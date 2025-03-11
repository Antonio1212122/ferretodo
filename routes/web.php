<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\EmpleadosController;

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
    return view('home',["breadcrumbs"=>[]]);
});
route::get('/catalogo/categorias',[CatalogosController::class,'categoriasGet']);
route::get('/catalogo/categorias/agregar',[CatalogosController::class,'categoriasAgregarGet']);

route::get('/catalogo/clientes',[CatalogosController::class,'clienteGet']);
route::get('/catalogo/clientes/agregar',[CatalogosController::class,'clientesAgregarGet']);

route::get('/catalogo/empleados',[CatalogosController::class,'empleadoGet']);
route::get('/catalogo/empleados/agregar',[CatalogosController::class,'empleadosAgregarGet']);

route::get('/catalogo/proveedores',[CatalogosController::class,'proveedoresGet']);


