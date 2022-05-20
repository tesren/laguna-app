@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center mt-5">
        
        @if (session('message'))
            <div class="col-11 fs-5 my-4 text-center" style="color: #198754;">
                <i class="far fa-check-circle"></i>
                {{ session('message'); }}
            </div>
        @endif

        <div class="col-11 col-lg-11 card px-0 shadow-8">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                    <i class="fas fa-hand-holding-usd"></i>
                    Planes de Pago
                </span>
                <a class="btn btn-success" href="{{route('create.payment')}}">Agregar un Plan</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered" id="all_payments_table" data-page-length='10'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Torre</th>
                            <th>Enganche</th>
                            <th>#Mensualidades</th>
                            <th>%Mensualidades</th>
                            <th>A la Entrega</th>
                            <th>Descuento</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
        
                        <tbody>
                        
                            @foreach($plans as $plan)
                                    <tr>
                                        <td>{{$plan->id}}</td>
                                        <td>{{ $plan->name; }}</td>
                                        <td>
                                            @foreach ($plan->towers as $tower)
                                                {{$tower->name;}},
                                            @endforeach
                                        </td>
                                        <td>{{ $plan->down_payment; }}</td>
                                        <td>{{ $plan->months}}</td>
                                        <td>{{ $plan->month_percent}}</td>
                                        <td>{{ $plan->closing_payment}}</td>
                                        <td>{{ $plan->discount}}</td>
                                        <td>
                                            <a href="{{route('edit.payment',['id' => $plan->id])}}" class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                            @endforeach
        
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('javascript')

    <script>
        $(document).ready( function () {
            $('#all_payments_table').DataTable({
                fixedHeader: {
                        header: true,
                        footer:false,
                    },
                    "language": {
                        "emptyTable":     "La tabla está vacía",
                        "info":           "Mostrando de _START_ a _END_ planes de pago, de un total de _TOTAL_",
                        "infoEmpty":      "Tabla vacía",
                        "infoFiltered":   "(filtrado de _MAX_ planes de pago)",
                        "lengthMenu":     "Mostrar _MENU_ planes de pago",
                        "loadingRecords": "Cargando...",
                        "processing":     "Cargando...",
                        "search":         "Buscar:",
                        "zeroRecords":    "No se encontró nada",
                            "paginate": {
                                "first":      "Primera",
                                "last":       "Ultima",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                            }
                        },
                columnDefs: [
                    { orderable: false, targets: 8 }
                ]
            });
        });
    </script>
   
@endsection