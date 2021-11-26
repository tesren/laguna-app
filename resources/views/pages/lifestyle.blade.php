@extends('pages.base')

@section('content')

<div class="container-fluid px-0 bg-beige">

    <div class="landing-container text-center mb-6">
        <img class="landing-img w-100" src="{{asset('assets/img/nuevo-vallarta.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">Estilo de Vida</h1>
            <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">

            <a class="btn btn-arrow mt-5" href="#arrow-lifestyle"><i class="fas fa-chevron-down"></i></a>
        </div>

    </div>

    <h2 class="green-text fw-normal-sackers text-center mb-6" id="arrow-lifestyle">Olvida el tráfico, <br><span class="beige-text">todo esta cerca en Nuevo Vallarta</span></h2>

    <div class="row mx-auto w-100 mb-6">

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('assets/img/beach.jpg')}}" alt="Beach" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">Playa</h3>
                <hr>
                <p class="fw-normal-zen fs-5">A 5 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('assets/img/restaurants.jpg')}}" alt="Restaurants" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">Restaurantes</h3>
                <hr>
                <p class="fw-normal-zen fs-5">A 2 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{asset('assets/img/golf-2.jpg')}}" alt="Golf" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">Campo de Golf</h3>
                <hr>
                <p class="fw-normal-zen fs-5">A 3 min.</p>
            </div>
        </div>

        <div class="col-12 col-lg-3 pe-0 px-0" style="position: relative">
            <img class="tall-img w-100" src="{{'assets/img/hospital.jpg'}}" alt="Hospital" loading="lazy">
            <div class="gradient-overlay"></div>
            <div class="info-life">
                <h3 class="fw-normal-sackers fs-2">Hospital</h3>
                <hr>
                <p class="fw-normal-zen fs-5">A 5 min.</p>
            </div>
        </div>

    </div>

    <h3 class="green-text fs-1 fw-normal-sackers text-center mb-5">¿Qué caracteriza a <br><span class="beige-text">Nuevo Vallarta?</span></h3>
    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative;">

        <div class="col-11 col-lg-4">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/fresh-air.jpg')}}" alt="Beach">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Playa <span class="beige-text">Cerca de ti</span></h4>
            <p class="fw-normal-zen fs-5 mb-4 text-start">Nuevo Vallarta se vive intensamente en sus playas doradas, mar turquesa y fina arena, donde 
                podrás disfrutar de diversas actividades en un inmejorable clima.
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">

    </div>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-4 green-text align-self-center order-1 order-lg-12">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Canal de <span class="beige-text">Navegación</span></h4>
            <p class="fw-normal-zen fs-5 mb-4 text-start">En el área de Nuevo Vallarta, se extienden diversos manglares y más de una decena de canales navegables, 
                lo que permite apreciar de cerca las bellezas naturales de la zona.
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
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/golf.jpg')}}" alt="Golf field">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Campos de <span class="beige-text">Golf</span></h4>
            <p class="fw-normal-zen fs-5 mb-4 text-start">Impecables y rodeados de hermosos paisajes naturales, 
                los campos de golf son otros de los grandes atractivos de Nuevo Vallarta.
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>

    <h4 class="green-text fw-normal-sackers fs-1 text-center mb-5">Conecta con la <span class="beige-text">Naturaleza</span></h4>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-3">
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/mountains.jpg')}}" alt="Golf field">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Montañas</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">Nuevo Vallarta ofrece intensos cielos azules, montañas color esmeralda con 
                abundante vegetación visibles desde cualquier punto y un sinfín de vistas inolvidables.
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>
        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>

    <div class="row justify-content-evenly mx-auto w-100 mb-6" style="position: relative">

        <div class="col-11 col-lg-4 green-text align-self-center order-1 order-lg-12">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0 text-center text-lg-end">Playa</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">Disfrute de caminatas por la playa mientras contempla un maravilloso atardecer y el intenso brillo de las estrellas, el broche de oro de un día de sol, arena, olas y ¡mucha diversión!
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
            <img class="w-100 tall-img rounded-img" src="{{asset('assets/img/laguna.jpg')}}" alt="Golf field">
        </div>

        <div class="col-11 col-lg-4 green-text align-self-center">
            <h4 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">Laguna</h4>
            <hr>
            <p class="fw-normal-zen fs-5 mb-4 text-start">A un costado de Laguna living se encuentra la laguna de Jarretaderas, 
                en la cual podras disfrutar de mariscos frescos y música relajante en cualquiera de sus restaurantes.
            </p>
            <img class="mt-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>

        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:60%; width:140px;">
    </div>



</div>
    
@endsection