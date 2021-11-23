@extends('pages.base')

@section('content')

<div class="container-fluid px-0">

    <div class="landing-container text-center">
        <img class="landing-img w-100" src="{{asset('assets/img/landing-contact.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">Contacto</h1>
            <img width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
        </div>
    </div>

    <div class="row w-100 mx-auto bg-beige justify-content-evenly py-5">
        <div class="col-12 col-lg-4">
            <h1 class="fs-1 fw-normal-sackers green-text mt-5">Contacta un <span class="beige-text">Agente</span></h1>
            <hr>
            <p class="green-text fw-normal-zen fs-5">Contáctenos por medio de nuestro formulario de contacto o en nuestro teléfono 
                <a href="tel:322 265 4686" class="link-dark">322 265 4686.</a>
            </p>
            <img class="d-block mb-5" width="20px" src="{{asset('assets/icons/green-leaf.svg')}}" alt="">
            <a class="btn btn-yellow shadow-7" href="#contact-form">Ir al Formulario</a>
        </div>
        <div class="col-12 col-lg-4">
            <img class="w-100 rounded-img" src="{{asset('assets/img/pool-render.jpg')}}" alt="Pool" style="height: 65vh; object-fit:cover; object-position: left;">
        </div>
    </div>

    <span id="contact-form"></span>
    @include('pages.shared.contact')
</div>
    
@endsection