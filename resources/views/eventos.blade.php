@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h1>Eventos</h1></div>
                    <div class="panel-body">
                        Cantidad de Eventos:  {!! $eventos->total() !!}
                        <table class="table table-striped">
                            <tr>
                                <th>Id Evento</th>
                                <th>Nombre del Evento</th>
                                <th>Status</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach($eventos as $evento)
                            <tr>
                                <td>{{ $evento->id  }}</td>
                                <td>{{ $evento->nombre  }}</td>
                                <td>-</td>
                                <td>
                                    <a href="{{route('asistenciaid', $evento)}}">Ingresar</a> /
                                 @if(Auth::user()->role == 'admin' || Auth::user()->role == 'editor' )
                                    <a href="{{route('configurar', $evento)}}">Configurar</a>/
                                        <a href="{{route('listado', $evento)}}">Listado</a>/
                                        <a href="{{route('imprimirEtiqueta', $evento)}}">Imprimir etiquetas</a>
                                 @endif
                                  <!-- /<a href="{{route('reporte', $evento)}}">Reporte</a> -->
                                </td>
                            </tr>

                            @endforeach
                        </table>
                        {!! $eventos->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
