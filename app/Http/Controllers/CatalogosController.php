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

    public function categoriasAgregarPost(Request $request) {
        // Obtener los datos del formulario
        $nombre = $request->input("nombre");
        $descripción = $request->input("descripción");
    
        // Crear la nueva categoría
        $categoria = new Categoria([
            "nombre" => strtoupper($nombre),
            "descripción" => $descripción,
        ]);
        $categoria->save();
    
        // Redirigir a la vista de categorías con un mensaje de éxito
        return redirect("/catalogo/categorias")->with('success', 'Categoría agregada correctamente');
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

    public function empleadosAgregarPost(Request $request)
    {
        try {
            // Validar los datos del formulario antes de guardar
            $request->validate([
                'nombre'   => 'required|string|max:50',
                'puesto'   => 'required|string|max:50',
                'telefono' => 'required|string|max:15',
                'email'    => 'required|email|max:50|unique:empleado,email',
            ]);

            // Crear el nuevo empleado
            $empleado = new Empleado();
            $empleado->nombre = strtoupper($request->input("nombre"));
            $empleado->puesto = $request->input("puesto");
            $empleado->telefono = $request->input("telefono");
            $empleado->email = $request->input("email");
            $empleado->save();

            // Redirigir con un mensaje de éxito
            return redirect(url('/catalogo/empleados'))->with('success', 'Empleado agregado correctamente.');
            
        } catch (\Exception $e) {
            // Capturar errores y devolver una respuesta clara
            return redirect()->back()->with('error', 'Ocurrió un error: ' . $e->getMessage());
        }
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
    public function ventasGet(): View
{
    $ventas = DB::table('venta')
        ->join('empleado', 'venta.fk_id_empleado', '=', 'empleado.id_empleado')
        ->join('cliente', 'venta.fk_id_cliente', '=', 'cliente.id_cliente')
        ->join('producto', 'venta.fk_id_producto', '=', 'producto.id_producto')
        ->select(
            'venta.id_venta',
            'venta.fecha',
            'empleado.nombre as nombre_empleado',
            'cliente.nombre as nombre_cliente',
            'producto.nombre as nombre_producto'
        )
        ->get();

    return view('catalogos.ventasGet', [
        "ventas" => $ventas,
        "breadcrumbs" => [
            "Inicio" => URL("/"),
            "ventas" => URL("/catalogo/ventas")
        ]
    ]);
}
public function comprasGet()
{
    $compras = DB::table('compra')
        ->join('proveedor', 'compra.fk_id_proveedor', '=', 'proveedor.id_proveedor')
        ->select('compra.id_compra', 'compra.fecha', 'compra.total', 'proveedor.nombre as nombre_proveedor')
        ->get();

    return view('catalogos.comprasGet', [
        "compras" => $compras,
        "breadcrumbs" => [
            "Inicio" => URL("/"),
            "Compras" => URL("/catalogo/compra")
        ]
    ]);
}
    
}