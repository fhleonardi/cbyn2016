<script>
    function validar(){
        var response = document.subir.file1.value + document.subir.file2.value + document.subir.file3.value;
        if (response == ""){
            alert("Debe enviar al menos un archivo");
                return false;
        }else{
                return true;
        }
    }
</script>

@include('partials.tabs.partials.loginAjax')
<div class="container">
        <div class="row" id="subirArchivos">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar archivos</div>
                    <div align="center" ><h4>
                    Se sugiere nombrar los archivos con este criterio:</h4>
                    <h4><em>Apellido_iniciales nombre_area tematica</em></h4></div>
                    <div class="panel-body">
                        <form name="subir" method="POST" action="/congreso/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data" onsubmit="return validar ();">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="file1" >
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="file2" >
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="file3" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary"  onclick="validacion()">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <br>

</div>
