@extends('layouts.print_request')

@section('content')
<h5>I. IDENTIFICACIÓN DEL SOLICITANTE</h5>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">Solicitante</td>
        <td colspan="3" class="text-xs uppercase">{{$persona}}</td>
    </tr>
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Dependencia</td>
        <td colspan="3" class="text-xs uppercase">{{$gerencia}}</td>
    </tr>

</table>
@if($employee_request->request_type->name != "PERMISO PERSONAL CON GOCE DE HABERES" && $employee_request->request_type->name != "PERMISO PERSONAL SIN GOCE DE HABERES" && $employee_request->request_type->name != "DESCANSO ANUAL" )
    <h5>II. JUSTIFICACIÓN </h5>
@endif

@if($employee_request->request_type->name == "PERMISO PERSONAL CON GOCE DE HABERES" || $employee_request->request_type->name == "PERMISO PERSONAL SIN GOCE DE HABERES"  )
    <h5>II. DETALLES DEL PERMISO </h5>
@endif

@if($employee_request->request_type->name == "DESCANSO ANUAL" )
    <h5>II. SOLICITUD DEL DESCANSO </h5>
@endif

<table class="table-info align-top no-padding no-margins border">

    @if($employee_request->reason)
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">Motivo</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->reason}}</td>
    </tr>
    @endif

    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Fecha</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->date}}</td>
    </tr>
    @if($employee_request->todate)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Hasta</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->todate}}</td>
    </tr>
    @endif
    @if($employee_request->hour_in)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Hora desde</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->hour_in}}</td>
    </tr>
    @endif
    @if($employee_request->hour_out)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Hora hasta</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->hour_out}}</td>
    </tr>
    @endif

    @if($employee_request->destiny_place)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Lugar</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->destiny_place}}</td>
    </tr>
    @endif



    @if($employee_request->authorized_name)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Autorizado por</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->authorized_name}}</td>
    </tr>
    @endif

    @if($employee_request->request_type->name == "DESCANSO ANUAL")
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label1}}</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->value1}}</td>
    </tr>
    @endif
</table>
@if($employee_request->request_type->name == "TOLERANCIA")
<h5>TOLERANCIA</h5>
<table class="table-info align-top no-padding no-margins border">
    @if($employee_request->request_type->label1)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label1}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label2)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label2}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==2?'SI':'NO'}}</td>
        </tr>
    @endif

</table>
@endif

@if($employee_request->request_type->name == "COMISIÓN")
<h5>II. JUSTIFICACIÓN </h5>
<table class="table-info align-top no-padding no-margins border">
        @if($employee_request->request_type->label1)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label1}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==1?'SI':'NO'}}</td>
        </tr>
        @endif

    </table>
@endif

@if($employee_request->request_type->name == "PERMISO PERSONAL CON GOCE DE HABERES")
    <h5>COMPENSACIÓN </h5>
    <table class="table-info align-top no-padding no-margins border">
    @if($employee_request->request_type->label1)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label1}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label2)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label2}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==2?'SI':'NO'}}</td>
        </tr>
    @endif
    </table>
@endif
@if($employee_request->request_type->name == "PERMISO PERSONAL SIN GOCE DE HABERES")
    <h5>MOTIVO </h5>
    <table class="table-info align-top no-padding no-margins border">
    @if($employee_request->request_type->label1)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label1}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value1==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label2)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label2}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value2==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label3)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label3}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value3==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label4)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label4}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value4==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label5)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label5}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value5==1?'SI':'NO'}}</td>
        </tr>
    @endif
    </table>
@endif

@if($employee_request->request_type->name == "DESCANSO ANUAL")
    <h5>Toma solo medio dia</h5>
    <table class="table-info align-top no-padding no-margins border">
    @if($employee_request->request_type->label3)
        <tr>
            <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label3}}</td>
            <td colspan="3" class="text-xs uppercase">{{$employee_request->value3==1?'SI':'NO'}}</td>
        </tr>
    @endif
    @if($employee_request->request_type->label4)
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label4}}</td>
        <td colspan="3" class="text-xs uppercase">{{$employee_request->value4==1?'SI':'NO'}}</td>
    </tr>
    @endif
    </table>
    <h5>III. AUTORIZACION</h5>
    <table class="table-info align-top no-padding no-margins border">
            <tr>
                <td class="text-center bg-grey-darker text-xs text-white ">{{$employee_request->request_type->label2}}</td>
                <td colspan="3" class="text-xs uppercase">{{$employee_request->value2}}</td>
            </tr>
    </table>

@endif

<br>
<br>
<br>
<br>
<table>
    <tr>
        <td class="text-center">______________</td>
        <td class="text-center">______________</td>
    </tr>
    <tr>
        <td class="text-center text-xxs">Firma y Sello SOLICITANTE</td>
        <td class="text-center text-xxs">Firma y Sello AUTORIZACIÓN</td>
    </tr>
</table>
@endsection
