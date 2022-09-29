<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF - Cotización {{$unit1->id}}</title>
    <style>
        body{
            font-family: Arial, sans-serif !important;
        }
        .pb-4 {
            padding-bottom: 1.5rem!important;
        }
        .mx-auto {
            margin-right: auto!important;
            margin-left: auto!important;
        }
        .justify-content-center {
            justify-content: center!important;
        }
        .w-100 {
            width: 100%!important;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col-12 {
            flex: 0 0 auto;
            width: 100%;
        }
        .green-text {
            color: #1E4748;
        }
        .table {
            caption-side: bottom;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 2rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }
        .fs-4 {
            font-size: 24px !important;
        }
        .fs-5 {
            font-size: 18px !important;
        }
        .beige-text {
            color: #aea06c !important;
        }
        table, tbody, thead, tr, td{
            font-family: Arial, sans-serif !important;
        }
    </style>
</head>
<body>

    <div class="row w-100 mx-auto justify-content-center pb-4">
        <div class="col-12">
            <table class="table table-striped green-text">
                <thead class="fs-4">
                    <tr>
                        <td>{{__('Unidad')}} <span class="beige-text">{{$unit1->name}}</span></td>
                    </tr>
                </thead>
    
                <tbody class="fs-5">
                    <tr>
                        <td>{{__('Recámaras')}}</td>
                        <td>{{$unit1->unitType->bedrooms}}</td>
                    </tr>
                    <tr>
                        <td>{{__('Dimensión')}}</td>
                        <td>{{$unit1->meters_total}} m²</td>
                    </tr>
                    <tr>
                        <td>{{__('Terraza')}}</td>
                        <td>{{$unit1->meters_ext}} m²</td>
                    </tr>
                    <tr>
                        <td>{{__('Nivel')}}</td>
                        <td>{{$unit1->floor}}</td>
                    </tr>
                    {{-- <tr>
                        <td>{{__('Fecha de Entrega')}}</td>
                        <td>{{ date_format($unit->tower->deliver_date, 'M Y') }}</td>
                    </tr> --}}
                    <tr>
                        <td>{{__('Primer pago')}} 35%</td>
                        <td>${{ number_format($unit1->price * 0.35, 1) }} MXN</td>
                    </tr>
                    <tr>
                        <td>{{__('Segundo pago')}} 65%</td>
                        <td>${{ number_format($unit1->price * 0.65, 1) }} MXN</td>
                    </tr>
                    <tr class="fw-normal-zen">
                        <td>{{__('Total')}}</td>
                        <td>${{ number_format($unit1->price, 1) }} MXN</td>
                    </tr>
                    <tr class="fw-normal-zen">
                        <td>{{__('Valor a la Entrega')}}</td>
                        <td>${{ number_format($unit1->price * 1.3, 1) }} MXN</td>
                    </tr>
                    <tr class="fw-normal-zen">
                        <td>{{__('Proyección de renta mensual')}}</td>
                        <td>${{ number_format($unit1->unitType->future_rent) }} MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if (isset($unit2))
            <div class="col-12">
                <table class="table table-striped green-text">
                    <thead class="fs-4">
                        <tr>
                            <td class="fw-normal-zen">{{__('Unidad')}} <span class="beige-text">{{$unit2->name}}</span></td>
                        </tr>
                    </thead>
        
                    <tbody class="fs-5">
                        <tr>
                            <td>{{__('Recámaras')}}</td>
                            <td>{{$unit2->unitType->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>{{__('Dimensión')}}</td>
                            <td>{{$unit2->meters_total}} m²</td>
                        </tr>
                        <tr>
                            <td>{{__('Terraza')}}</td>
                            <td>{{$unit2->meters_ext}} m²</td>
                        </tr>
                        <tr>
                            <td>{{__('Nivel')}}</td>
                            <td>{{$unit2->floor}}</td>
                        </tr>
                        {{-- <tr>
                            <td>{{__('Fecha de Entrega')}}</td>
                            <td>{{ date_format($unit->tower->deliver_date, 'M Y') }}</td>
                        </tr> --}}
                        <tr>
                            <td>{{__('Primer pago')}} 35%</td>
                            <td>${{ number_format($unit2->price * 0.35, 1) }} MXN</td>
                        </tr>
                        <tr>
                            <td>{{__('Segundo pago')}} 65%</td>
                            <td>${{ number_format($unit2->price * 0.65, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Total')}}</td>
                            <td>${{ number_format($unit2->price, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Valor a la Entrega')}}</td>
                            <td>${{ number_format($unit2->price * 1.3, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Proyección de renta mensual')}}</td>
                            <td>${{ number_format($unit2->unitType->future_rent) }} MXN</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        
    </div>

    <h4 style="text-align: center;">Fecha de creación: {{date('d-m-Y')}}</h4>
         
</body>
</html>