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
    protected $fillable=["fecha","fk_id_empleado","fk_id_cliente"];
    public $timestamps =false;
}
