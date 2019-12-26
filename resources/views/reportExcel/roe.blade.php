@php
    $employees= App\Employee::all();
@endphp
<html>
    <table>
        <td><img src="img/logo_small.jpg" width="100" /></td>
        <td colspan="2" style="text-align:center; vertical-align: middle;">
            <h1>EMPRESA BOLIVIANA DE ALIMENTOS</h1>
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
                    <strong>Ci</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Extension</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Apellidos y Nombres</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Fecha de Nacimiento</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Pais</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Genero</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Jubilado</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>¿Aporta a la AFP?
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>¿Persona con discapacidad?
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Tutor de persona con discapacidad
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Fecha de ingreso
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Fecha de retiro
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Motivo retiro
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Caja de salud
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>NUA/CUA
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Sucursal o ubicación adicional
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Clasificación laboral
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Cargo</strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Modalidad de contrato
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Tipo contrato
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Días pagados
                    </strong>
                </td>

                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Horas pagadas
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Haber Básico
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Bono de antigüedad
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Horas extra
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Monto horas extra
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Horas recargo nocturno
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Monto horas extra nocturnas
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Horas extra dominicales
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Monto horas extra dominicales
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Nro. dominicales
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Salario dominical
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Bono producción
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Subsidio frontera
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Otros bonos y pagos
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>RC-IVA
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Aporte Caja Salud
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Aporte AFP
                    </strong>
                </td>
                <td width="40" align="center"
                    style="background-color: #808080; border: 1px solid #000000; vertical-align: middle;">
                    <strong>Otros descuentos
                    </strong>
                </td>
            </tr>
        </thead>
        <tbody>

            @foreach($employees as $index => $employee)
            <tr>
                <td align="center" style="border: 1px solid #000000;">{{$index=$index+1}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->identity_card}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->city_identity_card->shortened}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->getFullName()}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->birth_date}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->country->name??''}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->gender}}</td>
                <td align="center" style="border: 1px solid #000000;">0</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->salary}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->postion->name??''}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->sanction_discount}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->delay_discount}}</td>
                <td align="center" style="border: 1px solid #000000;">{{$employee->discount}}</td>
            </tr>
            @endforeach
        </tbody>



    </table>

    </html>
