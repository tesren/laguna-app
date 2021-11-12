@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">
    <div class="row justify-content-center mt-5">

        <div class="col-11 col-md-11 card px-0 shadow-8">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                  <i class="fas fa-home"></i>
                  Prototipos
                </span>
                <a class="btn btn-success" href="{{route('create.type');}}">Registrar Prototipo</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered" id="all_types_table" data-page-length='10'>
                        <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>BR</th>
                            <th>BA</th>
                            <th>m² Total</th>
                            <th>m² Interior</th>
                            <th>m² Exterior</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
        
                        <tbody>
                        
                        @foreach($unitTypes->all() as $type)
                                <tr>
                                    <td>{{ $type->name; }}</td>
                                    <td>{{ $type->bedrooms; }}</td>
                                    <td>{{ $type->bathrooms; }}</td>
                                    <td>{{$type->meters_total}} m²</td>
                                    <td>{{$type->meters_int}} m²</td>
                                    <td>{{$type->meters_ext}} m²</td>
                                    <td class="d-flex justify-content-evenly">
                                        <a href="{{route('edit.prototypes', ['id' => $type->id])}}" class="btn btn-primary">Editar</a>
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
            $('#all_types_table').DataTable({
                fixedHeader: {
                        header: true,
                        footer:false,
                    },
                    "language": {
                        "emptyTable":     "La tabla está vacía",
                        "info":           "Mostrando de _START_ a _END_ prototipos, de un total de _TOTAL_",
                        "infoEmpty":      "Tabla vacía",
                        "infoFiltered":   "(filtrado de _MAX_ prototipos)",
                        "lengthMenu":     "Mostrar _MENU_ prototipos",
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
                    { orderable: false, targets: 6 }
                ]
            });
        });
    </script>
   
@endsection