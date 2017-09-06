<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categorias")->insert(array(
            array(
                "nombre"        => "Alumnos",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Graduado",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Docente",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Otros",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Disertante",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Expositor",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
            array(
                "nombre"        => "Organizador",
                "created_at"    => new DateTime,
                "updated_at"    => new DateTime,
            ),
        ));
    }
}
