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

    // ✅ Accessor para formatear el teléfono
    public function getTelefonoFormateadoAttribute()
    {
        $tel = preg_replace('/\D/', '', $this->telefono);

        if (strlen($tel) === 10) {
            return preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $tel);
        }

        return $this->telefono;
    }
}
