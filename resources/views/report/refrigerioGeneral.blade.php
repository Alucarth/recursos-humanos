@extends('layouts.print_refresh')
@section('content')
	<table class="table-info w-100">
    <thead class="bg-grey-darker">
        <tr class="font-medium text-white text-sm">
            <td class="px-15 py text-center text-xxs ">
                Nro.
            </td>
             <td class="px-15 py text-center text-xxs ">
                Fecha
            </td>
            <td class="px-15 py text-center  text-xxs">
                Nombre Complero
            </td>
            <td class="px-15 py text-center text-xxs">
                CI
            </td>
            <td class="px-15 py text-center text-xxs">
                Numero de cuenta
            </td>
            <td class="px-15 py text-center text-xxs">
                Dias trabajo mes
            </td>
            <td class="px-15 py text-center text-xxs">
                Domingo Feriado
            </td>
            <td class="px-15 py text-center text-xxs">
                Lice. Bajas Medi
            </td>
            <td class="px-15 py text-center text-xxs">
                Faltas
            </td>
            <td class="px-15 py text-center text-xxs">
                Vacaciones
            </td>
            <td class="px-15 py text-center text-xxs">
                Comisiones
            </td>
            <td class="px-15 py text-center text-xxs">
                Dias Sujeros a Pago
            </td>
            <td class="px-15 py text-center text-xxs">
                Monto Bruto dias*18
            </td>
            <td class="px-15 py text-center text-xxs">
                Facturas Form. 110
            </td>
            <td class="px-15 py text-center text-xxs">
                Reten Impo
            </td>
            <td class="px-15 py text-center text-xxs">
                Total Refrigerio Neto
            </td>
            <td class="px-15 py text-center text-xxs">
                Consumo por producto
            </td>
            <td class="px-15 py text-center text-xxs">
                Comision por Deposito
            </td>
            <td class="px-15 py text-center text-xxs">
                Total Refrigerio a depositar
            </td>
        </tr>
    </thead>
    <tbody>
  @php
  	$ross_amount=0;
  	$invoices_110=0;
  	$hold_time=0;
  	$total_net_snack=0;
  	$commission_for_deposit=0;
    $product_for_consumption=0;
  	$total_snack_to_deposit=0;
  @endphp
  @foreach ($refrigerio as $item)
        <tr class="text-sm">
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $count++ }}</td>
            <td class="text-center text-xxs uppercase font-bold px-6 py-3">{{ $item->date }}</td>
            <td class="text-center text-xxs uppercase font-bold px-7 py-3">{{ $item->full_name }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->identity_card }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->account_number }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->days_work_month }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->sunday_holiday }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->low_license }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->faults }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->holidays }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->commissions }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->days_subject_to_payment }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->ross_amount }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->invoices_110 }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->hold_time }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->total_net_snack }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->product_for_consumption }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->commission_for_deposit }}</td>
            <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->total_snack_to_deposit }}</td>
        </tr>
        @php
            $ross_amount += $item->ross_amount;
            $invoices_110 += $item->invoices_110;
            $hold_time += $item->hold_time;
            $total_net_snack += $item->total_net_snack;
            $product_for_consumption += $item->product_for_consumption;
            $commission_for_deposit += $item->commission_for_deposit;
            $total_snack_to_deposit += $item->total_snack_to_deposit;

        @endphp
    @endforeach
    <tr class="text-sm">
        <td class="text-center text-xxs uppercase font-bold px-15 py-3 bg-grey-darker text-white" colspan="12">TOTALES</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ number_format($ross_amount,2)}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ number_format($invoices_110,2)}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ $hold_time}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ $total_net_snack}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ number_format($product_for_consumption,2)}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ $commission_for_deposit}}</td>
        <td class="text-center text-xxs uppercase font-bold px-5 py-3" >{{ number_format($total_snack_to_deposit,2)}}</td>
    </tr>

    </tbody>
</table>
@endsection