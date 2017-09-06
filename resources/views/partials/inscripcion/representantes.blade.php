<div>
    <label class="alert-info">Para Representantes de empresas u organismos</label>
    <div class="pure-control-group">
        <label>Entidad</label>
        {!! Form::text('entidad', null, array('placeholder' => 'Entidad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Función que desempeña</label>
        {!! Form::text('funcion_entidad', null, array('placeholder' => 'Función que desempeña')) !!}
    </div>
    <div class="pure-control-group">
        <label>Pais de la entidad</label>
        {!! Form::select('pais_entidad', $pais) !!}
    </div>
    <div class="pure-control-group">
        <label>Provincia</label>
        {!! Form::text('provincia_entidad', null, array('placeholder' => 'Provincia de la entidad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Localidad</label>
        {!! Form::text('localidad_entidad', null, array('placeholder' => 'Localidad de la entidad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Domicilio</label>
        {!! Form::text('domicilio_entidad', null, array('placeholder' => 'Domicilio de la entidad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Codigo Postal</label>
        {!! Form::text('cp_entidad', null, array('placeholder' => 'Código Postal de la entidad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Telefono</label>
        {!! Form::text('telefono_entidad', null, array('placeholder' => 'Teléfono de la entidad')) !!}
    </div>
    <div class="pure-control-group pure-form">
        <label>Correo Electrónico</label>
        {!! Form::email('email_entidad', null, array('placeholder' => 'Correo Electrónico de la entidad')) !!}
    </div>
</div>