<table style="border: 1px solid black;">
    <tr>

        <td colspan="5" style="font-size:16px;">Listado de Grupos Sanguineos</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

        <tr>
            <td style="background-color:#0e7ab0;color:white;;border: 1px solid black;padding:5px;" >ID</td>
            <td style="background-color:#0e7ab0;color:white;;border: 1px solid black;padding:5px;" >NOMBRE</td>
        </tr>


        @foreach ($grupos as $grupo)
            <tr>
                <td style="border: 1px solid black;padding:5px;">{{$grupo->id}}</td>
                <td style="border: 1px solid black;padding:5px;">{{$grupo->nombre}}</td>
            </tr>
        @endforeach

</table>
