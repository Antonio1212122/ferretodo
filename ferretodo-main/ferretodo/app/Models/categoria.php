<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class categoria extends Model
{
use HasFactory;
protected $table = 'categoria'; // nombre de la tabla en la BD a la que el modelo hace referencia.
protected $primaryKey = 'id_categoria';//atributo de llave primaria asociado con la tabla
public $incrementing = true;//indica si el id del modelo es autoincrementable
protected $keyType = "int";// indica el tipo de dato del id autoincrementable
protected $nombre;//nombre del campo para recibir el nombre del puesto
protected $descripción;//nombre del campo para recibir el sueldo
protected $fillable=["nombre","descripción"];//atributos que se pueden asignar masivamente
public $timestamps=false;
}