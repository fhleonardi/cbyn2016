<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'eventos';

    protected $fillable = ['nombre', 'id', 'tolerancia', 'max_asistencias'];



}
