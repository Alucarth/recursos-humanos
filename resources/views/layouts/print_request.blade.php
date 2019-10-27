<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $title }}</title>
    {{-- <link rel="stylesheet" href="{{ public_path('css/materialicons.css') }}" media="all" /> --}}
    <link rel="stylesheet" href="{{ public_path('css/wkhtml.css') }}" media="all" />
</head>
<body style="border:none">
    <div style=" padding: 35px;">

        <div class="page-break">
        <table class="w-100 ">
            <tr>
                <th class="w-15 text-left no-padding no-margins align-middle" >
                    <img src="{{ public_path('images/logopeqe.png') }}" style=" width: 148px;">
                </th>
                <th class="w-50 align-center text-center">
                    <span class="font-bold text-x uppercase leading-tight " >
                        {{ 'FORMULARIO DE '.$employee_request->request_type->name ?? '' }}
                    </span>
                </th>
                <th class="w-20 no-padding  align-center">

                    <table class="table-code align-top no-padding no-margins">
                        <tbody>
                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Version</td>
                                <td class="text-xs">{{ $employee_request->request_type->version??'' }}</td>
                            </tr>

                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Codigo</td>
                                <td class="text-xs">{!! $employee_request->request_type->code??'' !!}</td>
                            </tr>
                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Numero</td>
                                <td class="text-xs">{!! $employee_request->correlative??'' !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </th>
            </tr>
            @if($employee_request->request_type->name != 'DESCANSO ANUAL')
            <tr class="no-border"><td colspan="3" class="no-border" style="border-bottom: 1px solid #22292f;"></td></tr>
            <tr>
                <td colspan="3" class="font-normal text-center text-xxs uppercase">
                    <span class="font-medium">{{ $employee_request->request_type->description ?? '' }}</span>

                </td>
            </tr>
            @endif
        </table>
        <div class="block">
            @yield('content')
        </div>
        <hr class="w-100">
        <table class="w-100 ">
            <tr>
                <th class="w-15 text-left no-padding no-margins align-middle" >
                    <img src="{{ public_path('images/logopeqe.png') }}" style=" width: 148px;">
                </th>
                <th class="w-50 align-center text-center">
                    <span class="font-bold text-x uppercase leading-tight " >
                        {{ 'FORMULARIO DE '.$employee_request->request_type->name ?? '' }}
                    </span>
                </th>
                <th class="w-20 no-padding  align-center">

                    <table class="table-code align-top no-padding no-margins">
                        <tbody>
                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Version</td>
                                <td class="text-xs">{{ $employee_request->request_type->version??'' }}</td>
                            </tr>

                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Codigo</td>
                                <td class="text-xs">{!! $employee_request->request_type->code??'' !!}</td>
                            </tr>
                            <tr>
                                <td class="text-center bg-grey-darker text-xxs text-white">Numero</td>
                                <td class="text-xs">{!! $employee_request->correlative??'' !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </th>
            </tr>
            @if($employee_request->request_type->name != 'DESCANSO ANUAL')
            <tr class="no-border"><td colspan="3" class="no-border" style="border-bottom: 1px solid #22292f;"></td></tr>
            <tr>
                <td colspan="3" class="font-normal text-center text-xxs uppercase">
                    <span class="font-medium">{{ $employee_request->request_type->description ?? '' }}</span>

                </td>
            </tr>
            @endif
        </table>


        <div class="block">
            @yield('content_copy')
        </div>

        <div class="block">
            @yield('content_footer')
        </div>
        {{-- <footer>
            @yield('footer')
        </footer> --}}
        </div>
    </div>
</body>
</html>
