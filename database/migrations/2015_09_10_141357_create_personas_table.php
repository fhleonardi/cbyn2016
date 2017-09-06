<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
        $table->increments('id');
        $table->string('apellidos');
        $table->string('nombre');
        $table->string('tipodoc');
        $table->string('documento');
        $table->string('pais');
        $table->string('provincia');
        $table->string('localidad');
        $table->string('domicilio');
        $table->string('cp');
        $table->string('email');
        $table->string('telefono');
        $table->string('celular');
        $table->string('publicidad');
        $table->string('titulo_egreso');
        $table->string('universidad_egreso');
        $table->date('fecha_egreso');
        $table->string('catedra_docencia');
        $table->string('carrera_docencia');
        $table->string('facultad_docencia');
        $table->string('universidad_docencia');
        $table->string('entidad');
        $table->string('funcion_entidad');
        $table->string('pais_entidad');
        $table->string('provincia_entidad');
        $table->string('localidad_entidad');
        $table->string('domicilio_entidad');
        $table->string('cp_entidad');
        $table->string('telefono_entidad');
        $table->string('email_entidad');
        $table->string('carrera_al');
        $table->string('clave');
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
