<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
     // Relación con el modelo Empleado
     public function empleado()
     {
         return $this->belongsTo(Empleado::class, 'fk_id_empleado', 'id_empleado');
     }
 
     // Relación con el modelo Cliente
     public function cliente()
     {
         return $this->belongsTo(Cliente::class, 'fk_id_cliente', 'id_cliente');
     }
 
     // Relación con el modelo DetalleVenta
     public function detalleventa()
     {
         return $this->hasMany(DetalleVenta::class, 'fk_id_venta', 'id_venta');
     }
     
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
