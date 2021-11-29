@extends('pages.base')

@section('content')

<div class="container-fluid p-0 bg-beige" style="position:relative">

    <div id="video-container">
        <video autoplay muted loop id="video-home">
            <source src="{{asset('/assets/videos/new-video.m4v');}}" type="video/mp4">
        </video>

        <div class="overlay"></div>

        <div id="landing" class="text-center" style="color: white;">
            <h1 class="d-none">Laguna Living</h1>
            <h2 class="fw-normal-sackers fs-1">{{__('Diseñado para un')}}</h2>

            <div class="d-flex justify-content-center">
                <img class="d-none d-lg-block" width="45px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                <h2 class="mx-4 fw-normal-sackers fs-1">{{__('Estilo de Vida Saludable')}}</h2>
                <img class="d-none d-lg-block" width="45px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            </div>

            <div class="row mx-auto justify-content-center text-center w-100 mt-6">
                <div class="col-11 col-lg-3 mb-4 mb-lg-0">
                    <img class="mt-2 mb-3" src="{{asset('/assets/icons/graphic.svg');}}" alt="">
                    <h3 class="fw-light-zen fs-4">{{__('Gran Retorno de Inversión')}}</h3>
                </div>
                <div class="col-11 col-lg-3 mb-4 mb-lg-0">
                    <span class="fs-1 mb-1 d-block fw-bold-zen">243</span>
                    <h3 class="fw-light-zen fs-4">{{__('Unidades en Venta')}}</h3>
                </div>
                <div class="col-11 col-lg-3">
                    <i class="fas fa-dollar-sign mt-2 mb-4 fs-1"></i>
                    <h3 class="fw-light-zen fs-4">{{__('Desde')}}: 2,450,000 MXN</h3>
                </div>
            </div>
            <a class="btn btn-arrow mt-5" href="#info-section"><i class="fas fa-chevron-down"></i></a>
        </div>

    </div>

    <div class="container-fluid px-0 py-5" id="info-section" style="position: relative;">
        <div class="row w-100 justify-content-center my-6 mx-auto">

            <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:75px; width:140px;">

            <div class="col-11 col-lg-6">
                <h3 class="text-center text-uppercase mb-0 fw-normal-sackers green-text">{{__('Conéctate con la naturaleza por medio de nuestro')}} 
                    <span class="beige-text">{{__('diseño ecológico')}}</span>
                </h3>
            </div>
            
            <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:75px; width:140px;">
            
        </div>

        <div class="row mx-auto justify-content-center w-100">
            <div class="col-12 col-lg-5">
                <img class="w-100 rounded-img" src="{{asset('/assets/img/render-parking.jpg')}}" alt="Render Parking Lot">
            </div>

            <div class="col-12 col-lg-3">
                <p class="green-text fw-normal-zen"> <span class="fw-bold-zen">{{__('Ubicado en el destino residencial-turístico de Nuevo Vallarta.')}}</span>
                    <br> <br>
                    {{__('Laguna Living es el lugar perfecto para vivir la experiencia de conectar con la naturaleza y disfrutar lo mejor que la Riviera Nayarit tiene para ofrecer, como tiendas boutique, restaurantes gourmet y centros comerciales donde podrás disfrutar de un estilo de vida moderno y tranquilo al nivel del mar.')}}
                </p>
                <div class="container-fluid text-center text-lg-start">
                    <a class="btn btn-yellow shadow-7 mt-4" href="{{route('view.towers')}}">{{__('Ver Inventario')}}</a>
                </div>
            </div>
        </div>
        
    </div>

    {{-- Tabs de amenidades --}}
    <h3 class="fw-normal-sackers mt-6 mb-4 text-center green-text">{{__('Amenidades')}}</h3>

    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active link-laguna" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">{{__('Edificio')}}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link link-laguna" id="pills-avaliable-tab" data-bs-toggle="pill" data-bs-target="#pills-avaliable" type="button" role="tab" aria-controls="pills-avaliable" aria-selected="false">{{__('Deportes')}}</button>
        </li>
    </ul>

    <div class="row mx-auto justify-content-center w-100 mb-6">
        <div class="col-11 col-lg-9 p-2 container-darkbeige" style="position:relative;">
            
            <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:10%; left:-100px;" loading="lazy">

            <div class="tab-content" id="pills-tabContent">

                {{-- Edificio --}}
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row w-100 justify-content-center mx-auto">
                        <div class="col-12 container-darkbeige py-4">
                            <div class="row w-100 text-center green-text mx-auto">
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="66px" src="{{asset('assets/icons/pool.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Albercas')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="45px" src="{{asset('assets/icons/bbq-area.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Área BBQ')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="60px" src="{{asset('assets/icons/kids-area.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Área para Niños')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="60px" src="{{asset('assets/icons/shopping.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Área Comercial')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2">
                                    <img width="63px" src="{{asset('assets/icons/pets-area.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Área para Mascotas')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2">
                                    <img width="60px" src="{{asset('assets/icons/24-security.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Seguridad 24/7')}}</span>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>

                {{-- Deportes --}}
                
                <div class="tab-pane fade" id="pills-avaliable" role="tabpanel" aria-labelledby="pills-avaliable-tab">
                    <div class="row w-100 justify-content-center mx-auto">
                        <div class="col-12 container-darkbeige py-4">
                            <div class="row justify-content-evenly w-100 text-center green-text mx-auto">
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="76px" src="{{asset('assets/icons/gym.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Gimnasio')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="64px" src="{{asset('assets/icons/running.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">Jogging</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="60px" src="{{asset('assets/icons/futbol.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">{{__('Fútbol')}}</span>
                                </div>
        
                                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                                    <img width="46px" src="{{asset('assets/icons/pickle.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">Pickleball</span>
                                </div>
        
                                <div class="col-6 col-lg-2">
                                    <img width="60px" src="{{asset('assets/icons/tennis.svg')}}" alt="">
                                    <span class="fw-bold-zen d-block mt-2 fs-5">Tennis</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="row w-100 justify-content-center mb-6 mx-auto" style="position: relative;">
        <div class="col-11 col-lg-4 align-self-center" >
            <h4 class="fs-2 fw-normal-sackers green-text">{{__('Un lugar para')}} <br><span class="beige-text">{{__('Redescubrirse')}}</span></h4>
            <p class="fs-6 fw-normal-zen green-text">{{__('Vive y disfruta de un ambiente con espacios pensados para diferentes estilos de vida, creando un entorno donde la tranquilidad convivencia, y comodidad se mezclan para crear una comunidad en armonía para ti.')}}
            </p>
            <img width="25px" class="mb-4 mb-lg-0" src="{{asset('assets/icons/laguna-icono-verde.svg')}}" alt="" loading="lazy">
            <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:65%;">
        </div>

        <div class="col-11 col-lg-4">
            <img class="w-100 rounded-img tall-img" src="{{asset('assets/img/relaxing.jpg')}}" alt="Healthy market" loading="lazy">
        </div>
    </div>

    <div class="row w-100 justify-content-evenly mb-6 mx-auto" style="position: relative;">
        <div class="col-11 col-lg-4 order-1 order-lg-12">
            <img class="w-100 rounded-img tall-img" src="{{asset('assets/img/inventory-landing.jpg')}}" alt="Healthy market" loading="lazy">
        </div>

        <div class="col-11 col-lg-4 align-self-center order-12 order-lg-1">
            <h4 class="fs-2 fw-normal-sackers green-text">{{__('Nos importa')}} <br><span class="beige-text">{{__('tu seguridad')}}</span></h4>
            <p class="fs-6 fw-normal-zen green-text">{{__('Contamos con acceso controlado y seguridad 24/7 para que disfrutes de las instalaciones sin ninguna preocupación.')}}</p>
            <img class="mb-4 mb-lg-0" width="25px" src="{{asset('assets/icons/laguna-icono-verde.svg')}}" alt="" loading="lazy">
            <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:65%;">
        </div>
        
    </div>

    {{-- Carrusel de Modelos --}}
    <h3 class="green-text fw-normal-sackers fs-2 mb-5 text-center">{{__('Modelos Disponibles')}}</h3>

    <div id="carouselUnitTypes" class="carousel slide carousel-dark" data-bs-ride="carousel">

        <div class="carousel-inner">
        
            @php $j=0; @endphp
            @foreach ($unitTypes as $type)

                @php
                    $largeImg = $unitTypeImgs->where('size','large')->where('unit_type_id',$type->id)->first();
                    //hace el calculo solo con unidades disponibles
                    $lowestPrice = $units->where('type_id',$type->id)->min('price');
                @endphp

                <div class="carousel-item @if($j==0) active @endif text-center">
                    <div class="container-darkbeige mx-auto" style="width: fit-content">
                        <img src="{{asset($largeImg['url']);}}" class="d-block tall-img" alt="..." style="max-height: 60vh;">
                    </div>

                    <h5 class="fw-normal-sackers fs-3 mt-3 mt-lg-5 mb-4 green-text">{{$type->name}}</h5>

                    <div class="row justify-content-center green-text">
                        <div class="col-6 col-lg-2">
                            {{__('Recámaras')}}:
                            <div class="fw-bold-zen fs-4">{{$type->bedrooms}}</div>
                        </div>
                        <div class="col-6 col-lg-2">
                            {{__('Baños')}}:
                            <div class="fw-bold-zen fs-4">{{$type->bathrooms}}</div>
                        </div>
                        <div class="col-12 col-lg-2 mt-3 mt-lg-0">
                            {{__('Precios desde')}}:
                            <div class="fw-bold-zen fs-4">
                                @if ($lowestPrice==null)
                                    {{__('No hay disponibles')}}
                                @else
                                    ${{number_format($lowestPrice)}} MXN
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
                @php $j++;  @endphp
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselUnitTypes" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselUnitTypes" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="w-100 text-center mb-6">
        <a href="{{route('view.towers')}}" class="btn btn-yellow shadow-7 my-5">{{__('Ver Unidades Disponibles')}}</a>
    </div>
    

    {{-- Ubicaciones --}}
    <div class="container-fluid px-0" style="position: relative;">
        <picture>
            <source type="image/jpg" media="all and (max-width:768px)" srcset="{{asset('assets/img/location-mobile.jpg');}}">

            <source type="image/jpg" media="all and (min-width:769px)" srcset="{{asset('assets/img/location-desktop.jpg');}}">

            <img class="w-100" src="{{asset('assets/img/location-desktop.jpg');}}" alt="Laguna Living location" loading="lazy">
        </picture>

        <div class="overlay-green"></div>
    </div>
    
    <div class="container-fluid bg-darkgreen px-0 pt-4 mb-6" style="color: #fff">

        <div class="row mx-auto w-100 justify-content-evenly">

            <div class="col-12 col-lg-5">
                <h3 class="fs-2 fw-normal-sackers mb-5 text-center text-lg-start">{{__('Ubicación')}}</h3>
                <div class="row w-100 mx-auto">
                    <div class="col-12 col-lg-6">
                        <ul class="list-unstyled fw-normal-zen fs-5 mb-4 mb-lg-5">
                            <li class="mb-4">
                                <img width="34px" src="{{asset('assets/icons/mall-yellow.svg');}}" alt="">
                                <span class="ms-2">{{__('Centro comercial a 10 min.')}}</span>
                            </li>
                            <li class="mb-4">
                                <img width="30px" src="{{asset('assets/icons/restaurant.svg');}}" alt="">
                                <span class="ms-3">{{__('Restaurantes a 3 min.')}}</span>
                            </li>
                            <li class="mb-4">
                                <img width="35px" src="{{asset('assets/icons/hospital.svg');}}" alt="">
                                <span class="ms-2">{{__('Hospital a 5 min.')}}</span>
                            </li>                            
                        </ul>
                        <a class="btn btn-yellow w-75 shadow-7 mb-6 d-none d-lg-block" href="https://goo.gl/maps/bdkmAGYNxwHciZ8c6" target="_blank" rel="noopener">{{__('Como llegar')}}</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <ul class="list-unstyled fw-normal-zen fs-5 mb-5 mb-lg-4">
                            <li class="mb-4">
                                <img width="34px" src="{{asset('assets/icons/golf-course.svg');}}" alt="">
                                <span class="ms-2">{{__('Golf a 2 min.')}}</span>
                            </li>
                            <li class="mb-4">
                                <img width="30px" src="{{asset('assets/icons/beach.svg');}}" alt="">
                                <span class="ms-3">{{__('Playa a 5 min.')}}</span>
                            </li>
                            <li class="mb-4">
                                <img width="35px" src="{{asset('assets/icons/graph-yellow.svg');}}" alt="">
                                <span class="ms-2">{{__('Alta plusvalía')}}</span>
                            </li>
                        </ul>
                    </div>
                    <a class="btn btn-yellow w-100 shadow-7 mb-5 d-block d-lg-none" href="https://goo.gl/maps/bdkmAGYNxwHciZ8c6" target="_blank" rel="noopener">{{__('Como llegar')}}</a>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <h3 class="fs-2 fw-normal-sackers mb-5 text-center text-lg-start">{{__('Encuentra todo')}} <span style="color: #ECD259;">{{__('Cerca')}}</span></h3>
                <p class="fw-normal-zen fs-5 mb-5">{{__('Ubicado en una de las zonas más lujosas de Bahía de Banderas, Nuevo Vallarta.')}}</p>
                <ul class="list-unstyled fw-normal-zen fs-5">
                    <li class="mb-3">
                        <i class="fas fa-check-square" style="color: #ECD259;"></i>
                        <span class="ms-2">{{__('Aeropuerto a 20 min.')}}</span>
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-check-square" style="color: #ECD259;"></i>
                        <span class="ms-2">{{__('Clima tropical los 365 días del año.')}}</span>                   
                    </li>
                    <li class="mb-5 mb-lg-3">
                        <i class="fas fa-check-square" style="color: #ECD259;"></i>
                        <span class="ms-2">{{__('Caminar y andar en bicicleta como modos de transporte')}}</span>
                    </li>

                </ul>
            </div>

        </div>

    </div>


    <h4 class="fw-normal-sackers green-text fs-2 mb-6 text-center">{{__('Descubre un Nuevo')}}<span class="beige-text"><br> {{__('Estilo de Vida')}}</span></h4>

    <div id="carouselExampleControls" class="carousel slide carousel-dark mb-5" data-bs-ride="carousel" style="position: relative" data-bs-interval="false">

        <div class="carousel-inner">

            <div class="carousel-item active">
                        <div class="row justify-content-center mx-auto">
            
                            <div class="col-11 col-lg-8 container-darkbeige py-4 py-lg-5">
                                <div class="row justify-content-evenly mx-auto w-100">
                                    <div class="col-12 col-lg-4">
                                        <img src="{{asset('assets/img/beach.jpg');}}" class="d-block carousel-tall-img" alt="Beach" loading="lazy">
                                    </div>
                                    <div class="col-12 col-lg-6 text-center green-text">
                                        <img class="mt-5 mb-3 d-none d-lg-block mx-auto" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
                                        <h6 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Playa Cerca de ti')}}</h6>
            
                                        <p class="fw-normal-zen fs-5 mb-4 text-start">{{__('Nuevo Vallarta se vive intensamente en sus playas doradas, mar turquesa y fina arena, donde podrás disfrutar de diversas actividades en un inmejorable clima.')}}
                                        </p>
            
                                        <div class="row w-100 mx-auto justify-content-center pt-5">
                                            <div class="col-8">
                                                <span class="fw-normal-sackers fs-5 text-start d-block">01</span>
                                                <hr>
                                                <span class="fw-normal-sackers fs-5 text-end d-block">03</span>
                                            </div>
                                        </div>
                                        
            
                                    </div>
                                </div>
                            </div>
            
                        </div>
            </div>

            <div class="carousel-item">
                <div class="row justify-content-center mx-auto">

                    <div class="col-11 col-lg-8 container-darkbeige py-4 py-lg-5">
                        <div class="row justify-content-evenly mx-auto w-100">
                            <div class="col-12 col-lg-4">
                                <img src="{{asset('assets/img/golf.jpg');}}" class="d-block carousel-tall-img" alt="Golf field" loading="lazy">
                            </div>
                            <div class="col-12 col-lg-6 text-center green-text">
                                <img class="mt-5 mb-3 d-none d-lg-block mx-auto" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
                                <h6 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Campo de Golf')}}</h6>
                                <p class="fw-normal-zen fs-5 mb-3 text-start">{{__('Los campos de golf en Nuevo Vallarta, han probado ser un gran reto ante golfistas profesionales. Con lagunas y trampas de arena tipo playa y distintos retos, estos campos han sido considerados como de los mejores en México.')}}
                                </p>

                                <div class="row w-100 mx-auto justify-content-center">
                                    <div class="col-8">
                                        <span class="fw-normal-sackers fs-5 text-start d-block">02</span>
                                        <hr>
                                        <span class="fw-normal-sackers fs-5 text-end d-block">03</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="carousel-item">
                <div class="row justify-content-center mx-auto">

                    <div class="col-11 col-lg-8 container-darkbeige py-4 py-lg-5">
                        <div class="row justify-content-evenly mx-auto w-100">
                            <div class="col-12 col-lg-4">
                                <img src="{{asset('assets/img/mountains.jpg');}}" class="d-block carousel-tall-img" alt="Beach" loading="lazy">
                            </div>
                            <div class="col-12 col-lg-6 text-center green-text">
                                <img class="mt-5 mb-3 d-none d-lg-block mx-auto" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
                                <h6 class="fw-normal-sackers fs-2 mb-4 mt-4 mt-lg-0">{{__('Hermosas vistas')}}</h6>
                                <p class="fw-normal-zen fs-5 mb-3 text-start">
                                    {{__('Nuevo Vallarta ofrece intensos cielos azules, montañas color esmeralda, playas doradas, abundante vegetación y un sinfín de vistas inolvidables.')}}
                                </p>

                                <div class="row w-100 mx-auto justify-content-center pt-5">
                                    <div class="col-8">
                                        <span class="fw-normal-sackers fs-5 text-start d-block">03</span>
                                        <hr>
                                        <span class="fw-normal-sackers fs-5 text-end d-block">03</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

        <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position: absolute; right:0; top:60%;" loading="lazy">
    </div>

    <div class="text-center w-100">
        <a class="btn btn-yellow shadow-7 mb-6" href="{{route('view.lifestyle')}}">{{__('Conocer más de la zona')}}</a>
    </div>
    
   

    @include('pages.shared.contact')
</div>
    
@endsection