<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
protected $table = 'cliente'; // nombre de la tabla en la BD a la que el modelo hace referencia.
protected $primaryKey = 'id_cliente';//atributo de llave primaria asociado con la tabla
public $incrementing = true;//indica si el id del modelo es autoincrementable
protected $keyType = "int";// indica el tipo de dato del id autoincrementable
protected $nombre;//nombre del campo para recibir el nombre del puesto
protected $apellido;
protected $direccion;
protected $telefono;
protected $email; //nombre del campo para recibir el email
protected $fillable=["nombre","apellido","direccion","email"];//atributos que se pueden asignar masivamente
public $timestamps=false; 
}
