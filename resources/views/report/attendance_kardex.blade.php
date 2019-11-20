@extends('layouts.print')

@section('content')

<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">Nombre</td>
        <td  class="text-xs uppercase">{{$persona}}</td>
    </tr>
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Gerencia</td>
        <td  class="text-xs uppercase">{{$gerencia}}</td>
    </tr>
    @if($unidad)
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Departamento</td>
        <td  class="text-xs uppercase">{{$unidad}}</td>
    </tr>
    @endif
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Salario Mensual</td>
        <td  class="text-xs uppercase">{{ Util::formatMoney($employee->salary,true)  }}</td>
    </tr>
</table>
<br>

<table class="table-info align-top no-padding no-margins border">
    <tr >
        <td class="text-center bg-grey-darker text-xs text-white">Horas Trabajadas</td>
        <td> {{ Util::timeString($horas_trabajadas) }} </td>
        <td class="text-center bg-grey-darker text-xs text-white">Horas Adicionales</td>
        <td> {{ Util::timeString($horas_adicionales)}} </td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Cantidad de Atrasos</td>
        <td> {{ $cantidad_atrasos}} </td>
        <td class="text-center bg-grey-darker text-xs text-white">Cantidad de Omisiones</td>
        <td> {{ $omisiones}} </td>
    </tr>

</table>
<br>
{{-- <h4>Sanciones Economicas</h4> --}}
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Sancion por atrasos</td>
        <td> {{$sanction_atraso}} dias de Haber </td>
        <td class="text-center bg-grey-darker text-xs text-white">Descuento</td>
        <td> {{Util::formatMoney($sanction_atraso * $discount_day,true)}} </td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Sancion por omision</td>
        <td> {{$sanction_omision}}  dias de Haber </td>
        <td class="text-center bg-grey-darker text-xs text-white">Descuento</td>
        <td> {{Util::formatMoney($sanction_omision * $discount_day,true)}} </td>
    </tr>

    {{-- <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Cantidad de Atrasos</td>
        <td> {{$cantidad_atrasos}} </td>
        <td class="text-center bg-grey-darker text-xs text-white">Horas Trabajadas</td>
        <td>  </td>
        <td class="text-center bg-grey-darker text-xs text-white">Horas Adicionales</td>
        <td>  </td>
    </tr> --}}
</table>

<br>
<table class="table-info align-top no-padding no-margins border">
    <tr >
        <td class="text-center bg-grey-darker text-xs text-white">Liquido Pagable</td>
        <td> {{ Util::formatMoney($employee->salary - ($sanction_atraso * $discount_day) - ($sanction_omision * $discount_day),true)  }} </td>
    </tr>
</table>
@endsection
