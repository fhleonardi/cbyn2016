<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellidos', 'tipodoc', 'documento', 'pais', 'localidad', 'provincia',
                           'email', 'domicilio', 'cp','telefono','celular','titulo_egreso','universidad_egreso',
    'fecha_egreso','catedra_docencia', 'carrera_docencia', 'facultad_docencia','universidad_docencia', 'entidad',
    'funcion_entidad', 'pais_entidad', 'provincia_entidad', 'localidad_entidad', 'domicilio_entidad', 'cp_entidad',
    'telefono_entidad', 'email_entidad', 'carrera_al', 'clave'];

    public function scopeName($query, $name)
    {
        if(trim($name) != "" ) {
            $query->where('nombre', 'LIKE', "%$name%");
        }
    }

    /**
     * @param $string
     * @return Devuelve el valor que se le pasa con la primera letra en mayuscula y el resto en minúscula
     */
    public static function getNombreNormalizado($string)
    {
        return ucwords(strtolower($string));
    }

}

