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
        <td class="text-center text-xs uppercase">{{$employee->country->name}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">ESTADO CIVIL:</td>
        <td class="text-center text-xs uppercase">{{$employee->civil_status}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">LIBRETA DE SERVICIO MILITAR:</td>
        <td class="text-center text-xs uppercase">{{$employee->has_military_card?'SI':'NO'}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">NÚMERO DE LIBRETA:</td>
        <td class="text-center text-xs uppercase">{{$employee->military_serial_number}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">CERTIFICADO DISCAPACIDAD:</td>
        <td class="text-center text-xs uppercase">{{$employee->disability?'SI':'NO'}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">CELULAR:</td>
        <td class="text-center text-xs uppercase">{{$employee->cellphone}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">SEXO:</td>
        <td class="text-center text-xs uppercase">{{$employee->gender}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">TELÉFONO:</td>
        <td class="text-center text-xs uppercase">{{$employee->phone}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">CORREO PERSONAL:</td>
        <td class="text-center text-xs">{{$employee->personal_email}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">CORREO INSTITUCIONAL:</td>
        <td class="text-center text-xs">{{$employee->corporate_email}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">DIRECCIÓN:</td>
        <td colspan="3" class="text-center text-xs uppercase">{{$employee->address}}</td>
    </tr>
</table>

<h5>2) DATOS PARENTEZCO</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <th class="text-center bg-grey-darker text-xxs text-white">NOMBRE</th>
        <th class="text-center bg-grey-darker text-xxs text-white">PARENTEZCO</th>
        <th class="text-center bg-grey-darker text-xxs text-white">EDAD</th>
        <th class="text-center bg-grey-darker text-xxs text-white">FECHA NACMIENTO</th>
        <th class="text-center bg-grey-darker text-xxs text-white">TELEFÓNO</th>
        <th class="text-center bg-grey-darker text-xxs text-white">CELULAR</th>
        <th class="text-center bg-grey-darker text-xxs text-white">CAJA SEGURO</th>
        <th class="text-center bg-grey-darker text-xxs text-white">N° MATRICULA</th>
    </tr>
    @foreach($employee->families as $family)
    <tr>
        <th class="text-center text-xs">{{$family->first_name.' '.$family->second_name.' '.$family->last_name.' '.$family->mother_last_name}}</th>
        <th class="text-center text-xs">{{$family->kinship->name}}</th>
        <th class="text-center text-xs">{{$family->age}}</th>
        <th class="text-center text-xs">{{$family->birth_date}}</th>
        <th class="text-center text-xs">{{$family->phone}}</th>
        <th class="text-center text-xs">{{$family->cellphone}}</th>
        <th class="text-center text-xs">{{$family->health_box->name}}</th>
        <th class="text-center text-xs">{{$family->number_healt_box}}</th>
    </tr>
    @endforeach
</table>

<h5>3) DATOS REFERENCIALES</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">AFP:</td>
        <td class="text-center text-xs uppercase">{{$employee->contribution->afp_name}}</td>
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
        <td class="text-center text-xs uppercase">{{$employee->health_box->name}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">N° MATRICULA:</td>
        <td class="text-center text-xs uppercase">{{$employee->registration_number_medical}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">TIPO SANGRE:</td>
        <td class="text-center text-xs uppercase">{{$employee->blood_type}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">MÉDICO:</td>
        <td class="text-center text-xs uppercase">{{$employee->doctor_name}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">N° DEPENDENCIA:</td>
        <td class="text-center text-xs uppercase">{{$employee->number_dependency}}</td>
        <td colspan="2"> </td>
        {{-- <td class="text-center bg-grey-darker text-xs text-white ">DECLARACION JURADA:</td>
        <td class="text-center text-xs uppercase">{{$employee->sworn_declaration?'SI':'NO'}}</td> --}}
    </tr>
    {{-- <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">FECHA RECEPCIÓN:</td>
        <td class="text-center text-xs uppercase">{{$employee->date_reception}}</td>
        <td class="text-center bg-grey-darker text-xs text-white ">FECHA DECLARACIÓN:</td>
        <td class="text-center text-xs uppercase">{{$employee->number_declaration}}</td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">N° DECLARACIÓN:</td>
        <td class="text-center text-xs uppercase">{{$employee->number_declaration}}</td>
        <td class="text-center text-xs uppercase no-border border-bottom"></td>
        <td class="text-center text-xs uppercase no-border border-bottom"></td>
    </tr> --}}
</table>

<h5>4) FORMACIÓN ACADÉMICA</h5>
<table class="table-info align-top no-padding no-margins border">
    <thead>
        <tr>
            <th class="text-center bg-grey-darker text-xs text-white">TÍTULO</th>
            <th class="text-center bg-grey-darker text-xs text-white">N° DOCUMENTO</th>
            <th class="text-center bg-grey-darker text-xs text-white">ESTADO</th>
            <th class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</th>
            <th class="text-center bg-grey-darker text-xs text-white">AÑO INICIO</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employee->academic_trainings as $academic)
        <tr>
            <td class="text-center text-xs">{{$academic->name}}</td>
            <td class="text-center text-xs">{{$academic->document}}</td>
            <td class="text-center text-xs">{{$academic->state}}</td>
            <td class="text-center text-xs">{{$academic->instituion}}</td>
            <td class="text-center text-xs">{{$academic->date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h5>5) CURSOS Y/O SEMINARIOS</h5>
<table class="table-info align-top no-padding no-margins border">
    <thead>
        <tr>
            <th class="text-center bg-grey-darker text-xs text-white">GESTIÓN</th>
            <th class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</th>
            <th class="text-center bg-grey-darker text-xs text-white">NOMBRE</th>
            <th class="text-center bg-grey-darker text-xs text-white">DURACIÓN</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employee->courses as $course)
        <tr>
            <td class="text-center text-xs">{{$course->date}}</td>
            <td class="text-center text-xs">{{$course->institution}}</td>
            <td class="text-center text-xs">{{$course->name}}</td>
            <td class="text-center text-xs">{{$course->hours}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h5>6) IDIOMAS</h5>
<table class="table-info align-top no-padding no-margins border">
    <thead>
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white">GESTIÓN</td>
            <td class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</td>
            <td class="text-center bg-grey-darker text-xs text-white">IDIOMA</td>
        </tr>
    </thead>
    <thead>
        @foreach($employee->languages as $language)
        <tr>
            <th class="text-center text-xs">{{$language->date}}</th>
            <th class="text-center text-xs">{{$language->institution}}</th>
            <th class="text-center text-xs">{{$language->name}}</th>
        </tr>
        @endforeach
    </thead>
</table>

<h5>7) OFIMATICA Y/O APLICACIONES</h5>
<table class="table-info align-top no-padding no-margins border ">
    <thead>
        <tr>
            <th class="text-center bg-grey-darker text-xs text-white">GESTIÓN</th>
            <th class="text-center bg-grey-darker text-xs text-white">INSTITUCIÓN</th>
            <td class="text-center bg-grey-darker text-xs text-white">IDIOMA</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee->packages as $package)
        <tr >
            <td class="text-center text-xs">{{$package->date}}</td>
            <td class="text-center text-xs">{{$package->institution}}</td>
            <td class="text-center text-xs">{{$package->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h5>8) OTROS</h5>
<table class="table-info align-top no-padding no-margins border">
    <tbody>
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">TALLA DE CAMISAS:</td>
            <td class="text-center text-xs uppercase">{{$employee->shirt}}</td>
            <td class="text-center bg-grey-darker text-xs text-white ">TALLA DE POLERAS:</td>
            <td class="text-center text-xs uppercase">{{$employee->t_shirt}}</td>
        </tr>
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">TALLA DE CHAMARRAS:</td>
            <td class="text-center text-xs uppercase">{{$employee->jacket}}</td>
            <td class="text-center bg-grey-darker text-xs text-white ">N° BOTA:</td>
            <td class="text-center text-xs uppercase">{{$employee->boots_number}}</td>
        </tr>
    </tbody>
</table>
<h5>9) EXPERIENCIA LABORAL</h5>
<table class="table-info align-top no-padding no-margins border">
    <thead>
        <tr>
            <td class="text-center bg-grey-darker text-xxs text-white">GESTIÓN</td>
            <td class="text-center bg-grey-darker text-xxs text-white">INSTITUCIÓN/EMPRESA</td>
            <td class="text-center bg-grey-darker text-xxs text-white">CARGO</td>
            <td class="text-center bg-grey-darker text-xxs text-white">TELEFONO DE REFERENCIA</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee->works as $work)
        <tr>
            <th class="text-center text-xs">{{$work->date}}</th>
            <th class="text-center text-xs">{{$work->institution}}</th>
            <th class="text-center text-xs">{{$work->position}}</th>
            <th class="text-center text-xs">{{$work->phone}}</th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
