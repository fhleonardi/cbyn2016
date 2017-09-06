<?php

namespace App\Http\Controllers\Evento;

use App\Evento;
use App\Persona;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Milon\Barcode\PDF417;
//use Barryvdh\DomPDF\Facade;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $eventos = Evento::paginate();

        return view('eventos', compact('eventos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Muestra una pantalla para que se pueda configurar los parametros del evento.
     *
     * @param  int  $id ---> id del evento
     * @return View
     */
    public function conf(Request $request,$id)
    {

      //Si viene de la pantalla de eventos entra por la primera opcion, si es por una busqueda entra por el else
        if (!$request->has('evento_id')){
            $evento = Evento::findorFail($id);
        }else{
            $evento = Evento::findorFail($request->evento_id);
        }
        $tolerancia = $evento->tolerancia;
        $max_asistencias = $evento->max_asistencias;

        return view('evento/configurar', compact('evento', 'tolerancia', 'max_asistencias'));
    }

    /**
     * @param Request $request
     * @param $id = id del evento
     * @return devuelve el control a la vista listado
     */
    public function listado(Request $request, $id)
    {
        //Si viene de la pantalla de eventos entra por la primera opcion, si es por una busqueda entra por el else
        if (!$request->has('evento_id')){
            $evento = Evento::findorFail($id);
            $personas = $this->allPersonasCategoriaByEvento($id);
        }else{
            $evento = Evento::findorFail($request->evento_id);
            $personas = $this->filtroPersonasCategoria($request);
        }

            $totalInscriptos = $this->allPersonasCategoriaByEvento($id);

        return view('evento/listado', compact('personas', 'evento', 'totalInscriptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtroPersonasCategoria($request)
    {
        DB::enableQueryLog();

        if($request->type == 99){
            $personas = DB::table('personas')
                ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
                ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
                ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
                ->select('personas.*')
                ->where('eventos.id', '=', $request->evento_id)
                ->whereRaw('(personas.nombre LIKE \'%' . $request->name . '%\' or personas.apellidos like \'%' . $request->name . '%\')')
                //->orWhere('personas.apellidos', 'LIKE', '%'.$request->name.'%')
                ->whereNotIn('categoria_persona.categoria_id',  array($request->type))
                ->distinct()
                ->paginate(15);
            $queries = DB::getQueryLog();
            $last_query = end($queries);
          //  dd( $last_query);
        }else{
            $personas = DB::table('personas')
                ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
                ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
                ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
                ->select('personas.*')
                ->where('eventos.id', '=', $request->evento_id)
                //->where('personas.nombre', 'LIKE', '%'.$request->name.'%')
                ->whereRaw('(personas.nombre LIKE \'%' . $request->name . '%\' or personas.apellidos like \'%' . $request->name . '%\')')
                ->whereIn('categoria_persona.categoria_id',  array($request->type))
                ->distinct()
                ->paginate(15);



        }


        return $personas;
    }


    public function filtroPersonasCategoriasinpaginar($request)
    {
        DB::enableQueryLog();

        if($request->type == 99){
            $personas = DB::table('personas')
                ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
                ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
                ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
                ->select('personas.*')
                ->where('eventos.id', '=', $request->evento_id)
                ->whereRaw('(personas.nombre LIKE \'%' . $request->name . '%\' or personas.apellidos like \'%' . $request->name . '%\')')
                //->orWhere('personas.apellidos', 'LIKE', '%'.$request->name.'%')
                ->whereNotIn('categoria_persona.categoria_id',  array($request->type))
                ->distinct()
                ->paginate(1500); // todo: revisar porque se rompe si saco el paginado
            $queries = DB::getQueryLog();
            $last_query = end($queries);
            //  dd( $last_query);
        }else{
            $personas = DB::table('personas')
                ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
                ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
                ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
                ->select('personas.*')
                ->where('eventos.id', '=', $request->evento_id)
                //->where('personas.nombre', 'LIKE', '%'.$request->name.'%')
                ->whereRaw('(personas.nombre LIKE \'%' . $request->name . '%\' or personas.apellidos like \'%' . $request->name . '%\')')
                ->whereIn('categoria_persona.categoria_id',  array($request->type))
                ->distinct()
            ->paginate(1500);




        }


        return $personas;
    }


    public function allPersonasCategoriaByEvento($id)
    {
        $personas = DB::table('personas')
            ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
            ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
            ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
            ->select('personas.*')
            ->where('eventos.id', '=', $id)
            ->distinct()
            ->paginate(15);

        return $personas;
    }

    public function allPersonasCategoriaByEventosinpaginar($id)
    {
        $personas = DB::table('personas')
            ->join('categoria_persona', 'personas.id', '=', 'categoria_persona.persona_id')
            ->join('categorias', 'categoria_persona.categoria_id', '=', 'categorias.id')
            ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
            ->select('personas.*')
            ->where('eventos.id', '=', $id)
            ->distinct()
            ->paginate(1500);

        return $personas;
    }

   public function editarCategoria($idPersona, $idEvento)
    {
        $categorias = DB::table('categorias')
            ->join('categoria_persona', 'categorias.id', '=', 'categoria_persona.categoria_id')
            ->join('personas', 'categoria_persona.persona_id', '=', 'personas.id')
            ->join('eventos', 'categoria_persona.evento_id', '=', 'eventos.id')
            ->select('categorias.*')
            ->where('eventos.id', '=', $idEvento)
            ->where('personas.id', '=', $idPersona)
            ->distinct()
            ->get();

         $selected = array();

        //Recorro las categorias que tiene la pesrona

       if (!empty($categorias)){
            foreach ($categorias as $row) {
                //$options[$row->id] = $row->nombre;
                array_push($selected, $row->id);             //seteo las categorias que tiene asignada
            }
        }

        $options = Config::get('categorias.types'); //traigo los valores del archivo categorias.php dentro de la carpeta config
        return view('evento/configCategorias', compact('options', 'selected', 'idEvento', 'idPersona' ));

    }

   public function saveCategorias(Request $request )
   {

       //recibo del formulario las categorias para hacer el update
       $array = $request->all();
       foreach($array as $key => $value)
       {
           $resultado [] =   $value;
       }
        //dd($resultado[1]);

       //TODO: Meter todo esto en una transaccion.

     if(!empty($resultado[1]) and is_array($resultado[1])){
         //elimina las relaciones
         DB::table('categoria_persona')
             ->select('*')
             ->where('evento_id', '=', $request->evento_id)
             ->where('persona_id', '=', $request->persona_id)
             ->delete();

         //insertar las relaciones nuevas
      foreach ($resultado[1] as $idC) {
          DB::table('categoria_persona')->insert(
              ['categoria_id' => $idC, 'evento_id' => $request->evento_id, 'persona_id' => $request->persona_id]
          );
      }

         Session::flash('message', 'Perfecto, se actualizaron las categorías!');
         Session::flash('alert-class', 'alert-success');
     }else{
         Session::flash('message', 'No se guardo!!!! Una persona si o si debe tener una categoría ');
         Session::flash('alert-class', 'alert-danger');

     }



       return redirect()->back();


   }

   public function saveConfEvento(Request $request){


       $evento = Evento::findOrFail($request->evento_id);
       $evento['tolerancia']      = $request->tolerancia;
       $evento['max_asistencias'] = $request->max_asistencias;
       $evento->save();
       Session::flash('message', 'Perfecto, se actualizaron los parametros del evento');
       Session::flash('alert-class', 'alert-success');
       return redirect()->back();
   }

    /**
     * Imprime las etiquetas
     * @param Request $request
     * @return PDF
     */
    public function imprimirEtiqueta(Request $request, $id)
    {

//Si viene de la pantalla de eventos entra por la primera opcion, si es por una busqueda entra por el else
        if (!$request->has('evento_id')){
            $evento = Evento::findorFail($id);
            $personas = $this->allPersonasCategoriaByEventosinpaginar($id);
        }else{
            $evento = Evento::findorFail($request->evento_id);
            $personas = $this->filtroPersonasCategoriasinpaginar($request);
        }


        $pdf = \PDF::loadView('evento/imprimirEtiqueta', compact('personas'))->setPaper('a4');


        return $pdf->download('etiquetas.pdf');

        //magia//
        //return view('evento/listado', compact('personas', 'evento', 'totalInscriptos'));
        //return view('evento/imprimirEtiqueta', compact('personas'));
    }

}