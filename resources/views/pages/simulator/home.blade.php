
@extends('pages.simulator.base')

@section('content')
    <div>
        
        <div class="container-fluid p-0 bg-beige position-relative">

            <div id="video-container" style="height: 100vh">
                <video autoplay muted loop id="video-home" poster="{{asset('assets/img/landing-poster.webp');}}">
                    <source src="{{asset('/assets/videos/new-video.m4v');}}" type="video/mp4">
                </video>
        
                <div class="overlay"></div>
        
                <div id="landing" class="text-center" style="color: white;">
                    <h1 class="fw-normal-sackers mb-3 fs-1">Laguna Living</h1>
                    <h2 class="fw-normal-sackers fs-2">{{__('Diseñado para un')}}</h2>
        
                    <div class="d-flex justify-content-center">
                        <img class="d-none d-lg-block" width="30px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                        <h2 class="mx-4 fw-normal-sackers fs-2 mb-0">{{__('Estilo de Vida Saludable')}}</h2>
                        <img class="d-none d-lg-block" width="30px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                    </div>
        
                    <div class="row mx-auto justify-content-center text-center w-100 mt-6">
                        <div class="col-11 col-lg-3 mb-3 mb-lg-0">
                            <img class="mt-2 mb-3" src="{{asset('/assets/icons/graphic.svg');}}" alt="">
                            <h3 class="fw-light-zen fs-4">{{__('Gran Retorno de Inversión')}}</h3>
                        </div>
                        <div class="col-11 col-lg-3 mb-3 mb-lg-0">
                            <span class="fs-1 mb-1 d-block fw-bold-zen">243</span>
                            <h3 class="fw-light-zen fs-4">{{__('Unidades en Venta')}}</h3>
                        </div>
                        <div class="col-11 col-lg-3">
                            <i class="fas fa-dollar-sign mt-2 mb-3 mb-lg-4 fs-1"></i>
                            <h3 class="fw-light-zen fs-4">{{__('Desde')}}: 3,243,240 MXN</h3>
                        </div>
                    </div>
                    {{-- <a class="btn btn-arrow mt-5" href="#info-section"><i class="fas fa-chevron-down"></i></a> --}}
                    <div class="d-flex justify-content-center w-100 text-center" id="section03">
                        <a href="#info-section" class="mb-0 mb-lg-5"><span class="bottom-0" style="top:initial;"></span></a>
                    </div>
        
                </div>
        
            </div>

            {{-- Boton para cambiar idioma --}}
            <div class="position-absolute top-0 start-0 m-3" style="z-index: 100;">
                @if (app()->getLocale() == 'es')

                    
                    
                        <a class="btn fs-4 p-0" 
                        href="{{route( Route::currentRouteName() ?? 'es.simulator.home', ['utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'en'); }}" 
                        style="vertical-align: -webkit-baseline-middle; color:#ECD259 ;">
                        <i class="fas fa-globe"></i> EN
                        </a>
                    

                @else
                    
                    
                        <a class="btn fs-4 p-0" 
                        href="{{route( Route::currentRouteName() ?? 'en.simulator.home', ['utm_campaign' => request()->query('utm_campaign'), 'utm_source' => request()->query('utm_source'), 'utm_medium' => request()->query('utm_medium')], true, 'es'); }}" 
                        style="vertical-align: -webkit-baseline-middle; color:#ECD259 ;">
                        <i class="fas fa-globe"></i> ES
                        </a>
                    

                @endif

            </div>
        
            <div class="container-fluid px-0 py-5 position-relative" id="info-section">
        
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
                    <div class="col-12 col-lg-4">
                        <picture>
                            <source srcset="{{asset('/assets/img/render-parking.webp')}}" type="image/webp" />
                            
                            <img class="w-100 rounded-img" src="{{asset('/assets/img/render-parking.jpg')}}" alt="Render Parking Lot" loading="lazy">
                        </picture>
                        
                    </div>
        
                    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                        <p class="green-text fw-normal-zen fs-5"> <span class="fw-bold-zen">{{__('Ubicado en el destino residencial-turístico de Nuevo Vallarta.')}}</span>
                            <br> <br>
                            {{__('Laguna Living es el lugar perfecto para vivir la experiencia de conectar con la naturaleza y disfrutar lo mejor que la Riviera Nayarit tiene para ofrecer, como tiendas boutique, restaurantes gourmet y centros comerciales donde podrás disfrutar de un estilo de vida moderno y tranquilo al nivel del mar.')}}
                        </p>
                        
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
        
            {{-- Galería de Renders --}}
            <h3 class="fw-normal-sackers mb-4 text-center green-text">{{__('Galería')}}</h3>
            <div class="row w-100 justify-content-center mb-6 mx-auto pb-1 pb-lg-5">
        
                <div class="col-11 col-lg-7 px-0" style="position: relative;">
        
                    <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; right:-150px; top:45%;">
        
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
        
                            @for ($j = 0; $j<=14; $j++)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$j;}}" @if($j==0) class="active" aria-current="true" @endif aria-label="Slide {{$j+1;}}"></button>
                            @endfor
                            
                        </div>
        
                        <div class="carousel-inner container-darkbeige">
        
                            @for ($i = 1; $i<=14; $i++)
                                <div class="carousel-item @if($i==1) active @endif">
                                    
                                    
                                    <img src="{{asset('assets/landing-gallery/render-'.$i.'.jpg')}}" class="d-block p-4 carousel-gallery-img" alt="Render Laguna Living" loading="lazy">
                                    
                                </div>
                            @endfor
                            
                        </div>
        
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
        
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
                            $smallImg = $unitTypeImgs->where('size','small')->where('unit_type_id',$type->id)->first();
                            //hace el calculo solo con unidades disponibles
                            $lowestPrice = $units->where('type_id',$type->id)->min('price');
                        @endphp
        
                        <div class="carousel-item @if($j==0) active @endif text-center">
                            <div class="container-darkbeige mx-auto" style="width: fit-content">
                                
        
                                <picture>
                                    <source type="image/jpg" media="all and (max-width:768px)" srcset="{{asset($smallImg['url']);}}">
                        
                                    <source type="image/jpg" media="all and (min-width:769px)" srcset="{{asset($largeImg['url']);}}">
                        
                                    <img src="{{asset($largeImg['url']);}}" class="d-block tall-img" alt="{{$type->name}}" style="max-height: 60vh;" loading="lazy">
                                </picture>
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
                                <div class="col-12 col-lg-2 mt-3 mt-lg-0 mb-5">
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
            
        
            {{-- Ubicaciones --}}
            <div class="container-fluid px-0" style="position: relative;">
                <picture>
                    <source type="image/jpg" media="all and (max-width:768px)" srcset="{{asset('assets/img/location-mobile.webp');}}">
        
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
            
        
            {{-- Formulario de busqueda --}}
            <div class="container-fluid px-0 bg-beige" style="padding: 6.5rem 0" id="search-form">

                <div class="row justify-content-evenly w-100 mx-auto">
            
                    <div class="col-12 col-lg-4 green-text" style="
                        background-image: url({{asset('assets/icons/logo-dorado-icono.svg');}}); 
                        background-repeat:no-repeat; 
                        background-position: center;
                        background-blend-mode: overlay;">
            
                        <h4 class="fs-1 fw-normal-sackers text-center mt-5">{{__('Búsqueda')}}</h4>
                        <hr style="color:#ECD259; opacity:1; width:60%;" class="mx-auto">
                        <p class="fs-5 fw-light-zen text-start mx-5">{{__('Busca tu unidad ideal para ver un desglose de los pagos y su proyección a futuro')}}</p>
                    </div>
            
                    <div class="col-11 col-lg-4 mt-5 mt-lg-0">
            
                        <form action="{{route('simulator.search');}}" method="get" class="green-text">
                            @csrf
            
                            <x-honeypot />
            
                            {{-- Precio mínimo y máximo --}}
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <label class="fw-light-zen fs-5" for="min_price">{{__('Rango de precios')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-contact" name="min_price" id="min_price" placeholder="Min." min="0" max="6819804" style="color:#1E4748 !important;">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-contact" name="max_price" id="max_price" placeholder="Max." min="3603700" max="10000000" style="color:#1E4748 !important;">
                                </div>
                            </div>

                            {{-- Recámaras  --}}
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <label class="fw-light-zen fs-5" for="bedrooms">{{__('Recámaras')}}</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select-laguna" name="bedrooms" id="bedrooms">
                                        <option value="" selected>{{__('Seleccione')}}</option>
                                        <option value="146">1+ Flex</option>
                                        <option value="2">2</option>
                                        <option value="5">2+ Flex</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Pisos mínimo y máximo --}}
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <label class="fw-light-zen fs-5" for="min_floor">{{__('Rango de pisos')}}</label>
                                </div>
                                <div class="col-6">
                                    <select class="form-select-laguna" name="min_floor" id="min_floor">
                                        <option value="" selected>Min.</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select-laguna" name="max_floor" id="max_floor">
                                        <option value="" selected>Max.</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Area mínimo y máximo --}}
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <label class="fw-light-zen fs-5" for="min_const">{{__('Rango de m²')}}</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-contact" name="min_const" id="min_const" placeholder="Min." min="0" max="200" style="color:#1E4748 !important;">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-contact" name="max_const" id="max_const" placeholder="Max." min="90" max="300" style="color:#1E4748 !important;">
                                </div>
                            </div>


                            <button id="search_submit" type="submit" class="btn btn-yellow w-100 shadow-7">{{__('Buscar')}}</button>
                        </form>
            
                        @if (session('message'))
                            <div class="w-100 fs-5 my-3 text-center fw-light-zen" style="color:white;">
                                <i class="far fa-check-circle"></i>
                                {{ session('message'); }}
                            </div>
                        @endif
            
                    </div>
            
                </div>
            
        
            </div>

        </div>


        <!-- Search button -->
        <a href="#search-form" class="btn btn-yellow position-fixed bottom-0 end-0 m-3" style="z-index:1000">
            <i class="fa-solid fa-magnifying-glass"></i> {{__('Buscar Unidades')}}
        </a>

        <!-- Cookies Modal -->
        <div class="modal fade" id="cookiesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cookiesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  green-text bg-beige">
                    <div class="modal-header fw-normal-sackers">
                        <h5 class="modal-title" id="cookiesModalLabel">{{__('Política de cookies')}}</h5>
                    </div>
                    <div class="modal-body fw-normal-zen">
                        <p class="fs-5">{{__('Utilizamos Cookies propias y de terceros en nuestro sitio web para mejorar nuestros servicios y la experiencia en el sitio')}}</p>
                        <form action="{{route('set.agent.cookie')}}" method="get">
                            @csrf
                            <input type="hidden" name="agent_cookie" value="{{request()->query('utm_campaign') ?? 'Sin Agente'}}">
                            <button type="submit" class="btn btn-yellow w-100">{{__('Aceptar Cookies')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @php
            if(app()->getLocale() == 'en'){
                $emailSubject = rawurlencode('Hello, I come from the website of Laguna Living');
            }else{
                $emailSubject = rawurlencode('Hola, vengo del sitio web de Laguna Living');
            }
        @endphp


    </div> 
     

@endsection
        