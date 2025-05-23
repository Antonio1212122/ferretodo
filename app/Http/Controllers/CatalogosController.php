<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Puesto;
use Illuminate\Http\Request;
use datatime;
use Illuminate\view\View;
use App\Models\Empleado;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Venta;
use App\Models\DetalleVenta;//
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
    $request->validate([
        'nombre' => ['required', 'regex:/^[\pL\s]+$/u', 'max:100'],
        'descripción' => ['required', 'regex:/^[\pL\s,]+$/u'],
    ], [
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'descripción.regex' => 'La descripción solo puede contener letras, espacios y comas.',
    ]);

    // Crear la nueva categoría
    $categoria = new Categoria([
        "nombre" => strtoupper($request->input("nombre")),
        "descripción" => $request->input("descripción"),
    ]);
    $categoria->save();

    return redirect("/catalogo/categorias")->with('success', 'Categoría agregada correctamente');
}
public function categoriasEditarGet($id): View {
    $categoria = Categoria::findOrFail($id);
    return view('catalogos.categoriasEditarGet', [
        "categoria" => $categoria,
        "breadcrumbs" => [
            "Inicio" => url("/"),
            "Categorias" => url("/catalogo/categorias"),
            "Editar" => url("/catalogo/categorias/editar/" . $id),
        ]
    ]);
}

public function categoriasEditarPost(Request $request, $id) {
    $request->validate([
        'nombre' => ['required', 'regex:/^[\pL\s]+$/u', 'max:100'],
        'descripción' => ['required', 'regex:/^[\pL\s,]+$/u'],
    ]);

    $categoria = Categoria::findOrFail($id);
    $categoria->nombre = strtoupper($request->input("nombre"));
    $categoria->descripción = $request->input("descripción");
    $categoria->save();

    return redirect("/catalogo/categorias")->with('success', 'Categoría actualizada correctamente');
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
    $request->validate([
        'nombre'    => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'apellido'  => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'direccion' => 'required|string|max:100',
        'telefono'  => 'required|string|max:15',
        'email'     => 'required|email|max:50|unique:cliente,email',
    ], [
        'nombre.regex'   => 'El nombre solo puede contener letras y espacios.',
        'apellido.regex' => 'El apellido solo puede contener letras y espacios.',
    ]);

    $cliente = new Cliente([
        'nombre'    => strtoupper($request->input('nombre')),
        'apellido'  => strtoupper($request->input('apellido')),
        'direccion' => $request->input('direccion'),
        'telefono'  => $request->input('telefono'),
        'email'     => $request->input('email')
    ]);

    $cliente->save();

    return redirect('/catalogo/clientes')->with('success', 'Cliente agregado correctamente');
}
public function clientesEditarGet($id): View {
    $cliente = Cliente::findOrFail($id);
    return view('catalogos.clientesEditarGet', [
        "cliente" => $cliente,
        "breadcrumbs" => [
            "Inicio" => url("/"),
            "Clientes" => url("/catalogo/clientes"),
            "Editar" => url("/catalogo/clientes/editar/" . $id),
        ]
    ]);
}

public function clientesEditarPost(Request $request, $id) {
    $request->validate([
        'nombre'    => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'apellido'  => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'direccion' => 'required|string|max:100',
        'telefono'  => 'required|string|max:15',
        'email'     => 'required|email|max:50|unique:cliente,email,' . $id . ',id_cliente',
    ]);

    $cliente = Cliente::findOrFail($id);
    $cliente->nombre    = strtoupper($request->input('nombre'));
    $cliente->apellido  = strtoupper($request->input('apellido'));
    $cliente->direccion = $request->input('direccion');
    $cliente->telefono  = $request->input('telefono');
    $cliente->email     = $request->input('email');
    $cliente->save();

    return redirect('/catalogo/clientes')->with('success', 'Cliente actualizado correctamente');
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
    // Validar datos (Laravel redirigirá automáticamente si falla)
    $request->validate([
        'nombre'   => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'puesto'   => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'telefono' => 'required|string|max:15',
        'email'    => 'required|email|max:50|unique:empleado,email',
    ], [
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'puesto.regex' => 'El puesto solo puede contener letras y espacios.',
    ]);

    // Si pasa la validación, guarda el empleado
    $empleado = new Empleado();
    $empleado->nombre = strtoupper($request->input("nombre"));
    $empleado->puesto = $request->input("puesto");
    $empleado->telefono = $request->input("telefono");
    $empleado->email = $request->input("email");
    $empleado->save();

    return redirect(url('/catalogo/empleados'))->with('success', 'Empleado agregado correctamente.');
}
public function empleadosEditarGet($id): View
{
    $empleado = Empleado::findOrFail($id);

    return view('catalogos.empleadosEditarGet', [
        "empleado" => $empleado,
        "breadcrumbs" => [
            "Inicio" => url("/"),
            "Empleados" => url("/catalogo/empleados"),
            "Editar" => url("/catalogo/empleados/editar/$id")
        ]
    ]);
}
public function empleadosEditarPost(Request $request, $id)
{
    $request->validate([
        'nombre'   => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'puesto'   => ['required', 'regex:/^[\pL\s]+$/u', 'max:50'],
        'telefono' => 'required|string|max:15',
        'email'    => "required|email|max:50|unique:empleado,email,$id,id_empleado",
    ], [
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        'puesto.regex' => 'El puesto solo puede contener letras y espacios.',
    ]);

    $empleado = Empleado::findOrFail($id);
    $empleado->nombre = strtoupper($request->input("nombre"));
    $empleado->puesto = $request->input("puesto");
    $empleado->telefono = $request->input("telefono");
    $empleado->email = $request->input("email");
    $empleado->save();

    return redirect('/catalogo/empleados')->with('success', 'Empleado actualizado correctamente.');
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
    $request->validate([
        'nombre' => ['required', 'regex:/^[\pL\s]+$/u'], // Solo letras y espacios
    ], [
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
    ]);

    $nombre = $request->input("nombre");

    $proveedor = new Proveedor([
        "nombre" => strtoupper($nombre)
    ]);

    $proveedor->save();

    return redirect("/catalogo/proveedores");
}
public function proveedoresEditarGet($id): View
{
    $proveedor = Proveedor::findOrFail($id);

    return view('catalogos.proveedoresEditarGet', [
        "proveedor" => $proveedor,
        "breadcrumbs" => [
            "Inicio" => url("/"),
            "Proveedores" => url("/catalogo/proveedores"),
            "Editar" => url("/catalogo/proveedores/editar/$id")
        ]
    ]);
}
public function proveedoresEditarPost(Request $request, $id)
{
    $request->validate([
        'nombre' => ['required', 'regex:/^[\pL\s]+$/u'], // Solo letras y espacios
    ], [
        'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
    ]);

    $proveedor = Proveedor::findOrFail($id);
    $proveedor->nombre = strtoupper($request->input("nombre"));
    $proveedor->save();

    return redirect("/catalogo/proveedores")->with('success', 'Proveedor actualizado correctamente.');
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
    // Validar los datos
    $request->validate([
        "nombre" => "required|string|max:100",
        "descripción" => "nullable|string|max:255",
        "cantidad" => "required|integer|min:0",
        "precio_unitario" => "required|numeric|min:0",
        "precio_venta" => "required|numeric|min:0",
        "fk_id_categoria" => "required|exists:categoria,id_categoria" // ajusta si el nombre real de la tabla es distinto
    ], [
        "cantidad.min" => "La cantidad no puede ser negativa.",
        "precio_unitario.min" => "El precio unitario no puede ser negativo.",
        "precio_venta.min" => "El precio de venta no puede ser negativo.",
    ]);

    // Crear el producto
    $producto = new Producto([
        "nombre" => $request->input("nombre"),
        "descripción" => $request->input("descripción"),
        "cantidad" => $request->input("cantidad"),
        "precio_unitario" => $request->input("precio_unitario"),
        "precio_venta" => $request->input("precio_venta"),
        "fk_id_categoria" => $request->input("fk_id_categoria")
    ]);

    $producto->save();

    return redirect("/catalogo/productos")->with('success', 'Producto agregado correctamente.');
}
public function productosEditarGet($id): View
{
    $producto = Producto::findOrFail($id);
    $categorias = Categoria::all();

    return view('catalogos.productosEditarGet', [
        "producto" => $producto,
        "categorias" => $categorias,
        "breadcrumbs" => [
            "Inicio" => URL("/"),
            "Productos" => URL("/catalogo/productos"),
            "Editar" => URL("/catalogo/productos/editar/$id")
        ]
    ]);
}
public function productosEditarPost(Request $request, $id)
{
    // Validación
    $request->validate([
        "nombre" => "required|string|max:100",
        "descripción" => "nullable|string|max:255",
        "cantidad" => "required|integer|min:0",
        "precio_unitario" => "required|numeric|min:0",
        "precio_venta" => "required|numeric|min:0",
        "fk_id_categoria" => "required|exists:categoria,id_categoria"
    ], [
        "cantidad.min" => "La cantidad no puede ser negativa.",
        "precio_unitario.min" => "El precio unitario no puede ser negativo.",
        "precio_venta.min" => "El precio de venta no puede ser negativo.",
    ]);

    // Buscar y actualizar producto
    $producto = Producto::findOrFail($id);
    $producto->nombre = $request->input("nombre");
    $producto->descripción = $request->input("descripción");
    $producto->cantidad = $request->input("cantidad");
    $producto->precio_unitario = $request->input("precio_unitario");
    $producto->precio_venta = $request->input("precio_venta");
    $producto->fk_id_categoria = $request->input("fk_id_categoria");

    $producto->save();

    return redirect("/catalogo/productos")->with("success", "Producto actualizado correctamente.");
}
    public function ventasGet(): View
{
    $ventas = Venta::with('cliente') // Cargar la relación cliente
        ->orderBy('id_venta', 'DESC')
        ->get();

    return view('catalogos.ventasGet', [
        "ventas" => $ventas,
        "breadcrumbs" => [
            "Inicio" => URL("/"),
            "ventas" => URL("/catalogo/ventas")
        ]
    ]);
}
    public function ventasAgregarGet(): View
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all(); // Asegúrate de que Cliente es el modelo correcto
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
        'fecha' => 'required|date|before_or_equal:today',
        'fk_id_empleado' => 'required|exists:empleado,id_empleado',
        'fk_id_cliente' => 'required|exists:cliente,id_cliente',
        'productos' => 'required|array|min:1',
        'productos.*.fk_id_producto' => 'required|exists:producto,id_producto',
        'productos.*.cantidad' => 'required|integer|min:1',
        'productos.*.precio_venta' => 'required|numeric|min:0',
        'productos.*.importe' => 'required|numeric|min:0',
    ], [
        'fecha.before_or_equal' => 'La fecha de la venta no puede ser mayor a hoy.',
    ]);

    $venta = Venta::create([
        'fecha' => $request->fecha,
        'fk_id_empleado' => $request->fk_id_empleado,
        'fk_id_cliente' => $request->fk_id_cliente,
        'total' => 0, // Proporcionamos un valor inicial para 'total'
    ]);

    $totalVenta = 0;

    foreach ($request->productos as $productoData) {
        DetalleVenta::create([
            'fk_id_venta' => $venta->id_venta,
            'fk_id_producto' => $productoData['fk_id_producto'],
            'cantidad' => $productoData['cantidad'],
            'precio_venta' => $productoData['precio_venta'],
            'importe' => $productoData['importe'],
        ]);
        $totalVenta += $productoData['importe'];

        // Actualizar el stock del producto
        $producto = Producto::find($productoData['fk_id_producto']);
        if ($producto) {
            $producto->cantidad -= $productoData['cantidad'];
            $producto->cantidad = max(0, $producto->cantidad); // Evitar valores negativos
            $producto->save();
        }
    }

    $venta->total = $totalVenta;
    $venta->save();

    return redirect('/catalogo/ventas');
}

public function ventasDetalleGet($id_venta): View
{
    $venta = Venta::with(['empleado', 'cliente', 'detalleventa.producto'])->findOrFail($id_venta);

    return view('catalogos.ventasDetalleGet', [
        'venta' => $venta,
        'breadcrumbs' => [
            "Inicio" => URL("/"),
            "Ventas" => URL("/catalogo/ventas"),
            "Detalle" => URL("/catalogo/ventas/{$id_venta}/detalle")
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
        'fecha' => 'required|date|before_or_equal:today',
        'fk_id_proveedor' => 'required|exists:proveedor,id_proveedor',
        'compras' => 'required|array|min:1',
        'compras.*.fk_id_producto' => 'required|exists:producto,id_producto',
        'compras.*.cantidad' => 'required|integer|min:1',
        'compras.*.precio_unitario' => 'required|numeric|min:0',
        'compras.*.precio_venta' => 'required|numeric|min:0',
        'compras.*.importe' => 'required|numeric|min:0',
    ], [
        'fecha.required' => 'La fecha de la compra es obligatoria.',
        'fecha.date' => 'La fecha de la compra no es válida.',
        'fecha.before_or_equal' => 'La fecha de la compra no puede ser mayor a hoy.',
        'fk_id_proveedor.required' => 'Debe seleccionar un proveedor.',
        'fk_id_proveedor.exists' => 'El proveedor seleccionado no es válido.',
        'compras.required' => 'Debe agregar al menos un producto a la compra.',
        'compras.array' => 'El formato de productos de la compra no es válido.',
        'compras.min' => 'Debe agregar al menos un producto a la compra.',
        'compras.*.fk_id_producto.required' => 'Debe seleccionar un producto.',
        'compras.*.fk_id_producto.exists' => 'El producto seleccionado no es válido.',
        'compras.*.cantidad.required' => 'Debe ingresar la cantidad del producto.',
        'compras.*.cantidad.integer' => 'La cantidad debe ser un número entero.',
        'compras.*.cantidad.min' => 'La cantidad debe ser al menos 1.',
        'compras.*.precio_unitario.required' => 'Debe ingresar el precio de compra.',
        'compras.*.precio_unitario.numeric' => 'El precio de compra debe ser un número.',
        'compras.*.precio_unitario.min' => 'El precio de compra no puede ser negativo.',
        'compras.*.precio_venta.required' => 'Debe ingresar el precio de venta.',
        'compras.*.precio_venta.numeric' => 'El precio de venta debe ser un número.',
        'compras.*.precio_venta.min' => 'El precio de venta no puede ser negativo.',
        'compras.*.importe.required' => 'El importe es obligatorio.',
        'compras.*.importe.numeric' => 'El importe debe ser un número.',
        'compras.*.importe.min' => 'El importe no puede ser negativo.',
    ]);

    // Crear la compra principal
    $compra = Compra::create([
        'fecha' => $request->fecha,
        'total' => collect($request->compras)->sum('importe'),
        'fk_id_proveedor' => $request->fk_id_proveedor
    ]);

    // Procesar cada detalle
    foreach ($request->compras as $detalle) {
        // Guardar el detalle
        DetalleCompra::create([
            'fk_id_compra' => $compra->id_compra,
            'fk_id_producto' => $detalle['fk_id_producto'],
            'cantidad' => $detalle['cantidad'],
            'precio_unitario' => $detalle['precio_unitario'],
            'importe' => $detalle['importe'],
            'fk_id_proveedor' => $request->fk_id_proveedor
        ]);

        // Actualizar el producto correspondiente
        $producto = Producto::find($detalle['fk_id_producto']);
        if ($producto) {
            // Aumentar existencia
            $producto->cantidad += $detalle['cantidad'];

            // Actualizar precios
            $producto->precio_unitario = $detalle['precio_unitario'];
            $producto->precio_venta = $detalle['precio_unitario'] * 1.25; // o usa una lógica que tengas

            $producto->save();
        }
    }

    return redirect('/catalogo/compra')->with('success', 'Compra registrada correctamente.');
}
public function comprasDetalleGet($id_compra)
{
    $compra = Compra::with(['proveedor', 'detalles.producto'])->findOrFail($id_compra);

    return view('catalogos.comprasDetalleGet', [
        'compra' => $compra,
        'breadcrumbs' => [
            'Inicio' => url('/'),
            'Compras' => url('/catalogo/compra'),
            'Detalle de Compra' => url("/catalogo/compras/$id_compra/detalle")
        ]
    ]);
}
public function eliminar($id)
{
    $compra = Compra::findOrFail($id);

    // Obtener los detalles de la compra
    $detalles = DetalleCompra::where('fk_id_compra', $id)->get();

    foreach ($detalles as $detalle) {
        $producto = Producto::find($detalle->fk_id_producto);
        if ($producto) {
            // Disminuir la existencia (sin que baje de 0)
            $producto->cantidad = max(0, $producto->cantidad - $detalle->cantidad);
            $producto->save();
        }
    }

    // Eliminar detalles relacionados
    DetalleCompra::where('fk_id_compra', $id)->delete();

    // Eliminar la compra
    $compra->delete();

    return redirect('/catalogo/compra')->with('success', 'Compra eliminada y stock actualizado correctamente.');
}
    
}