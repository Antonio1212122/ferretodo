<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    public function compra()
    {
    return $this->belongsTo(Compra::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    use hasFactory;
    protected $table='detalle_compra';
    protected $primaryKey = 'id_detalle_compra';    
    public $incrementing=true;
    protected $keytype='int';
    protected $cantidad;
    protected $precio_unitario;
    protected $importe;
    protected $fk_id_compra;
    protected $fk_id_proveedor;
    protected $fk_id_producto;
    protected $fillable=["cantidad","precio_unitario","importe","fk_id_compra","fk_id_proveedor","fk_id_producto"];
    public $timestamps =false;
}
