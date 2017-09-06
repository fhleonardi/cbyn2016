<div>
    <label class="alert-info">Estudios Universitarios de Grado</label>
    <div class="pure-control-group">
        <label>Título(s)</label>
        {!! Form::text('titulo_egreso', null, array('placeholder' => 'Titulo(s)')) !!}
    </div>
    <div class="pure-control-group">
        <label>Universidad(es)</label>
        {!! Form::text('universidad_egreso', null, array('placeholder' => 'Universidad(es)')) !!}
    </div>
    <div class="pure-control-group">
        <label>Año Egreso</label>
        {!!Form::text('fecha_egreso', null, array('placeholder' => 'Año Egreso')) !!}
    </div>
</div>