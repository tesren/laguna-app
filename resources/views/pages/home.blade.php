@extends('pages.base')

@section('content')

<div class="container-fluid p-0" style="position:relative">

    <div id="video-container">
        <video autoplay muted loop id="video-home">
            <source src="{{asset('/assets/videos/video-ligero.m4v');}}" type="video/mp4">
        </video>

        <div class="overlay"></div>

        <div id="landing" class="text-center" style="color: white;">
            <h1 class="d-none">Laguna Living</h1>
            <h2 class="fw-normal-sackers fs-1">Diseñado para un</h2>

            <div class="d-flex justify-content-center">
                <img width="45px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                <h2 class="mx-4 fw-normal-sackers fs-1">Estilo de vida Saludable</h2>
                <img width="45px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            </div>

            <div class="row justify-content-center text-center w-100 mt-6">
                <div class="col-3">
                    <img class="mt-2 mb-3" src="{{asset('/assets/icons/graphic.svg');}}" alt="">
                    <h3 class="fw-light-zen fs-4">Gran Retorno de Inversion</h3>
                </div>
                <div class="col-3">
                    <span class="fs-1 fw-bold-zen">{{count($units);}}</span>
                    <h3 class="fw-light-zen fs-4">Avaliable Units</h3>
                </div>
                <div class="col-3">
                    <img class="mt-2 mb-3" src="{{asset('/assets/icons/leaf.svg');}}" alt="">
                    <h3 class="fw-light-zen fs-4">Desarrollo Verde</h3>
                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid px-0 py-5 bg-beige" id="info-section">
        <div class="row w-100">

            <div class="col-4"></div>

            <div class="col-4">
                <h3 class="text-center text-uppercase mb-0">Conéctate con la naturaleza por medio de nuestro 
                    <span>diseño ecológico</span>
                </h3>
            </div>

            <div class="col-4"></div>

        </div>
        
    </div>

    @include('pages.shared.contact')
</div>
    
@endsection