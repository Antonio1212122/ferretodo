<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
protected $table = 'producto'; // nombre de la tabla en la BD a la que el modelo hace referencia.
protected $primaryKey = 'id_producto';//atributo de llave primaria asociado con la tabla
public $incrementing = true;//indica si el id del modelo es autoincrementable
protected $keyType = "int";// indica el tipo de dato del id autoincrementable
protected $nombre;//nombre del campo para recibir el nombre del puesto
protected $descripcion;//nombre del campo para recibir el sueldo
protected $cantidad;
protected $precio_unitario;
protected $precio_venta;
protected $fk_id_categoria;
protected $fillable=["nombre","descripcion","cantidad","precio_unitario","precio_venta","fk_id_categoria"];//atributos que se pueden asignar masivamente
public $timestamps=false;

public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_categoria', 'id_categoria');
    }
}


