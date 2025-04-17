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
        $detalles = DetalleCompra::join("compra", "detalle_compra.fk_id_compra", "=", "compra.id_compra")
            ->join("producto", "detalle_compra.fk_id_producto", "=", "producto.id_producto")
            ->select(
                "compra.fecha",
                "producto.nombre",
                "detalle_compra.cantidad",
                "detalle_compra.precio_unitario",
                "detalle_compra.importe"
            )
            ->orderBy("compra.fecha", "desc")
            ->get();

        return view("reportes.comprasGet", compact("detalles"));
    }

    public function ventasGet(Request $request)
    {
        $detalles = DetalleVenta::join("venta", "detalle_venta.fk_id_venta", "=", "venta.id_venta")
            ->join("producto", "detalle_venta.fk_id_producto", "=", "producto.id_producto")
            ->select(
                "venta.fecha",
                "producto.nombre",
                "detalle_venta.cantidad",
                "detalle_venta.precio_venta",
                "detalle_venta.importe"
            )
            ->orderBy("venta.fecha", "desc")
            ->get();

        return view("reportes.ventasGet", compact("detalles"));
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
    
}