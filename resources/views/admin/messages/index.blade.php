@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center mt-5">

        <div class="col-12 col-md-11 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-envelope-open-text"></i>
                Todos los mensajes recibidos
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped table-bordered" id="messages_table" data-page-length='10'>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Asunto</th>
                        <th>Correo</th>
                        <th>Tipo de contacto</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
    
                    <tbody>
                    
                      @foreach($messages->all() as $message)
                            <tr>
                                <td>{{ $message->name; }}</td>
                                <td>{{ $message->subject; }} </td>
                                <td>{{ $message->email; }}</td>
                                <td>{{ $message->type}}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('show.message', ['id' => $message->id] ) }}" class="btn btn-primary">Ver</a>
                                    {{-- <a href="" class="btn btn-danger ms-1"><i class="fas fa-trash-alt"></i></a> --}}
                                </td>
                            </tr>
                      @endforeach
    
                    </tbody>
                  </table>
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
           columnDefs: [
              { orderable: false, targets: 4 }
            ]
        });
        } );
    </script>
    
@endsection