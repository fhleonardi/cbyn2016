<div class="row">
    <div class="col-xs-6 col-md-4"><p>&nbsp;</p><img width="380" height="450"  src="{{ asset('img/cbyn.png')}}" class="img-responsive"   alt="Logo CBYN"></div>
    <div class="col-xs-12 col-md-8"><h2><img src="{{ asset('img/titulo.png')}}" alt="titulo"> Inscripción</h2>
        {!! Form::open(array('action' => 'Persona\PersonaController@store', 'class'=> 'pure-form pure-form-aligned', 'data-toggle'=> 'validator')) !!}


        <input type="hidden" name="evento_id" value="2">

        <div align="left">
                <div>@include('partials.inscripcion.datosPersonales')</div><hr>
                <div>@include('partials.inscripcion.estudiosUniversitarios')</div><hr>
                <div>@include('partials.inscripcion.docentes')</div><hr>
                <div>@include('partials.inscripcion.representantes')</div><hr>
        </div>
        <div align="center"><p>{!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}</p></div><br>
    </div>
    </div>
{!! Form::close() !!}

<script>
    $('#de').delay(3000).slideUp(300);
</script>