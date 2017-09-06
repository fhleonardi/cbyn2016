<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
    $tipoDoc = Config::get('tipoDoc.types'); //traigo los valores del archivo tipoDoc.php dentro de la carpeta config
    $pais = Config::get('pais.types'); //traigo los valores del archivo pais.php dentro de la carpeta config
    //TODO el id del evento esta harcodeado, hay que programar la manera de que pase de manera dinamica
    $evento_id = 2;
    return view('congreso', compact('options', 'tipoDoc', 'pais', 'evento_id'));
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


Route::group(['prefix => eventos', 'middleware' => 'auth'], function () {
    Route::get('eventos', ['as' => 'eventos', 'uses' => 'Evento\EventoController@index']);
    Route::get('home', ['as' => 'home', 'uses' => 'Evento\EventoController@index']);
    Route::get('configurar/{id}', ['as' => 'configurar', 'uses' => 'Evento\EventoController@conf']);
    Route::get('listado/{id}', ['as' => 'listado', 'uses' => 'Evento\EventoController@listado']);
    Route::get('editarCategoria/{id}/{idevento}', ['as' => 'editarCategoria', 'uses' => 'Evento\EventoController@editarCategoria']);
    Route::get('imprimirEtiqueta/{idevento}', ['as' => 'imprimirEtiqueta', 'uses' => 'Evento\EventoController@imprimirEtiqueta']);
    Route::post('saveCategorias', ['as' => 'saveCategorias', 'uses' => 'Evento\EventoController@saveCategorias']);
    Route::post('saveConfEvento', ['as' => 'saveConfEvento', 'uses' => 'Evento\EventoController@saveConfEvento']);
    Route::get('persona', ['as' => 'persona', 'uses' => 'Persona\PersonaController@index']);
});
//lo dejo afuera del group para que no sea necesario loguearse para que se ejecute el action@store
Route::post('persona', ['as' => 'persona', 'uses' => 'Persona\PersonaController@store']);

Route::group(['prefix => asistencia', 'namespace' => 'Asistencia', 'middleware' => 'auth'], function () {
    Route::post('asistencia', ['as' => 'asistencia', 'uses' => 'AsistenciaController@store']);
    Route::get('asistencia/{id}', ['as' => 'asistenciaid', 'uses' => 'AsistenciaController@edit']);
});

Route::group(['prefix => reporte', 'namespace' => 'Reporte', 'middleware' => 'auth'], function () {
    Route::get('reporte/{id}', ['as' => 'reporte', 'uses' => 'ReporteController@edit']);
});


Route::get('congreso', function () {
    $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
    $tipoDoc = Config::get('tipoDoc.types'); //traigo los valores del archivo tipoDoc.php dentro de la carpeta config
    $pais = Config::get('pais.types'); //traigo los valores del archivo pais.php dentro de la carpeta config
    
    
    return view('congreso', compact('options', 'tipoDoc', 'pais', 'evento_id'));
});
Route::get('congreso', ['as' => 'congresoOk', 'uses' => 'Congreso\CongresoController@index']);

//Route::post('storage/create', 'Congreso\CongresoController@save');
Route::post('congreso/public/storage/create', 'Congreso\CongresoController@save');

Route::post('congresoPost', ['as' => 'congresoPost', 'uses' => 'Congreso\CongresoController@validarLogin']);

//Route::get('contact',
// ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contacto',
    ['as' => 'contacto', 'uses' => 'Congreso\CongresoController@contacto']);

