@extends('layouts.print')

@section('content')

<table class="table-info align-top no-padding no-margins border">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white ">Nombre</td>
        <td  class="text-xs uppercase">{{$persona}}</td>
    </tr>

    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Cargo</td>
        <td  class="text-xs uppercase">{{$cargo}}</td>
    </tr>

</table>

<br>
{{-- <h4>Sanciones Economicas</h4> --}}
<table class="table-info align-top no-padding no-margins border">
    <thead>
        <th class="text-center bg-grey-darker text-xs text-white">Fecha</th>
        <th class="text-center bg-grey-darker text-xs text-white">Dia</th>
        <th class="text-center bg-grey-darker text-xs text-white">Entrada</th>
        <th class="text-center bg-grey-darker text-xs text-white">Salida</th>
        <th class="text-center bg-grey-darker text-xs text-white">Entrada</th>
        <th class="text-center bg-grey-darker text-xs text-white">Salida</th>
        <th class="text-center bg-grey-darker text-xs text-white">Atrasos</th>
        <th class="text-center bg-grey-darker text-xs text-white">Horas Trab</th>
        <th class="text-center bg-grey-darker text-xs text-white">Excedente</th>
        <th class="text-center bg-grey-darker text-xs text-white">Conclusion E.</th>
        <th class="text-center bg-grey-darker text-xs text-white">Conclusion S.</th>
    </thead>
    <tbody>
        @foreach ($attendances as $attendance)
            <tr>
                <td class="text-xxs uppercase"> {{$attendance->date}} </td>
                <td class="text-xxs uppercase"> {{ Util::getDayString(Carbon\Carbon::parse($attendance->date)->dayOfWeek)}} </td>
                <td class="text-xxs uppercase"> {{$attendance->entry}} </td>
                <td class="text-xxs uppercase"> {{$attendance->output}} </td>
                <td class="text-xxs uppercase"> {{$attendance->attendance_entry}} </td>
                <td class="text-xxs uppercase"> {{$attendance->attendance_output}} </td>
                <td class="text-xxs uppercase text-center"> {{$attendance->delay}} </td>
                <td class="text-xxs uppercase text-center"> {{$attendance->hours_worked}} </td>
                <td class="text-xxs uppercase text-center"> {{$attendance->surplus}} </td>
                <td class="text-xxs uppercase bg-{{$attendance->state_output}}"> {{$attendance->title_entry}}</td>
                <td class="text-xxs uppercase bg-{{$attendance->state_output}}"> {{$attendance->title_output}}</td>
            </tr>
        @endforeach
    </tbody>
    {{-- <tr>
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
    </tr> --}}


</table>


@endsection
