<!--/**
 * Created by PhpStorm.
 * User: jparra
 * Date: 30/08/2016
 * Time: 12:32
 */ -->
<div align="center">
    @if(Session::has('message_congreso'))
        <div id="ma" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message_congreso') }}</div>
    @endif
    @if(Session::has('message'))
        <div id="ma" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
    @endif
    @if(Session::has('file_success'))
        <div id="ma" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('file_success') }}</div>
    @endif
        @if(Session::has('mensaje_correo_ok'))
            <div id="ma" class="alert {{ Session::get('alert-class', 'alert-info') }}">
                <h4>{{ Session::get('mensaje_correo_ok') }} <br><br>
                 <strong>{{ Session::get('mensaje_correo_ok1') }}</strong></h4>
            </div>
        @endif
</div>