@extends('admin.base-admin')


@section('content')
@include('admin.shared.sidebar')

<div class="col" id="dashboard">

    <div class="d-flex text-center justify-content-center my-4">
        <img src="{{asset('assets/img/logo-laguna-solo.png')}}" alt="Logo" style="width:80px;">
        <h1 class="fs-1" style="align-self: center">Dashboard</h1>
    </div>

    <div class="row justify-content-evenly">
        
        <div class="col-12 col-lg-5 card shadow-7 p-0 bg-blue">
            <strong class="d-block mt-3 mb-2 ms-4">
                <i class="fas fa-envelope-open-text"></i>
                {{ count($messages); }}
            </strong>
            <span class="d-block mb-5 fs-5 ms-4">Mensajes Recibidos</span>
            <a class="link-light bg-darkblue text-decoration-none text-center py-1" href="">Ver Mensajes</a>
        </div>

        <div class="col-12 col-lg-5 card shadow-7 p-0 bg-green">

            <img src="" alt="Thumbnail progreso">

            <span class="d-block mt-3 mb-2 ms-4 fs-1 fw-bold">
                % <br>
            </span>

            <span class="d-block ms-4">Progreso de la construccón</span>

            <span class="d-block my-2 ms-4">Ultima actualización: </span>
            <a class="link-light bg-darkgreen text-decoration-none text-center py-1" href="">Actualizar Progreso</a>
        </div>
        
    </div>
    
</div>
    
@endsection