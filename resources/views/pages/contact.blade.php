@extends('pages.base')

@section('title')
    <title>Laguna Living - {{__('Contacto')}}</title>
    <meta name="description" content="{{__('Contacta con uno de nuestros agentes de ventas por medio de nuestro formulario de contacto, télefono, whatsapp o correo electrónico para obtener más información.')}}">
@endsection

@section('content')

<div class="container-fluid px-0">

    <div class="landing-container text-center">
        <img class="landing-img w-100" src="{{asset('assets/img/landing-contact.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">{{__('Contacto')}}</h1>
            <img class="mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
        </div>

        <div class="d-flex justify-content-center w-100 text-center position-absolute bottom-0" id="section03">
            <a href="#arrow-contact" class="mb-5"><span></span></a>
        </div>
    </div>

    <div class="row w-100 mx-auto bg-beige justify-content-evenly py-5" id="arrow-contact">
        <div class="col-12 col-lg-4">
            <h1 class="fs-1 fw-normal-sackers green-text mt-5" >{{__('Contacta un')}} <span class="beige-text">{{__('Agente')}}</span></h1>
            <hr>
            <p class="green-text fw-normal-zen fs-5">{{__('Contáctenos por medio de nuestro formulario de contacto o en nuestro teléfono')}} 
                <a id="phone_contact" href="tel:3222654686" class="link-dark">322 265 4686.</a>
            </p>
            <img class="d-block mb-5" width="20px" src="{{asset('assets/icons/green-leaf.svg')}}" alt="">
            <a class="btn btn-yellow shadow-7 mb-5 mb-lg-0" href="#contact-form">{{__('Ir al Formulario')}}</a>
        </div>
        <div class="col-12 col-lg-4">
            <img class="w-100 rounded-img tall-img" src="{{asset('assets/img/pool-render.jpg')}}" alt="Pool" style="object-position: left;">
        </div>
    </div>

    <span id="contact-form"></span>
    @include('pages.shared.contact')
</div>
    
@endsection