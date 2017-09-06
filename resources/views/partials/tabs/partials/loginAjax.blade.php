
<!--/**
 * Created by PhpStorm.
 * User: jparra
 * Date: 30/08/2016
 * Time: 10:42
 */ -->
<!-- Modal -->
<div class="modal fade" style="text-align: center;" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">

                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
{!! Form::open(['route' => 'congresoPost', 'method' => 'POST', 'id' => 'form-ajax']) !!}
<p><h3><span class="label label-danger">Importante!!</span></h3></p>
<p><h5><span class="label label-default">Para acceder a la presentación de trabajos al congreso, deberá estar previamente inscripto.</span></h5></p>

<fieldset><legend>Registro</legend>
    <div class="form-group">
        <label>Usuario</label>
        <div>
            <input type="text" class="form-control" id="inputText3" placeholder="Usuario"/>
        </div>
        <label>Password</label>
        <div><input type="password" class="form-control"  id="inputPassword3" placeholder="Password"/></div>
        <div><br>
            {!! Form::button('Acceder', array('class' => 'btn btn-primary',  'id' => 'submit')) !!}
        </div>
    </div>
</fieldset>
<div id="respuesta" align="center" class="panel-info">
</div>
<div id="error" align="center">
</div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>