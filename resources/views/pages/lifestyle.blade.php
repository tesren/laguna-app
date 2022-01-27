@extends('pages.base')

@if (app()->getLocale() == 'en')
    @section('title', 'Laguna Living - Lifestyle')
@else
    @section('title', 'Laguna Living - Estilo de Vida')
@endif

@section('content')

<div class="container-fluid px-0 bg-beige">

    <div class="landing-container text-center mb-6">
        <img class="landing-img w-100" src="{{asset('assets/img/lifestyle-landing-new.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">{{__('Estilo de Vida')}}</h1>
            <img class="mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
        </div>

        <div class="d-flex justify-content-center w-100 text-center position-absolute bottom-0" id="section03">
            <a href="#arrow-lifestyle" class="mb-5"><span></span></a>
        </div>

    </div>

    <h2 class="green-text fw-normal-sackers text-center mb-6" id="arrow-lifestyle">{{__('Olvida el tráfico')}}, <br><span class="beige-text">{{__('todo está cerca en Nuevo Vallarta')}}</span></h2>

    <div class="row mx-auto w-100 mb-6">

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <picture>
                <source srcset="{{asset('assets/img/beach.webp');}}" type="image/webp" />
               
                <img src="{{asset('assets/img/beach.jpg');}}" class="tall-img w-100" alt="Beach" loading="lazy">
            </picture>
            
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">{{__('Playa')}}</h3>
                <hr>
                <p class="fw-normal-zen fs-5">5 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('assets/img/restaurants.jpg')}}" alt="Restaurants" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">{{__('Restaurantes')}}</h3>
                <hr>
                <p class="fw-normal-zen fs-5">2 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('assets/img/golf-2.jpg')}}" alt="Golf" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">{{__('Campo de Golf')}}</h3>
                <hr>
                <p class="fw-normal-zen fs-5">3 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 pe-0 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('/assets/img/hospital.jpg');}}" alt="Hospital" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">Hospital</h3>
                <hr>
                <p class="fw-normal-zen fs-5">5 min.</p>
            </div>
        </div>

    </div>

    <h2 class="green-text fw-normal-sackers text-center mt-6 mb-5">{{__('Estilo de Vida en')}} <span class="beige-text">Laguna Living</span></h2>

    <div class="row justify-content-center mx-auto w-100 mb-6">
        <div class="col-11 col-lg-8 text-center container-darkbeige p-2 position-relative">

            <img class="w-100 rounded-img" src="{{ 'https://i.ytimg.com/vi/YgJVaR9FRNU/maxresdefault.jpg'}}" alt="Video Laguna Living"> 

            <a class="btn-youtube link-light text-decoration-none" data-fancybox="video" href="https://youtu.be/YgJVaR9FRNU">
                <i class="fab fa-6x fa-youtube"></i>
                <h3 class="fw-normal-sackers fs-2" style="text-shadow: 1px 1px black;">{{__('Ver Video')}}</h3>
            </a>

            <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; left:-140px; top:60%; width:140px;">
        </div>
    </div>

    <h3 class="green-text fs-1 fw-normal-sackers text-center mb-5">{{__('¿Qué caracteriza a')}} <br><span class="beige-text">Nuevo Vallarta?</span></h3>
    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative;">

        <div class="col-11 col-lg-4">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/fresh-air.jpg')}}" alt="Beach">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Playa')}} <span class="beige-text">{{__('Cerca de ti')}}</span></h4>
            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('Nuevo Vallarta se vive intensamente en sus playas doradas, mar turquesa y fina arena, donde podrás disfrutar de diversas actividades en un inmejorable clima.')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">

    </div>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-4 green-text align-self-center order-1 order-lg-12">
            @if (app()->getLocale() == 'en')
                <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Navigation <span class="beige-text">Channel</span></h4>
            @else
                <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Canal de <span class="beige-text">Navegación</span></h4>
            @endif

            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('En el área de Nuevo Vallarta, se extienden diversos manglares y más de una decena de canales navegables, lo que permite apreciar de cerca las bellezas naturales de la zona.')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <div class="col-11 col-lg-4 order-12 order-lg-1">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/canal.jpg')}}" alt="Canal">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:60%; width:140px;">
    </div>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-4">
            <picture>
                <source srcset="{{asset('assets/img/golf.webp');}}" type="image/webp" />
               
                <img src="{{asset('assets/img/golf.jpg');}}" class="w-100 tall-img rounded-img" alt="Golf field" loading="lazy">
            </picture>
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">

            @if (app()->getLocale() == 'en')
                <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Golf <span class="beige-text">Fields</span></h4>
            @else
                <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Campos de <span class="beige-text">Golf</span></h4>
            @endif
            
            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('Impecables y rodeados de hermosos paisajes naturales, los campos de golf son otros de los grandes atractivos de Nuevo Vallarta.')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>

    <h4 class="green-text fw-normal-sackers fs-1 text-center mb-5">{{__('Conecta con la')}} <span class="beige-text">{{__('Naturaleza')}}</span></h4>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-3">
            <picture>
                <source srcset="{{asset('assets/img/mountains.webp');}}" type="image/webp" />
               
                <img src="{{asset('assets/img/mountains.jpg');}}" class="w-100 tall-img rounded-img" alt="Mountains" loading="lazy">
            </picture> 
            
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Montañas')}}</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('Nuevo Vallarta ofrece intensos cielos azules, montañas color esmeralda con abundante vegetación visibles desde cualquier punto y un sinfín de vistas inolvidables.')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>
        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-4 green-text align-self-center order-1 order-lg-12">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0 text-center text-lg-end">{{__('Playa')}}</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('Disfrute de caminatas por la playa mientras contempla un maravilloso atardecer y el intenso brillo de las estrellas, el broche de oro de un día de sol, arena, olas y ¡mucha diversión!')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <div class="col-11 col-lg-3 order-12 order-lg-1">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/sunset.jpg')}}" alt="Golf field">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:60%; width:140px;">

    </div>

    <div class="row justify-content-evenly mx-auto w-100 pb-5" style="position: relative">

        <div class="col-11 col-lg-3">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/laguna-1.jpg')}}" alt="Golf field">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Laguna')}}</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">
                {{__('A un costado de Laguna living se encuentra la laguna de Jarretaderas, en la cual podrás disfrutar de mariscos frescos y música relajante en cualquiera de sus restaurantes.')}}
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>



</div>
    
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endsection