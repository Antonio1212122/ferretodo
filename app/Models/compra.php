<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function proveedor()
{
    return $this->belongsTo(Proveedor::class);
}
    use HasFactory;
    protected $table='compra';
    protected $primaryKey = 'id_compra';    
    public $incrementing=true;
    protected $keytype='int';
    protected $fecha;
    protected $total;
    protected $fk_id_proveedor;
    protected $fillable=["fecha","total","fk_id_proveedor"];
    public $timestamps =false;
}
