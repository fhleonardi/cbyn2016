@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h1>Evento: {{ $evento->nombre }}</h1></div>
                    <div class="panel-heading text-center"><h3>Listado de Personas</h3></div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="panel-title text-left"><h4>Total de inscriptos : {!! $personas->total()!!}</h4></div>
                    <div class="panel-body">
                        {!! Form::model(Request::all(), ['route' => 'listado', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
                            {!! Form::select('type', config('filtro_categorias.types'), null, ['class' => 'form-control']) !!}
                            {!! Form::hidden('evento_id', $evento->id) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form::close() !!}
                        <table class="table table-striped">
                            <tr>
                                <th>Persona</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach($personas as $persona)
                                <tr>
                                    <td>{{ $persona->id  }}</td>
                                    <td>{{ $persona->apellidos }}, {{ $persona->nombre }}  </td>
                                    <td>{{ $persona->documento }}</td>
                                    <td>
                                        <a href="{{route('editarCategoria',  array($persona->id, $evento->id))}}">Configurar Categoría</a>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                        <!-- {!! $personas->appends(Request::only(['name', 'type', 'evento_id']))->render() !!} -->
                        {!! $personas->render() !!}
                    </div>
                </div>
                <div>
                    <button name="boton" class="btn btn-info"><a href="{{ URL::previous() }}" >Volver</a> </button>
                    <button name="boton" class="btn btn-default"> <a href="{{route('imprimirEtiqueta',  array($evento->id))}}">Imprimir Etiquetas</a></button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
