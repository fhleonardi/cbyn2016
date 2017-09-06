/**
 * Created by jparra on 29/08/2016.
 */
function loginResumenes(){
    $('#myModal').modal('show');//muestra el login en forma Modal
    $('#subirArchivos').hide();//oculta el div que contiene el formulario para subir archivos
}

$(document).ready(function ()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#submit").click(function(){
        // e.preventDefault();
        var form = $('#form-ajax');
        var url = 'congresoPost';
        var data = form.serialize();
        $.ajax({
            url: url,
            data: {username: $("#inputText3").val(), pass: $("#inputPassword3").val()},
            type: "POST",
            cache: false,
            dataType: "JSON",
            beforeSend: function() {
                $("#respuesta").html('<button class="btn btn-default btn-lg"><i class="fa fa-spinner fa-spin"></i> Loading</button>');
            },
            success: function(respuesta) {
                if(respuesta != 0) {
                    $("#respuesta").html('');
                    $('#myModal').modal('hide');
                    $('#subirArchivos').show();
                }else {
                    $("#respuesta").html('<div style="color: red" class="alert-danger"> <strong>Su usuario no esta registrado, o los datos no son correctos. Verifique.</strong> </div>');
                    $("#error").html('<div class="alert-danger"><a href=congreso> <input type="button" value="Volver" name="Volver"/></a></div>')
                }
            },
            error: function(datos) {
                $("#respuesta").html('<div style="color: red" class="alert-danger"> <strong>Ha surgido un error contactese con el administrador.</strong> </div>');
                $("#error").html('<div class="alert-danger"><a href="congreso"> <input type="button" value="Volver" name="Volver"/></a></div>')
            }
        }).done(function(datos){
            console.log(datos);
        });
    });
});