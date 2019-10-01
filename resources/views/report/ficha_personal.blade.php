@extends('layouts.print')

@section('content')
<h5>1) DATOS PERSONALES</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">APELLIDO PATERNO</td>
        <td class="text-center bg-grey-darker text-xs text-white ">APELLIDO MATERNO</td>
        <td colspan="2" class="text-center bg-grey-darker text-xs text-white ">NOMBRES</td>
    </tr>
    <tr>
        <td class="text-center text-xs uppercase">{{$employee->last_name}}</td>
        <td class="text-center text-xs uppercase">{{$employee->mother_last_name}}</td>
        <td colspan="2" class="text-center text-xs uppercase">{{$employee->first_name.' '.$employee->second_name}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">CÉDULA DE IDENTIDAD:</td>
        <td class="text-center text-xs uppercase">{{$employee->identity_card}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">FECHA NACIMIENTO:</td>
        <td class="text-center text-xs uppercase">{{$employee->birth_date}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">NACIONALIDAD:</td>
        <td class="text-center text-xs uppercase">{{$employee->civil_status}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">ESTADO CIVIL:</td>
        <td class="text-center text-xs uppercase">{{$employee->civil_status}}</td>          
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">LIBRETA DE SERVICIO MILITAR:</td>
        <td class="text-center text-xs uppercase">{{$employee->has_military_card}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">SEXO:</td>
        <td class="text-center text-xs uppercase">{{$employee->gender}}</td>          
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">CERTIFICADO DISCAPACIDAD:</td>
        <td class="text-center text-xs uppercase">{{$employee->id}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">CELULAR:</td>
        <td class="text-center text-xs uppercase">{{$employee->cellphone}}</td>          
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">DIRECCIÓN:</td>
        <td class="text-center text-xs uppercase">{{$employee->address}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">TELÉFONO:</td>
        <td class="text-center text-xs uppercase">{{$employee->phone}}</td>          
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">CORREO PERSONAL:</td>
        <td class="text-center text-xs">{{$employee->personal_email}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">CORREO INSTITUCIONAL:</td>
        <td class="text-center text-xs">{{$employee->corporate_email}}</td>          
    </tr>
</table>
<br>
<h5>2) DATOS PARENTEZCO</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <th class="text-center bg-grey-darker text-xs text-white">NOMBRE</th>
        <th class="text-center bg-grey-darker text-xs text-white">PARENTEZCO</th>
        <th class="text-center bg-grey-darker text-xs text-white">EDAD</th>
        <th class="text-center bg-grey-darker text-xs text-white">FECHA NACMIENTO</th>
        <th class="text-center bg-grey-darker text-xs text-white">TELEFÓNO</th>
        <th class="text-center bg-grey-darker text-xs text-white">CELULAR</th>
    </tr>
    <tr>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
    </tr>
</table>
<br>
<h5>3) DATOS REFERENCIALES</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">AFP:</td>
        <td class="text-center text-xs uppercase">{{$employee->contribution->name}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">NUA/CUA:</td>
        <td class="text-center text-xs uppercase">{{$employee->cua_nua}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">BANCO:</td>
        <td class="text-center text-xs uppercase">{{$employee->bank}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">N° CUENTA:</td>
        <td class="text-center text-xs uppercase">{{$employee->account_number}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">SEGURO:</td>
        <td class="text-center text-xs uppercase">-</td>
        <td class="text-center bg-grey-darker text-xs text-white ">N° MATRICULA:</td>
        <td class="text-center text-xs uppercase">-</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">TIPO SANGRE:</td>
        <td class="text-center text-xs uppercase">-</td>
        <td class="text-center bg-grey-darker text-xs text-white ">MÉDICO:</td>
        <td class="text-center text-xs uppercase">-</td>
    </tr>
</table>
<br>
<h5>4) FORMACIÓN ACADÉMICA</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">TÍTULO</td>
        <td class="text-center bg-grey-darker text-xs text-white">N° DOCUMENTO</td>
        <td class="text-center bg-grey-darker text-xs text-white">ESTADO</td>
        <td class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</td>
        <td class="text-center bg-grey-darker text-xs text-white">AÑO INICIO</td>
    </tr>
    <tr>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
    </tr>
</table>
<br>
<h5>5) CURSOS Y/O SEMINARIOS</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">GESTIÓN</td>
        <td class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</td>
        <td class="text-center bg-grey-darker text-xs text-white">NOMBRE</td>
        <td class="text-center bg-grey-darker text-xs text-white">DURACIÓN</td>
    </tr>
    <tr>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
        <th class="text-center text-xs">-</th>
    </tr>
</table>
@endsection