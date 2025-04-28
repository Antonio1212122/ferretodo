<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_compra';
    protected $primaryKey = 'id_detalle_compra';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        "cantidad",
        "precio_unitario",
        "importe",
        "fk_id_compra",
        "fk_id_proveedor",
        "fk_id_producto"
    ];

    // Relaciones
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'fk_id_compra', 'id_compra');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor', 'id_proveedor');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fk_id_producto', 'id_producto');
    }
}
