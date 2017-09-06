<div class="row">
    <div class="col-xs-6 col-md-4"><p>&nbsp;</p><img width="380" height="450"  src="{{ asset('img/cbyn.png')}}" class="img-responsive"></div>
    <div class="col-xs-12 col-md-8"><h2><img src="{{ asset('img/titulo.png')}}"> Formulario de contacto</h2>
        {!! Form::open(array('action' => 'Congreso\CongresoController@contacto', 'class'=> 'pure-form pure-form-aligned', 'data-toggle'=> 'validator')) !!}


        <input type="hidden" name="evento_id" value="{{ $evento_id }}">

<div class="pure-form">
    <div class="pure-control-group">
        <label>Nombre</label>
        {!! Form::text('nombre', null,  array('placeholder' => 'Nombre', 'required' => 'required' )) !!} <label class="alert-danger">obligatorio</label>
    </div>
    <div class="pure-control-group">
        <label>Apellido</label>
        {!! Form::text('apellidos', null,  array('placeholder' => 'Apellido', 'required' => 'required')) !!} <label class="alert-danger">obligatorio</label>
    </div>

    <div class="pure-control-group">
        <label>Correo Electrónico</label>
        {!! Form::email('email', null,  array('placeholder' => 'Correo Electrónico', 'required' => 'required')) !!} <label class="alert-danger">obligatorio</label>
    </div>
    <div class="pure-control-group">
        <label>Consulta</label>
        {!! Form::textarea('consulta', null,  array('placeholder' => 'Consulta', 'required' => 'required')) !!} <label class="alert-danger">obligatorio</label>
    </div>

</div>
        <div align="center"><p>{!! Form::submit('Enviar', ['class' => 'btn btn-info']) !!}</p></div><br>
    </div>
    </div>
{!! Form::close() !!}

<script>
    $('#de').delay(3000).slideUp(300);
</script>
