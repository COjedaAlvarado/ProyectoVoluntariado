<table  style="border: 1px solid black;">
    <tr>

        <td colspan="3" style="font-size:16px;">Listado de Ciudades</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
        <tr>
            <td style="background-color:#0e7ab0;color:white;border: 1px solid black;padding-left:5px;">ID</td>
            <td style="background-color:#0e7ab0;color:white;border: 1px solid black;padding-left:5px;">NOMBRE</td>
        </tr>


        @foreach ($ciudades as $ciudad)
            <tr>
                <td style="border: 1px solid black;padding:5px;">{{$ciudad->id}}</td>
                <td style="border: 1px solid black;padding:5px;">{{$ciudad->nombre}}</td>
            </tr>
        @endforeach

</table>
