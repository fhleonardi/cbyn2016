<div class="pure-form">
    <label class="alert-info">Datos Personales</label>
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
        <label>Tipo Documento</label>
        {!! Form::select('tipodoc', $tipoDoc) !!} <label class="alert-danger">obligatorio</label>
    </div>

    <div class="pure-control-group">
        <label>Documento</label>
        {!! Form::text('documento', null,  array('placeholder' => 'Documento', 'required' => 'required')) !!} <label class="alert-danger">obligatorio</label>
    </div>

    <div class="pure-control-group">
        <label>Pais</label>
        {!! Form::select('pais', $pais) !!}
    </div>

    <div class="pure-control-group">
        <label>Provincia</label>
        {!! Form::text('provincia', null, array('placeholder' => 'Provincia'))  !!}
    </div>

    <div class="pure-control-group">
        <label>Localidad</label>
        {!! Form::text('localidad', null, array('placeholder' => 'Localidad'))  !!}
    </div>

    <div class="pure-control-group">
        <label>Domicilio</label>
        {!! Form::text('domicilio', null, array('placeholder' => 'Domicilio'))   !!}
    </div>

    <div class="pure-control-group">
        <label>Código Postal</label>
        {!! Form::text('cp', null, array('placeholder' => 'Código Postal')) !!}
    </div>

    <div class="pure-control-group">
        <label>Teléfono Fijo</label>
        {!! Form::text('telefono', null, array('placeholder' => 'Teléfono Fijo')) !!}
    </div>

    <div class="pure-control-group">
        <label>Celular</label>
        {!! Form::text('celular', null, array('placeholder' => 'Celular')) !!}
    </div>
</div>