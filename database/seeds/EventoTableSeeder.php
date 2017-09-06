<?php
/**
 * Created by PhpStorm.
 * User: jparra
 * Date: 30/09/2015
 * Time: 10:09
 */

use Illuminate\Database\Seeder;

class EventoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('eventos')->truncate();
        factory(App\Evento::class, 2)->create();
    }
}