<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'asistencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'id', 'evento_id'];
}
