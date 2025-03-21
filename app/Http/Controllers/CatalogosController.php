<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\models\puesto;
use Illuminate\Http\Request;
use datatime;
use Illuminate\view\View;
use App\models\empleado;
use App\models\det_emp_puesto;
use App\models\categoria;
use App\models\cliente;
use App\models\proveedor;
use App\models\producto;
class CatalogosController extends Controller
{
    public function home():view
    {
        return view('home',["breadcrumbs"=>[]]);
    }
    public function categoriasGet(): View
    {
        $categorias = categoria::all(); // La clase 'Puesto' debe estar en mayúscula si sigue el estándar de Laravel
        return view('catalogos.categoriasGet', [
            "categorias" => $categorias, 
            "breadcrumbs" => [
                    "Inicio" => URL("/"), 
                    "categorias" => URL("/catalogo/categorias")
                ]
            ]);
        }
// esto es un cambio prueba
    public function categoriasAgregarGet(): View
    {
        return view('catalogos.categoriasAgregarGet',[
            "breadcrumbs" =>[
                "Inicio" =>url("/"),
                "Puestos" => url("/catalogo/categorias"),
                "Agregar" => url("/catalogo/categorias/agregar")
            ]
        ]);
    }

    public function clienteGet(): View
    {
        $clientes = cliente::all(); // La clase 'Empleado' debe estar en mayúscula si sigue el estándar de Laravel
        return view('catalogos.clientesGet', [
            "clientes" => $clientes, 
            "breadcrumbs" => [
                    "Inicio" => URL("/"), 
                    "clientes" => URL("/catalogo/clientes")
                ]
            ]);
        }

    public function clientesAgregarGet(): View
    {
        return view('catalogos.clientesAgregarGet',[
            "breadcrumbs" =>[
                "Inicio" =>url("/"),
                "Puestos" => url("/catalogo/clientes"),
                "Agregar" => url("/catalogo/clientes/agregar")
            ]
        ]);
    }

    public function empleadoGet(): View
    {
        $empleados = Empleado::all(); // Asegúrate de que la clase "Empleado" tenga la mayúscula inicial
        
        return view('catalogos.empleadosGet', [
            "empleados" => $empleados,  // Ahora sí pasamos la variable correcta
            "breadcrumbs" => [
                "Inicio" => URL("/"), 
                "empleados" => URL("/catalogo/empleados")
            ]
        ]);
    }

    public function empleadosAgregarGet(): View
    {
        return view('catalogos.empleadosAgregarGet',[
            "breadcrumbs" =>[
                "Inicio" =>url("/"),
                "Empleados" => url("/catalogos/empleados"),
                "Agregar" => url("/catalogos/empleados/agregar")
            ]
        ]);
    }

    public function proveedoresGet(): View
    {
        $proveedores = proveedor::all(); // Asegúrate de que la clase "Empleado" tenga la mayúscula inicial
        
        return view('catalogos.proveedoresGet', [
            "proveedores" => $proveedores,  // Ahora sí pasamos la variable correcta
            "breadcrumbs" => [
                "Inicio" => URL("/"), 
                "productos" => URL("/catalogo/proveedor")
            ]
        ]);
    }

    public function productosGet(): View
    {
        $productos = DB::table('producto')
            ->join('categoria', 'producto.fk_id_categoria', '=', 'categoria.id_categoria')
            ->select('producto.*', 'categoria.nombre as nombre_categoria')
            ->get();
    
        return view('catalogos.productosGet', [
            "productos" => $productos,
            "breadcrumbs" => [
                "Inicio" => URL("/"),
                "productos" => URL("/catalogo/productos")
            ]
        ]);
    }
    
    }
    
