<!DOCTYPE html>
<html>

<table>
  <thead class="table_head">
   <tr>
      <td>REFRI{{ $mes }} 2019ACHACACHIxxxxxx0006029102019</td>
   </tr>
  </thead>
  <tbody>
    {{ $tot=0 }}
    {{ $num=0 }}
      @php
        $ross_amount=0;
        $invoices_110=0;
        $hold_time=0;
        $total_net_snack=0;
        $commission_for_deposit=0;
        $product_for_consumption=0;
        $total_snack_to_deposit=0;
      @endphp
    @foreach($refrigerio as $item)
    {{$num=$num+1}}
      <tr>
        <td align="center" style="border: 1px solid #000000;">{{$num}}</td>
        <td align="left" style="border: 1px solid #000000;">{{$item->full_name}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->identity_card}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->account_number}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->days_work_month}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->sunday_holiday}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->low_license}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->faults}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->holidays}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->commissions}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->days_subject_to_payment}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->ross_amount}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->invoices_110}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->hold_time}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->total_net_snack}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->product_for_consumption}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->commission_for_deposit}}</td>
        <td align="center" style="border: 1px solid #000000;">{{$item->total_snack_to_deposit}}</td>
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
  </tbody>
   <tr align="center" BGCOLOR="#f3f0ff">
          <td colspan="11" align="center" style="background-color: #808080; border: 1px solid #000000;"><strong>TOTALES</strong></td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $ross_amount }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $invoices_110 }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $hold_time }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $total_net_snack }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $product_for_consumption }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $commission_for_deposit }}</td>
          <td align="center" style="background-color: #808080; border: 2px solid #000000;">{{ $total_snack_to_deposit }}</td>

    </tr>
</table>
</html>
