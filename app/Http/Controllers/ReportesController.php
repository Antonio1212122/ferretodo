<?php
namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ReportesController extends Controller
{
    public function indexGet(Request $request)
    {
        return view("reportes.indexGet", [
            "breadcrumbs"=>[
                "Inicio"=>url("/"),
                "Reportes"=>url("/reportes/ventas-activas")
            ]
        ]);
    }

    public function comprasGet(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = DetalleCompra::join("compra", "detalle_compra.fk_id_compra", "=", "compra.id_compra")
            ->join("producto", "detalle_compra.fk_id_producto", "=", "producto.id_producto")
            ->join("proveedor", "compra.fk_id_proveedor", "=", "proveedor.id_proveedor") // ← Corregido aquí
            ->select(
                "compra.fecha",
                "proveedor.nombre AS proveedor_nombre",
                "producto.nombre",
                "detalle_compra.cantidad",
                "detalle_compra.precio_unitario",
                "detalle_compra.importe"
            )
            ->orderBy("compra.fecha", "desc");

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween("compra.fecha", [$fecha_inicio, $fecha_fin]);
        }

        $detalles = $query->get();
        $total = $detalles->sum('importe');

        return view("reportes.comprasGet", compact("detalles", "total", "fecha_inicio", "fecha_fin"));
    }


    public function ventasGet(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = DetalleVenta::join("venta", "detalle_venta.fk_id_venta", "=", "venta.id_venta")
            ->join("producto", "detalle_venta.fk_id_producto", "=", "producto.id_producto")
            ->join("cliente", "venta.fk_id_cliente", "=", "cliente.id_cliente")
            ->select(
                "venta.fecha",
                "producto.nombre",
                "detalle_venta.cantidad",
                "detalle_venta.precio_venta",
                "detalle_venta.importe",
                "cliente.nombre AS cliente"
            )
            ->orderBy("venta.fecha", "desc");

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween("venta.fecha", [$fecha_inicio, $fecha_fin]);
        }

        $detalles = $query->get();
        $total = $detalles->sum('importe');

        return view("reportes.ventasGet", compact("detalles", "total", "fecha_inicio", "fecha_fin"));
    }

    public function productosGet()
    {
        $productos = DetalleVenta::join("producto", "detalle_venta.fk_id_producto", "=", "producto.id_producto")
            ->select(
                "producto.nombre",
                DB::raw("SUM(detalle_venta.cantidad) as total_vendido")
            )
            ->groupBy("producto.id_producto", "producto.nombre")
            ->orderByDesc("total_vendido")
            ->get();

        return view("reportes.productosGet", compact("productos"));
    }
    
    public function clientesRecurrentes()
    {
        $clientes = \App\Models\Cliente::join('venta', 'cliente.id_cliente', '=', 'venta.fk_id_cliente')
        ->select(
            'cliente.id_cliente',
            'cliente.nombre',
            'cliente.apellido',
            'cliente.telefono',
            'cliente.email',
            \DB::raw('COUNT(venta.id_venta) as total_ventas')
        )
        ->groupBy('cliente.id_cliente', 'cliente.nombre', 'cliente.apellido', 'cliente.telefono', 'cliente.email')
        ->orderByDesc('total_ventas')
        ->get();


        return view('reportes.clientesRecurrentes', compact('clientes'));
    }

}