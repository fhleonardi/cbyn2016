<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        factory(App\User::class)->create([
            'name'       => 'Javier Alejandro Parra',
            'email'       => 'jparra@fb.uner.edu.ar',
            'password'   =>  \Hash::make('secret'),
            'role'       => 'admin'
        ]);

        factory(App\User::class)->create([
            'name'       => 'Francisco Leonardi',
            'email'       => 'fleonardi@fb.uner.edu.ar',
            'password'   =>  \Hash::make('secret1'),
            'role'       => 'editor'
        ]);
        //factory(App\User::class, 10)->create();
    }
}
