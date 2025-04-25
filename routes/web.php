<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::post('/catalogo/categorias/agregar',[CatalogosController::class,'categoriasAgregarPost']);

route::get('/catalogo/clientes',[CatalogosController::class,'clienteGet']);
route::get('/catalogo/clientes/agregar',[CatalogosController::class,'clientesAgregarGet']);
Route::post('/catalogo/clientes/agregar',[CatalogosController::class,'clientesAgregarPost']);

route::get('/catalogo/empleados',[CatalogosController::class,'empleadoGet']);
route::get('/catalogo/empleados/agregar',[CatalogosController::class,'empleadosAgregarGet']);
Route::post('/catalogos/empleados/agregar',[CatalogosController::class,'empleadosAgregarPost']);

route::get('/catalogo/proveedores',[CatalogosController::class,'proveedoresGet']);

route::get('/catalogo/productos',[CatalogosController::class,'productosGet']);
Route::get("/catalogo/ventas", [CatalogosController::class, "ventasGet"]);/////
Route::get("/catalogo/ventas/agregar", [CatalogosController::class, "ventasAgregarGet"]);//////
Route::post("/catalogos/ventas/agregar", [CatalogosController::class, "ventasAgregarPost"]);/////////

route::get('/catalogo/compra',[CatalogosController::class,'comprasGet']);

route::get('/catalogo/proveedores/agregar',[CatalogosController::class,'proveedoresAgregarGet']);
Route::post('/catalogos/proveedores/agregar', [CatalogosController::class, 'proveedoresAgregarPost']);
route::get('/catalogo/productos/agregar',[CatalogosController::class,'productosAgregarGet']);
Route::post('/catalogos/productos/agregar',[CatalogosController::class,'productosAgregarPost']);

route::get('/reportes',[ReportesController::class,'indexGet']);
Route::get("/reportes/compras", [ReportesController::class, "comprasGet"]);
Route::get("/reportes/ventas", [ReportesController::class, "ventasGet"]);
Route::get("/reportes/productos_mas_vendidos", [ReportesController::class, "productosGet"]);

Route::get("/login", [LoginController::class, 'showLoginForm'])->name('login');
Route::post("/login", [LoginController::class, 'login']);
Route::post("/logout", [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/catalogo/compras/agregar', [CatalogosController::class, 'comprasAgregarGet']);
Route::post('/catalogos/compras', [CatalogosController::class, 'comprasAgregarPost']);