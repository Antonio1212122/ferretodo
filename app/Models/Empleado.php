<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_empleado'; // Clave primaria
    public $incrementing = true; // Indica si el ID es autoincremental
    protected $keyType = "int"; // Tipo de dato del ID
    public $timestamps = false; // Si no usas created_at y updated_at

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'puesto',
        'telefono',
        'email',
    ];
}