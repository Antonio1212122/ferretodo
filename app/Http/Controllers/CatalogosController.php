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
use App\models\compra;
use App\models\detallecompra;
use App\Models\venta;
use App\Models\detalleventa;
class CatalogosController extends Controller
{
    public function home():view
    {
        return view('home',["breadcrumbs"=>[]]);
    }
    public function categoriasGet(): View
    {
        $categorias = Categoria::all(); // La clase 'Puesto' debe estar en mayúscula si sigue el estándar de Laravel
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
                "Categorias" => url("/catalogo/categorias"),
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
        $clientes = Cliente::all(); // La clase 'Empleado' debe estar en mayúscula si sigue el estándar de Laravel
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
                "Clientes" => url("/catalogo/clientes"),
                "Agregar" => url("/catalogo/clientes/agregar")
            ]
        ]);
    }

    public function clientesAgregarPost(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $email = $request->input('email');

        // Crear una nueva instancia del modelo Cliente
        $cliente = new Cliente([
            'nombre' => strtoupper($nombre),  // Convertir a mayúsculas
            'apellido' => strtoupper($apellido),
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email
        ]);

        $cliente->save();

        // Redirigir a la vista de clientes con un mensaje de éxito
        return redirect('/catalogo/clientes')->with('success', 'Cliente agregado correctamente');
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
        $proveedores = Proveedor::all(); // Asegúrate de que la clase "Empleado" tenga la mayúscula inicial
        
        return view('catalogos.proveedoresGet', [
            "proveedores" => $proveedores,  // Ahora sí pasamos la variable correcta
            "breadcrumbs" => [
                "Inicio" => URL("/"), 
                "proveedores" => URL("/catalogos/proveedor")
            ]
        ]);
    }
    public function proveedoresAgregarGet(): View
    {
        return view('catalogos.proveedoresAgregarGet',[
            "breadcrumbs" =>[
                "Inicio" =>url("/"),
                "Proveedores" => url("/catalogo/proveedor"),
                "Agregar" => url("/catalogos/proveedores/agregar")
            ]
        ]);
    }
    public function proveedoresAgregarPost(Request $request)
    {
        $nombre = $request->input("nombre");
    
        $proveedor = new Proveedor([
            "nombre" => ($nombre)
        ]);
    
        $proveedor->save();
    
        return redirect("/catalogo/proveedores");
    }

    public function productosGet(): View
{
    $productos = DB::table('producto')
        ->leftJoin('categoria', 'producto.fk_id_categoria', '=', 'categoria.id_categoria')
        ->select('producto.*', 'categoria.nombre as nombre_categoria')
        ->orderBy('producto.id_producto', 'DESC')
        ->get();

    $categorias = DB::table('categoria')->get(); // Obtiene todas las categorías

    return view('catalogos.productosGet', [
        "productos" => $productos,
        "categorias" => $categorias, // Pasamos las categorías a la vista
        "breadcrumbs" => [
            "Inicio" => URL("/"),
            "Productos" => URL("/catalogos/productos")
        ]
    ]);
}
    public function productosAgregarGet()
    {
        $productos = Producto::all(); // Obtener todos los productos
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
    
        return view('catalogos.productosAgregarGet', [
            "productos" => $productos,
            "categorias" => $categorias, // Agregar las categorías
            "breadcrumbs" => [
                "Inicio" => URL("/"),
                "productos" => URL("/catalogo/productos"),
                "Agregar" => URL("/catalogo/productos/agregar")
            ]
        ]);
    }
    public function productosAgregarPost(Request $request)
    {
        // Obtener los datos del formulario
        $nombre = $request->input("nombre");
        $descripcion = $request->input("descripcion");
        $cantidad = $request->input("cantidad");
        $precio_unitario = $request->input("precio_unitario");
        $precio_venta = $request->input("precio_venta");
        $fk_id_categoria = $request->input("fk_id_categoria");
    
        // Crear una nueva instancia de Producto
        $producto = new Producto([
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "cantidad" => $cantidad,
            "precio_unitario" => $precio_unitario,
            "precio_venta" => $precio_venta,
            "fk_id_categoria" => $fk_id_categoria
        ]);
    
        // Guardar en la base de datos
        $producto->save();
    
        // Redirigir a la lista de productos
        return redirect("/catalogo/productos");
    }
    public function ventasGet(): View
    {
        $ventas = DB::table('venta')
            ->join('empleado', 'venta.fk_id_empleado', '=', 'empleado.id_empleado')
            ->join('cliente', 'venta.fk_id_cliente', '=', 'cliente.id_cliente')
            ->leftJoin('detalle_venta', 'venta.id_venta', '=', 'detalle_venta.fk_id_venta')
            ->leftJoin('producto', 'detalle_venta.fk_id_producto', '=', 'producto.id_producto')
            ->select(
                'venta.id_venta',
                'venta.fecha',
                'empleado.nombre as nombre_empleado',
                'cliente.nombre as nombre_cliente',
                DB::raw('GROUP_CONCAT(producto.nombre SEPARATOR ", ") as nombres_productos'),
                DB::raw('SUM(detalle_venta.importe) as importe_total_venta') 
            )
            ->groupBy('venta.id_venta', 'venta.fecha', 'empleado.nombre', 'cliente.nombre')
            ->orderBy('venta.id_venta', 'DESC')
            ->get();
    
        return view('catalogos.ventasGet', [
            "ventas" => $ventas,
            "breadcrumbs" => [
                "Inicio" => URL("/"),
                "ventas" => URL("/catalogo/ventas")
            ]
        ]);
    }////////
    public function ventasAgregarGet(): View
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $productos = Producto::all();

        return view('catalogos.ventasAgregarGet', [
            'empleados' => $empleados,
            'clientes' => $clientes,
            'productos' => $productos,
            'breadcrumbs' => [
                'Inicio' => url('/'),
                'Ventas' => url('/catalogo/ventas'),
                'Agregar' => url('/catalogo/ventas/agregar')
            ]
        ]);
    }///

    public function ventasAgregarPost(Request $request)
{
    $request->validate([
        'fecha' => 'required|date',
        'fk_id_empleado' => 'required|exists:empleado,id_empleado',
        'fk_id_cliente' => 'required|exists:cliente,id_cliente',
        'productos' => 'required|array|min:1',
        'productos.*.fk_id_producto' => 'required|exists:producto,id_producto',
        'productos.*.cantidad' => 'required|integer|min:1',
        'productos.*.precio_venta' => 'required|numeric|min:0',
        'productos.*.importe' => 'required|numeric|min:0', 
    ]);

    $venta = Venta::create([
        'fecha' => $request->fecha,
        'fk_id_empleado' => $request->fk_id_empleado,
        'fk_id_cliente' => $request->fk_id_cliente,
    ]);

    foreach ($request->productos as $productoData) {
        DetalleVenta::create([
            'fk_id_venta' => $venta->id_venta,
            'fk_id_producto' => $productoData['fk_id_producto'],
            'cantidad' => $productoData['cantidad'],
            'precio_venta' => $productoData['precio_venta'],
            'importe' => $productoData['importe'], 
        ]);
    }///////

    return redirect('/catalogo/ventas');
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
public function comprasAgregarGet(): View
{
    $productos = Producto::all();
    $proveedores = Proveedor::all();
    $categoria = Categoria::all();

    return view('catalogos.comprasAgregarGet', [
        'productos' => $productos,
        'proveedores' => $proveedores,
        'categorias' => $categoria,
        'breadcrumbs' => [
            'Inicio' => url('/'),
            'Compras' => url('/catalogos/compras'),
            'Agregar' => url('/catalogos/compras/agregar')
        ]
    ]);
}

public function comprasAgregarPost(Request $request)
{
    $request->validate([
        'fecha' => 'required|date',
        'fk_id_proveedor' => 'required|exists:proveedor,id_proveedor',
        'compras' => 'required|array|min:1',
        'compras.*.fk_id_producto' => 'required|exists:producto,id_producto',
        'compras.*.cantidad' => 'required|integer|min:1',
        'compras.*.precio_unitario' => 'required|numeric|min:0',
        'compras.*.importe' => 'required|numeric|min:0',
    ]);

    // Crear la compra
    $compra = Compra::create([
        'fecha' => $request->fecha,
        'total' => collect($request->compras)->sum('importe'),
        'fk_id_proveedor' => $request->fk_id_proveedor
    ]);

    // Guardar detalle de compra
    foreach ($request->compras as $detalle) {
        DetalleCompra::create([
            'fk_id_compra' => $compra->id_compra,
            'fk_id_producto' => $detalle['fk_id_producto'],
            'cantidad' => $detalle['cantidad'],
            'precio_unitario' => $detalle['precio_unitario'],
            'importe' => $detalle['importe'],
            'fk_id_proveedor' => $request->fk_id_proveedor // corregido aquí
        ]);
    }

    return redirect('/catalogo/compra')->with('success', 'Compra registrada correctamente.');
}
    
}