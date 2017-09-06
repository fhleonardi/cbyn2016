<?php namespace App\Http\Controllers\Congreso;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CongresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
        $tipoDoc = Config::get('tipoDoc.types'); //traigo los valores del archivo tipoDoc.php dentro de la carpeta config
        $pais = Config::get('pais.types'); //traigo los valores del archivo pais.php dentro de la carpeta config

        //TODO el id del evento esta harcodeado, hay que programar la manera de que pase de manera dinamica
        $evento_id = 2;
        return view('congreso', compact('evento_id','tipoDoc','options','pais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * guarda un archivo en nuestro directorio local.
     *
     * @return Response
     */
    public function save(Request $request)
    {

       // dd(Session::get('dni'));
        //obtenemos el campo file definido en el formulario
        \Storage::makeDirectory(Session::get('dni'), 0777);

        $file1 = $request->file('file1');
        if ($file1 != null) {
            //obtenemos el nombre del archivo
            $nombre = Session::get('dni') . "/" . $file1->getClientOriginalName();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre, \File::get($file1));
        }


        //obtenemos el campo file definido en el formulario
        $file2 = $request->file('file2');
        if ($file2 != null) {
            //obtenemos el nombre del archivo
            $nombre = Session::get('dni') . "/" . $file2->getClientOriginalName();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file2));
        }



        //obtenemos el campo file definido en el formulario
        $file3 = $request->file('file3');
        if ($file3 != null) {
            //obtenemos el nombre del archivo
            $nombre = Session::get('dni') . "/" . $file3->getClientOriginalName();

            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre, \File::get($file3));
        }
        Session::forget('dni');
        Session::flash('file_success', 'Los archivos fueron enviados correctamente!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

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


    public function enviar_correo_consulta($apellidos,$nombre,$email,$consulta)
    {
        Mail::send('partials.correo.cuerpocontacto', ['apellidos' => $apellidos, 'nombre' => $nombre, 'consulta' => $consulta, 'email' => $email], function ($message) use ($email)
        {
            $message->to($email)
                ->bcc('inscripcioncongreso@fb.uner.edu.ar')
                ->subject('Contacto Congreso Bromatologia y Nutricion');

        });
    }

    public function contacto(Request $request)
    {

        $this->enviar_correo_consulta($request->apellidos, $request->nombre, $request->email, $request->consulta);
        Session::flash('mensaje_correo_ok', 'Su consulta fue enviada correctamente');
        Session::flash('mensaje_correo_ok1','Si no recibe el correo de confirmación, revise su casilla de correo no deseado.');
        return redirect()->route("congresoOk");
    }




    public function validarLogin(Request $request)
    {
        if($request->ajax()){

        $persona_registrada = DB::select('select * from personas WHERE  documento like "' . $request->username . '"'.  ' and clave = "' . $request->pass .'"');

            if(!empty($persona_registrada)) {
                array_push($persona_registrada, ["valor" => Config::get('constant.MENSAJE')]);
                Session::set('dni', $request->username);
                return response()->json($persona_registrada);
            }else {
                return 0;
            }
        }

    }
}
