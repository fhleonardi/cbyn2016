@extends('app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-info">
                  <div class="panel-heading text-center"><h1>Configurar el evento: {{ $evento->nombre }}</h1></div>
                  @if(Session::has('message'))
                      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                  @endif
                  <div>
                      <div class="panel-body">
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4">
                                      {!! Form::open(array('action' => 'Evento\EventoController@saveConfEvento')) !!}
                                      {!! Field::number('tolerancia', $tolerancia) !!}
                                      {!! Field::number('max_asistencias', $max_asistencias) !!}
                                      {!! Field::hidden('evento_id', $evento->id) !!}
                                      {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
                                      {!! Form::close() !!}
                                  </div>
                                  <div class="col-md-8"><br>
                                       <h6><strong>Configure el tiempo en minutos, en el cual es sistema validará el ingreso entre registraciones.</strong></h6>
                                  </div>
                                  <div class="col-md-8"><br><br>
                                      <h6><strong>Máximo de asistencias permitidas pora el evento.</strong></h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
@endsection
