<table style="border: 1px solid black;">
    <tr>

        <td colspan="4" style="font-size:16px;">Listado de Estado Civil</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

        <tr>
            <td style="background-color:#0e7ab0;color:white;;border: 1px solid black;padding:5px;" >ID</td>
            <td style="background-color:#0e7ab0;color:white;;border: 1px solid black;padding:5px;" >NOMBRE</td>
        </tr>


        @foreach ($estcivil as $estados)
            <tr>
                <td style="border: 1px solid black;padding:5px;">{{$estados->id}}</td>
                <td style="border: 1px solid black;padding:5px;">{{$estados->nombre}}</td>
            </tr>
        @endforeach

</table>
