<script>
    $( document ).ready(function() {
        $("#legajo").focus();
        var ok = 2; //el array trae dos objetos, el segundo es el resultado
        $(document).keydown( function(event) {
            //  event.preventDefault();
            if (event.which === 13) {
                var form = $('#form-ajax');
                var url = form.attr('action');
                var urlHome = url.replace('/asistencia','/home');
                var data = form.serialize();

                $.ajax({
                    url: url,
                    data: {evento_id: $('input[name=evento_id]').val(), username: $("#legajo").val()},
                    type: "POST",
                    cache: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#respuesta").html('<img id="loader-img" alt="" src="../img/loading.gif"  align="center" />');
                        $("#legajo").prop( "disabled", true );
                    },
                    success: function(respuesta) {
                        if (respuesta.length == ok) {
                            var html = '<div align="center" class="panel-success">' +
                                    '<div class="panel-heading text-center"><h1>' + respuesta[0].nombre + ', ' +  respuesta[0].apellidos +  '</h1></div>';
                            html += '<strong> DNI: ' + $("#legajo").val()  + ' <br>';
                            html += ' Email: ' + respuesta[0].email + ' <br></strong>';
                            html += '<strong> Localidad: ' + respuesta[0].localidad  + ' <br>';
                            html += '<strong> Provincia: ' +  respuesta[0].provincia  + ' <br>';
                            html += '<strong> País: ' +  respuesta[0].pais  + ' <br>';
                            html += '</div> </div>';
                            html +='<div align="center" class="panel-warning">' +
                            '<div class="panel-heading text-center"><h2> <strong>'  + respuesta[1].valor  + '</strong>  </h2></div>';
                            html += '</div> </div>';
                            $("#respuesta").html(html);
                        } else {
                            var html = '<div align="center" class="panel-danger">' +
                                    '<div class="panel-heading text-center"><h1>NO SE ENCUENTRA</h1></div>';
                            html += '<strong> DNI: ' + $("#legajo").val()  + ' <br>';
                            html += '<strong> ' + respuesta[0].valor  + '</strong>';
                            html += '</div> </div>';
                            $("#respuesta").html(html);
                        }
                        $("#legajo").prop( "disabled", false );
                        $("#legajo").val('');
                        $("#legajo").focus();
                    },
                    error: function(datos) {
                        $("#respuesta").html('<div style="color: red" class="alert-danger"> <strong>Ha surgido un error contactese con el administrador.</strong> </div>');
                        $("#error").html('<div class="alert-danger"><a href="home"> <input type="button" value="Volver" name="Volver"/></a></div>')
                    }
                }).done(function(datos){
                    console.log(datos);
                });

                return false;
            }
        });
    });
</script>