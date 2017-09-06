@extends('app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h3>Configurar categorias</h3></div>
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="panel-body">
                    {!!  Form::open(['route' => 'saveCategorias', 'method' => 'post']) !!}
                    {!! Form::label('categorias', 'Categorías')!!}
                    {!! Form::checkboxes('options', $options, $selected) !!}
                    {!! Form::hidden('evento_id', $idEvento) !!}
                    {!! Form::hidden('persona_id', $idPersona) !!}
                    <button type="submit" class="btn btn-info">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div align="center">
        <!-- @include('partials.goEventosList') -->
    </div>
</div>
</div>
@endsection