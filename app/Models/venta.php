<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use hasFactory;
    protected $table='venta';
    protected $primaryKey = 'id_venta';    
    public $incrementing=true;
    protected $keytype='int';
    protected $fecha;
    protected $fk_id_empleado;
    protected $fk_id_cliente;
    protected $fk_id_producto;
    protected $fillable=["fecha","fk_id_empleado","fk_id_cliente","fk_id_producto"];
    public $timestamps =false;
}
