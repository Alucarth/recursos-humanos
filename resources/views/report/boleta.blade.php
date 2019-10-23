@extends('layouts.print_request')

@section('content')
<h5>1) IDENTIFICACIÓN DEL BENEFICIARIO</h5>
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
</table>
<h5>2) SOLICITUD DEL </h5>
{{-- <table class="table-info align-top no-padding no-margins border">
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
</table> --}}


@endsection
