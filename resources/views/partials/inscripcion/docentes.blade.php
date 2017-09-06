<div>
    <label class="alert-info">Para Docentes</label>
    <div class="pure-control-group">
        <label>Catedra</label>
        {!!Form::text('catedra_docencia', null, array('placeholder' => 'Catedra')) !!}
    </div>
    <div class="pure-control-group">
        <label>Carrera</label>
        {!!Form::text('carrera_docencia', null, array('placeholder' => 'Carrera')) !!}
    </div>
    <div class="pure-control-group">
        <label>Facultad</label>
        {!!Form::text('facultad_docencia', null, array('placeholder' => 'Facultad')) !!}
    </div>
    <div class="pure-control-group">
        <label>Universidad</label>
        {!!Form::text('universidad_docencia', null, array('placeholder' => 'Universidad')) !!}
    </div>
</div>