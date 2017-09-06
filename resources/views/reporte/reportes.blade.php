@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h1>Reportes</h1></div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-title text-left"><h4>--------</h4></div>
                    <div class="panel-body">
                        {!! Form::model(Request::all(), ['route' => 'configurar', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
                            {!! Form::select('type', config('filtro_categorias.types'), null, ['class' => 'form-control']) !!}
                            {!! Form::hidden('evento_id', $evento->id) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form::close() !!}
                        <table class="table table-striped">
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach($personas as $persona)
                                <tr>
                                    <td>{{ $persona->id  }}</td>
                                    <td>{{ $persona->apellidos }}, {{ $persona->nombre }}  </td>
                                    <td>
                                    
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
