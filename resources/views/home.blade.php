@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h1>Asistencia al Evento:  {{ isset($evento) ? $evento[0]->nombre : '-' }} </h1></div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'asistencia', 'method' => 'POST', 'id' => 'form-ajax']) !!}
                            <div>{!! Form::text('username', null, ['class' => 'form-control text-center' ,  'id' => 'legajo',  'placeholder' => 'Ingrese el Código'] ) !!}</div>
                        {!! Form::hidden('evento_id', $evento[0]->id) !!}
                        {!! Form::close() !!}
                        <div id="respuesta" align="center" class="panel-info">
                        </div>
                        <div id="error" align="center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@include('home.partials.homeScript' )
@endsection

