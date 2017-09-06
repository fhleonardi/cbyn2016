<?php

namespace App\Http\Controllers\Persona;

use App\Categoria;
use App\Evento;
use App\Persona;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $eventos = Evento::lists('nombre', 'id');

        //$categorias = Categoria::lists('id', 'nombre')->all();
        $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
        $tipoDoc = Config::get('tipoDoc.types'); //traigo los valores del archivo tipoDoc.php dentro de la carpeta config
        $pais = Config::get('pais.types'); //traigo los valores del archivo pais.php dentro de la carpeta config


        return view('persona/persona', compact('eventos', 'options', 'tipoDoc', 'pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = false; //inicializo $existe en false
        $docUsuario = DB::table('personas')
                 ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
                 ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
                 ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
                 ->select('documento')
                 ->where('eventos.id', '=', 2) //todo pasar el id por parametro
                 ->get();


        foreach ($docUsuario as $doc){
            $documentos[] = $doc->documento;
        }
        if(!empty($documentos))
            $existe = array_search($request->documento,$documentos,false);


        $urlparse = parse_url($_SERVER['HTTP_REFERER']); //Guardo en urlparse de donde viene para poder hacer el return donde corresponda

        //si viene del congreso la mando a la url del congreso.
        $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
        $tipoDoc = Config::get('tipoDoc.types'); //traigo los valores del archivo tipoDoc.php dentro de la carpeta config
        $pais = Config::get('pais.types'); //traigo los valores del archivo pais.php dentro de la carpeta config
        $evento_id = $request->evento_id;

        if($existe === false){
            $persona = new Persona();
            /* LLAMAR FUNCION GENERAR CLAVE*/
            $data = Input::all();
            $data['clave']= $this->generaclave();
            $persona->fill($data);
            $persona['nombre'] = Persona::getNombreNormalizado($data['nombre']);
            $persona['apellidos'] = Persona::getNombreNormalizado($data['apellidos']);
            $persona->save();

            //Guardo las categorias
            $array = $request->options;

            //en caso de que las categorias esten en null, le seteo por defecto el 4 (Otros)
            if(emptyArray($array))
            {
                $array [] = 4;
            }

            foreach ($array as $key => $value) {
                $resultado [] = $value;
            }
            foreach ($resultado as $idC) {
                DB::table('categoria_persona')->insert(
                    ['categoria_id' => $idC, 'evento_id' => $request->evento_id, 'persona_id' => $persona->id]
                );
            }

            //guardo evento_persona
            DB::table('evento_persona')->insert(
                ['evento_id' => $request->evento_id, 'persona_id' => $persona->id]
            );

            $this->enviar_correo($request->apellidos, $request->nombre, $request->email, $request->documento, $data['clave']);

            //TODO : Hay que programar esto para que tome la url desde la BD para que no este harcodeado
            // Como esta hecho ahora, si se necesita agregar una nueva jornada o congreso, hay que hacerlo mediante el codigo
            if($urlparse['path'] == '/persona') { //si es persona va al home de jornadas.app
                return redirect()->route("home");
            }
            Session::flash('mensaje_correo_ok', 'Su consulta fue enviada correctamente');
            Session::flash('mensaje_correo_ok1','Si no recibe el correo de confirmación, revise su casilla de correo no deseado.');
            return redirect()->route("congresoOk");

            //return view('congreso', compact('evento_id','tipoDoc','options','pais'));



        }else {
            Session::flash('message_congreso', 'Ya existe una persona inscripta con el documento ingresado Congreso ');
            Session::flash('alert-class', 'alert-danger');

            if($urlparse['path'] == '/persona') { //si es persona va al home de jornadas.app
                return redirect()->back();
            }else{
                //return redirect('congreso')->with('message', 'Profile updated!');
                //return view('congreso', compact('evento_id','tipoDoc','options','pais'));
                return redirect()->back();
            }
        }
    }

    public function generaclave(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "abcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);

        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=6;

        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);

            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    public function enviar_correo($apellidos,$nombre,$email,$documento,$clave)
    {
      //       Mail::raw($cuerpomensaje, function ($message) use ($email) {
//           $message->to($email)
//    ->subject('Inscripcion');
//});

        Mail::send('partials.correo.cuerpoinscripcion', ['apellidos' => $apellidos, 'nombre' => $nombre, 'documento' => $documento, 'clave' => $clave], function ($message) use ($email)
        {
            $message->to($email)
                ->bcc('inscripcioncongreso@fb.uner.edu.ar')
                ->subject('Inscripcion Congreso Bromatologia y Nutricion');

        });

        /* ESTE VA

                Mail::send(array(), array(), function ($message) use ($cuerpomensaje,$email) {
                    $message->to($email)
            ->subject('Inscripcion')
            ->setBody($cuerpomensaje, 'text/html');
        });
        */



        //Mail::send('users.mails.welcome', array('firstname'=>Input::get('firstname')), function($message){
         //   $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the Laravel 4 Auth App!');
        //});   //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
