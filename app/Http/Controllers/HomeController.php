<?php

namespace App\Http\Controllers;

use Faker\Provider\zh_TW\DateTime;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTimeZone;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //Seteo la zona horaria
        date_default_timezone_set('America/Argentina/Buenos_Aires');

       //comprobar conexion a la base
     //   $personas = DB::select('select * from personas');
      //  $user = DB::select('select * from users');

    // En --> app\Providers\AuthServiceProvider.php defino el tipo de control en este caso
    // rol-admin
    //Le paso el usuario que quiero controlar si es admin
        /*
         * if (Gate::forUser($user[1])->allows('rol-admin', $user[0])) {
            dd($personas);
        }
         */


        //Auth::loginUsingId(1);
        /*
        $usera = Auth::user();
        if($usera->role == 'admin'){
            echo('El usuario ---->' . $usera->name . '  tiene el rol: ' . $usera->role . ' y puede ver esto');
        }else{
            echo('El usuario ---->' . $usera->name . '  no es admin, tiene rol: ' . $usera->role . ' y debe salir ');
        }
        */




        /*
        $aux =  DB::table('asistencias')
            ->select('fecha')
            ->take(1)
            ->where('id', '=', 1)
            ->orderBy('fecha', 'desc')
            ->get();

            $aja =  empty($aux);
            dd($aja);

        $s = $aux[0]->fecha;
        $registro = Carbon::parse($s);
        $hoy = Carbon::now();





               $ultimo_registro = $registro->diffInHours($hoy);

                if($ultimo_registro >= 3)
                {
                    dd("Esto paso hace MAS de 3 horas --> " . Carbon::parse($s) . ' ---> ' . Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires')) );
                }else{
                    dd("Esto paso hace MENOS de 3 horas");
                }


        */




//https://styde.net/creando-formularios-con-el-paquete-styde-html/


/* Para poder visualizar las querys

        DB::enableQueryLog();
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        dd( $last_query);
*/
        return \View::make('home');
    }
}
