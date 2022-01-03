@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center my-4 my-md-5">

        <div class="col-11 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-envelope-open-text"></i>
                Todos los mensajes recibidos
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered w-100" id="messages_table" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Agente Asignado</th>
                                <th>Correo</th>
                                <th>Tipo de contacto</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
        
                        <tbody>
                        
                        @foreach($messages->all() as $message)
                                <tr>
                                    <td>{{ $message->name; }}</td>
                                    <td>{{ $message->agent ?? 'Sin Agente'; }} </td>
                                    <td>{{ $message->email; }}</td>

                                    <td>
                                        @if ($message->type == 'General')
                                            {{$message->type}}
                                        @else
                                            {{'Desde Unidad '.$message->type}}
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('show.message', ['id' => $message->id] ) }}" class="btn btn-primary mt-1 mt-lg-0">Ver</a>
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
            $('#messages_table').DataTable({
          fixedHeader: {
                header: true,
                footer:false,
            },
            "language": {
                "emptyTable":     "La tabla está vacía",
                "info":           "Mostrando de _START_ a _END_ mensajes, de un total de _TOTAL_",
                "infoEmpty":      "Tabla vacía",
                "infoFiltered":   "(filtrado de _MAX_ mensajes)",
                "lengthMenu":     "Mostrar _MENU_ mensajes",
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
              { orderable: false, targets: 4 }
            ]
        });
        } );
    </script>
    
@endsection