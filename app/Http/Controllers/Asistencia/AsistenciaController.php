<?php namespace App\Http\Controllers\Asistencia;

use App\Asistencia;
use App\Evento;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DateTimeZone;
use Illuminate\Support\Facades\Config;

require config_path().'/constant.php';


class AsistenciaController extends Controller
{

    public function edit($id){

        $evento = DB::select('select * from eventos WHERE id = ' . $id);
        return \View::make('home', compact('evento'));
    }

//Config::get('constant.ERROR2'); Con esto accedo a las constantes que estan en el archivo constant.php
    public function store(Request $request){
        //Seteo la zona horaria
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        if($request->ajax()){
            $persona_registrada = DB::select('select * from personas WHERE  documento like "' . $request->username . '"');

            $personas = DB::select('select * FROM personas p1 INNER JOIN evento_persona t2 ON p1.id = t2.persona_id WHERE  p1.documento like "'. $request->username . '"'.  ' and t2.evento_id = ' . $request->evento_id);

            if( !empty($personas) && is_array($personas) ){     //verifico que el array tenga datos
                if($this->validarAsistencias($personas, $request->evento_id)){       //valido cantidad maxima de asistencias
                   if($this->validarUltimoIngreso($personas, $request->evento_id)) { //valido tolerancia
                       $this->insertAsistencia($personas);         //inserto asistencias
                   }
                }
                array_push($personas,["valor" => Config::get('constant.MENSAJE')]);
                return response()->json($personas);
            }else{
                if(empty($persona_registrada)) {
                    array_push($personas, ["valor" => Config::get('constant.MENSAJE_ERROR')]);
                }else{
                    array_push($personas, ["valor" => Config::get('constant.MENSAJE_NO_PERTENECE_EVENTO')]);
                }
                return response()->json($personas);
            }
        }
    }


    //Inserto la asistencia para la persona indicada
    //parametros: $personas
    public function insertAsistencia($personas)
    {

        $date = Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'));
        DB::table('asistencias')->insert(
            ['id' => $personas[0]->id, 'evento_id' => $personas[0]->evento_id ,'fecha' => $date]
        );

    }


    public  function validarAsistencias($personas, $evento_id)
    {
        //dd(count($aux)); cuenta la cantidad de elementos que hay en el array
        //dd($aux[0]->fecha); obtengo la fecha
        // $dt = Carbon::parse($asistencias[0]->fecha); con esto parseo la fecha
        $evento = Evento::findOrFail($evento_id);

        $maxAsistencias = $evento->max_asistencias;
      /*  $asistencias = DB::table('asistencias')
            ->where('id', '=', $personas[0]->id)
            ->and('evento_id', '=', $personas[0]->evento_id)
            ->get(); //busco cantidad de asitencias por persona
*/
        $asistencias = Asistencia::whereRaw('id = ? and evento_id = ?', array($personas[0]->id, $personas[0]->evento_id))->get();

        if (count($asistencias) >= $maxAsistencias) {
            $aux = Config::get('constant.MENSAJE1');
            Config::set('constant.MENSAJE', $aux);
            return false;
        } else {
            return true;
        }
    }

    public function ultimoRegistro ($persona)
    {
        $registro = DB::table('asistencias')
        ->select('fecha')
        ->take(1)
        ->where('id', '=', $persona[0]->id)
        ->orderBy('fecha', 'desc')
        ->get();


        return $registro;
    }

    public function validarUltimoIngreso($persona, $evento_id)
    {
        $aux = $this->ultimoRegistro($persona);
        if (!empty ($aux)) { //Si viene vacío es porque es el primer ingreso, evito la validacion
           return $this->validarTolerancia($aux, $evento_id);
        }else{
            return true;//si es la primera vez sale por true
        }

    }


    public function validarTolerancia($aux, $evento_id)
    {
        $evento = Evento::findOrFail($evento_id);
        $tolerancia = $evento->tolerancia; //Valor representado en minutos

        $s = $aux[0]->fecha;
        $registro = Carbon::parse($s);
        $hoy = Carbon::now();
        $ultimo_registro = $registro->diffInMinutes($hoy);
        if ($ultimo_registro >= $tolerancia) {
            return true; //la tolerancia esta ok, sale por true
        }else{
            $aux1 = Config::get('constant.MENSAJE2');//No paso la tolerancia, muestra mensaje de error
            Config::set('constant.MENSAJE', $aux1);
            return false;
        }


    }

}
