@extends('admin.base-admin')


@section('content')
@include('admin.shared.sidebar')

<div class="c-main" id="dashboard">

    <div class="d-flex text-center justify-content-center my-4">
        <img src="{{asset('assets/img/logo-laguna-solo.png')}}" alt="Logo" id="dash-logo">
        <h1 class="fs-1 mb-0" style="align-self: center">Dashboard</h1>
    </div>

    <div class="row justify-content-evenly">
        
        {{-- Mensajes Recibidos --}}
        <div class="col-11 col-md-10 col-lg-5 card shadow-7 p-0 bg-blue mb-4 mb-lg-0">
            <strong class="d-block mt-3 mb-2 ms-4">
                <i class="fas fa-envelope-open-text"></i>
                {{ count($messages); }}
            </strong>
            <span class="d-block mb-5 fs-5 ms-4 fw-light">Mensajes Recibidos</span>
            <a class="link-light bg-darkblue text-decoration-none text-center py-1 card-btn" href="{{route('all.messages');}}">Ver Mensajes</a>
        </div>

        {{-- Progreso de la construcción --}}
        <div class="col-11 col-md-10 col-lg-5 card shadow-7 p-0 bg-green" id="card-progress">

            <div class="row">
                
                <div class="col-6">
                    <img id="prog-thumbnail" class="mt-3 ms-1 ms-lg-4" src="{{asset($img->url)}}" alt="Thumbnail progreso">
                </div>
                
                <div class="col-6">
                    <span class="d-block mb-0 mt-1 mt-lg-3 ms-1 ms-lg-4 fs-1 fw-bold">
                        {{$progress->percent}}%
                    </span>
                    <span class="d-block ms-1 ms-lg-4 fs-5 fw-light">Progreso de la construcción</span>
                </div>
    
                @php
                    $date = date_create($lastPost->date);
                @endphp
    
                <div class="col-12 mb-1 mt-2 mt-lg-3 ms-1 ms-lg-4 fs-5 fw-light">
                    Ultima actualización: 
                    <span class="fw-bold">{{date_format($date, 'd/m/Y');}} </span>
                </div>
            </div>
         
            <a class="link-light bg-darkgreen text-decoration-none text-center py-1 card-btn" href="{{route('all.progress');}}">Actualizar Progreso</a>
        </div>
        
    </div>

    <div class="row justify-content-evenly my-4 my-lg-5 units">

        <div class="col-11 col-md-5 col-lg-3 card shadow-7 p-0 mb-4 mb-lg-0">
            <a href="{{route('all.units');}}" class="text-decoration-none link-dark">
                <strong class="d-block mt-3 mb-0 ms-4">
                    {{ $units->where('status', 'Disponible')->count(); }}
                </strong>
                <span class="d-block ms-4 fs-5 fw-light">Unidades Disponibles</span>
            </a>
        </div>

        <div class="col-11 col-md-4 col-lg-3 mx-0 mx-lg-3 card shadow-7 p-0 mb-4 mb-lg-0">
            <a href="{{route('all.units');}}" class="text-decoration-none link-dark">
                <strong class="d-block mt-3 mb-0 ms-4">
                    {{ $units->where('status', 'Apartada')->count(); }}
                </strong>
                <span class="d-block ms-4 fs-5 fw-light">Unidades Apartadas</span>
            </a>
        </div>

        <div class="col-11 col-md-10 col-lg-3 card shadow-7 p-0">
            <a href="{{route('all.units');}}" class="text-decoration-none link-dark">
                <strong class="d-block mt-3 mb-0 ms-4">
                    {{ $units->where('status', 'Vendida')->count(); }}
                </strong>
                <span class="d-block ms-4 fs-5 fw-light">Unidades Vendidas</span>
            </a>
        </div>

    </div>

    <div class="row justify-content-evenly">
        
        {{-- Torres --}}
        <div class="col-11 col-md-10 col-lg-5 card shadow-7 p-0 bg-blue mb-4 mb-lg-0">
            <strong class="d-block mt-3 mb-2 ms-4">
                <i class="far fa-building"></i>
                {{ count($towers); }}
            </strong>
            <span class="d-block mb-5 fs-5 ms-4 fw-light">Torres Registradas</span>

            <a class="link-light bg-darkblue text-decoration-none text-center py-1 card-btn" href="{{route('all.towers');}}">Ver Torres</a>
        </div>

        {{-- Unidades totales --}}
        <div class="col-11 col-md-10 col-lg-5 card shadow-7 p-0 bg-green mb-5 mb-lg-0">
            <strong class="d-block mt-3 mb-2 ms-4">
                <i class="fas fa-home"></i>
                {{ count($units); }}
            </strong>
            <span class="d-block mb-5 fs-5 ms-4 fw-light">Unidades en Total</span>

            <a class="link-light bg-darkgreen text-decoration-none text-center py-1 card-btn" href="{{route('create.unit');}}">Registrar unidad</a>
        </div>
        
    </div>
    
</div>
    
@endsection