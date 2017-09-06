<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['user','editor'])
    ];
});



$factory->define(App\Asistencia::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->date()
    ];
});

$factory->define(App\Evento::class, function (Faker\Generator $faker) {
    return [
        'nombre'          => 'Jornadas Regionales de Bromatologia y Nutricion',
        'tolerancia'      => '1',
        'max_asistencias' => '4',

    ];
});


$factory->define(App\Persona::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
        'tipodoc' => 'DNI',
        'email' => $faker->email,
        'provincia' => $faker->locale,
        'pais' => $faker->country,
        'clave' => '1234',
    ];
});

$factory->define(App\Categoria::class, function (Faker\Generator $faker) {
    return [

    ];
});