<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fk_id_producto', 'id_producto');
    }
    use hasFactory;
    protected $table='detalle_venta';
    protected $primaryKey = 'id_detalle_venta';    
    public $incrementing=true;
    protected $keytype='int';
    protected $cantidad;
    protected $precio_venta;
    protected $importe;
    protected $fk_id_venta;
    protected $fk_id_producto;
    protected $fillable=["cantidad","precio_venta","importe","fk_id_venta","fk_id_producto"];
    public $timestamps =false;

    public function venta()
{
    return $this->belongsTo(Venta::class, 'fk_id_venta', 'id_venta');
}
}
