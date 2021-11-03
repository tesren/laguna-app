@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

    <div class="col">
        
        <div class="row justify-content-center mt-5">

            <div class="col-12 col-md-11 col-lg-10 card px-0 shadow-8">

                <div class="card-header d-flex justify-content-between">
                    <span class="fs-4 d-block" style="align-self: center">
                        <i class="fas fa-envelope-open-text"></i> Mensaje
                    </span>
            
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Borrar
                    </button>
                </div>

                <div class="row card-body fs-5">

                    <div class="col-6">
                        De: 
                        <strong>{{$message->name}}</strong>
                    </div>

                    <div class="col-6">
                        Correo: 
                        <a title="Responder" href="mailto:{{$message->email}}" class="link-dark fw-bold" target="_blank" rel="noopener">{{$message->email}}</a>
                    </div>

                    <div class="col-12 my-3">
                        Asunto:
                        <strong>{{$message->subject}}</strong>
                    </div>

                    @if (!empty($message->phone))
                        <div class="col-6">
                            Teléfono: 
                            <a href="tel:{{$message->phone}}" class="link-dark fw-bold">{{$message->phone}}</a>
                        </div>
                    @endif

                    @if (!empty($message->unit))
                        <div class="col-6">
                            Interesado en la unidad: 
                            <strong>{{$message->unit}}</strong>
                        </div>
                    @endif

                    @if (!empty($message->content))
                        <div class="col-12 mt-4">
                            Mensaje: 
                            <span class="d-block fw-light">{{$message->content}}</span>
                        </div>
                    @endif


                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title fs-4" id="deleteModalLabel">Borrar mensaje definitivamente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body fs-5">
          <span class="d-block">¿Estás seguro que quieres borrar este mensaje?</span>
          <span class="d-block fw-bold">Este cambio es irreversible</span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form action="{{ route('delete.message', $message->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger ms-auto">Borrar</button>
            </form>
        </div>

      </div>
    </div>
  </div>

@endsection