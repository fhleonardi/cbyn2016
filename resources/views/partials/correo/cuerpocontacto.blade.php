<html>
<head>
    <style>
        .sidebar-titles {
            background: #42a9f8;
            font-size: 16px;
            color: #FFF;
            padding: 5px 5px 5px 10px;
        }

        .sidebar-titles a {
            color: #FFF;
            font-size: 12px;
            font-weight: bold;
        }

        .home-news-title {
            font-size: 18px;
            color: #31589d;
        }

        .home-news-title a {
            color: #42a9f8;
        }
    </style>

<body>
<table width="709" border="0" background="{{ $message->embed('img/logocbynclaro.png') }}">
    <tr>
        <td width="262"><img src="{{ $message->embed('img/logo-bromatologia.png') }}" width=262 height=103/></td>
        <td width="322"><span class="sidebar-titles"><strong>Congreso Bromatolog&iacute;a y Nutrici&oacute;n</strong></span></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Sr/Sra. {{$apellidos}}, {{$nombre}}:</strong>
        </td>
    </tr>
    <tr>
        <td colspan="2"><p><strong>Se ha registrado su consulta a Congreso Bromatolog&iacute;a y Nutrici&oacute;n</strong></p>

            <p>Consulta: <strong>{{$consulta}}</strong></p>

            <p>Email: <strong>{{$email}}</strong></p>

            <br>

            <p>Muchas Gracias por usar este servicio </p><br><br><br></td>
    </tr>
</table>
</body>