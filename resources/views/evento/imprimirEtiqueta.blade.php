<style>

    @page {
        size: a4;
        margin-top: 0.4cm;
        margin-left: 0cm;
        margin-right: 0cm;
        margin-bottom: 0.5cm ;

    }
</style>

<table cellspacing="0" border="0"
       style="width: 100%; border: 0px;padding: 0px 2px;">
    @foreach($personas->chunk(2) as $names)
        <tr>
            @foreach($names as $name)
                <td style="width:50%; padding: 1px 2px;">
                    <div style="text-align: center; height: 4.05cm;"><br><img
                                src="data:image/png;base64,{{DNS1D::getBarcodePNG($name->documento, 'C128B',2,70,array(00,000,00))}}"
                                alt="barcode"/>

                        <br><span style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 27px; font-weight: bold;">
                    {{ $name->apellidos }}</span><br>
                        <span style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 22px; font-weight: bold;">{{ $name->nombre }}</span>
                    </div>
                </td>
            @endforeach
        </tr>
    @endforeach

</table>