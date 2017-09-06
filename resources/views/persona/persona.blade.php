@extends('app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h1>Inscripción</h1></div>
                     <!--   @if(Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                        @endif -->
                            <div class="panel-body">
                                    {!! Form::open(array('action' => 'Persona\PersonaController@store', 'class'=> 'pure-form pure-form-aligned', 'data-toggle'=> 'validator')) !!}
                                    <div class="form-group">
                                        <label style="font-size: large">Evento</label>
                                            {!! Form::select('evento_id', $eventos) !!}
                                    </div>
                                        @include('partials.inscripcion.datosPersonales')
                                        @include('partials.inscripcion.estudiosUniversitarios')
                                        @include('partials.inscripcion.docentes')
                                        @include('partials.inscripcion.representantes')
                                <div class="hidden">
                                       <label>Categoria</label>
                                       {!! Form::checkboxes('options', $options ) !!}
                                </div>
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
                                    {!! Form::close() !!}
                            </div>
                    </div>
                </div>
@endsection