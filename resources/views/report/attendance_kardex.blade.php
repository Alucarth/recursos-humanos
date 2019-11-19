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
</table>
<h4>Sanciones</h4>
<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Sancion por atrasos</td>
        <td> {{$sanction_atraso}} </td>
        <td class="text-center bg-grey-darker text-xs text-white">Descuento</td>
        <td> {{Util::formatMoney($sanction_atraso * $discount_day,true)}} </td>
    </tr>
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white">Sancion por omision</td>
        <td> {{$sanction_omision}} </td>
        <td class="text-center bg-grey-darker text-xs text-white">Descuento</td>
        <td> {{Util::formatMoney($sanction_omision * $discount_day,'Bs ')}} </td>
    </tr>
</table>

@endsection
