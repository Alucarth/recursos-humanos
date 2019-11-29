
<html>
<table>
    <td><img src="img/logo_small.jpg" width="100" /></td>
    <td colspan="2" style="text-align:center; vertical-align: middle;">
        <h1>EMPRESA BOLIVIANA DE ALIMENTOS</h1>
    </td>
    <td>
       De {{$f_date}} hasta {{$t_date}}
    </td>

</table>

<table border="1">
    <thead class="table_head">
        <tr>
            <td width="15" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>N°</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Apellidos y Nombres</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Salario</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>CI</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Cargo</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Omision</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Atraso</strong>
            </td>
            <td width="40" align="center"
                style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                <strong>Total Descuento</strong>
            </td>
        </tr>
    </thead>
    <tbody>

        @foreach($employees as $index => $employee)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{$index=$index+1}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->getFullName()}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->salary}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->identity_card}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->postion->name??''}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->sanction_discount}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->delay_discount}}</td>
            <td align="center" style="border: 1px solid #000000;">{{$employee->discount}}</td>
        </tr>
        @endforeach
    </tbody>



</table>

</html>
