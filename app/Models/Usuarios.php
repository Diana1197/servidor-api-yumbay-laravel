<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuarios extends Model
{
    use HasFactory;

    public const ADMIN = 16;
    public const RECEPCIONISTA= 1;
    public const DOCTOR = 4;

    protected $fillable = [
        'cedula','nombres','apellidos','direccion','celular',
        'telefono','email','titulo','horario','contacto_emergencia',
        'clave','permisos','rol'
    ];

    /**
     * get especialidad in doctor
     */
    public static function allWhitEspecialidades(string $cedula) {
       $data = DB::table('usuarios')
        ->join('usuarios_especialidades','usuarios_especialidades.cedula_user','=','usuarios.cedula')
        ->join('especialidades','especialidades.id','=','usuarios_especialidades.id_especialidad')
        ->where('usuarios.cedula',$cedula)
        ->get();

        return $data;
    }
}
