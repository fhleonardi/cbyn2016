<?php

use Illuminate\Database\Seeder;

class AsistenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asistencias')->truncate();
        factory(App\Asistencia::class, 10)->create();
    }
}
