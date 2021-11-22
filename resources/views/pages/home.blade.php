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

    <div class="container-fluid px-0 py-5" id="info-section" style="position: relative;">
        <div class="row w-100 justify-content-center my-6">

            <img class="px-0" src="{{asset('/assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:75px; width:140px;">

            <div class="col-6">
                <h3 class="text-center text-uppercase mb-0 fw-normal-sackers green-text">Conéctate con la naturaleza por medio de nuestro 
                    <span class="beige-text">diseño ecológico</span>
                </h3>
            </div>
            
            <img class="px-0" src="{{asset('/assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:0; top:75px; width:140px;">
            
        </div>

        <div class="row justify-content-center w-100">
            <div class="col-12 col-lg-5">
                <img class="w-100 rounded-img" src="{{asset('/assets/img/render-parking.jpg')}}" alt="Render Parking Lot">
            </div>

            <div class="col-12 col-lg-3">
                <p class="green-text fw-normal-zen"> <span class="fw-bold-zen">Ubicado en el destino residencial-turístico de Nuevo Vallarta. </span>
                    <br> <br>
                    Laguna Living es el lugar perfecto para vivir la experiencia de conectar con la naturaleza y disfrutar lo mejor que la Riviera Nayarit tiene para
                    ofrecer, como tiendas boutique, restaurantes gourmet y centros comerciales donde podrás disfrutar de
                    un estilo de vida moderno y tranquilo al nivel del mar.
                </p>

                <a class="btn btn-yellow shadow-7 mt-4" href="{{route('view.towers')}}">Ver Inventario</a>
            </div>
        </div>
        
    </div>

    {{-- Carrusel de amenidades --}}
    <h3 class="fw-normal-sackers mt-6 mb-4 text-center green-text">Amenidades</h3>

    <div class="row w-100 justify-content-center mb-4 fw-normal-zen">
        <div class="col-6 col-lg-2">
            <button type="button" data-bs-target="#carouselAmenities" data-bs-slide-to="0" class="w-100 btn-amenities" aria-label="Slide 1">Edificio</button>
        </div>
        <div class="col-6 col-lg-2">
            <button type="button" data-bs-target="#carouselAmenities" data-bs-slide-to="1" class="w-100 btn-amenities" aria-label="Slide 2">Deportes</button>
        </div>
    </div>
    
   
    <div id="carouselAmenities" class="carousel slide carousel-fade mb-6" data-bs-ride="carousel" data-bs-interval="false">

        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="row w-100 justify-content-center">
                <div class="col-11 col-lg-10 container-darkbeige py-4">
                    <div class="row w-100 text-center green-text">

                        <div class="col-2">
                            <img width="66px" src="{{asset('assets/icons/pool.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Albercas</span>
                        </div>

                        <div class="col-2">
                            <img width="45px" src="{{asset('assets/icons/bbq-area.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Area BBQ</span>
                        </div>

                        <div class="col-2">
                            <img width="60px" src="{{asset('assets/icons/kids-area.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Area para Niños</span>
                        </div>

                        <div class="col-2">
                            <img width="60px" src="{{asset('assets/icons/shopping.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Centro comercial</span>
                        </div>

                        <div class="col-2">
                            <img width="63px" src="{{asset('assets/icons/pets-area.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Centro comercial</span>
                        </div>

                        <div class="col-2">
                            <img width="60px" src="{{asset('assets/icons/24-security.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Centro comercial</span>
                        </div>
                       
                    </div>
                </div>
                
            </div>
          </div>

          <div class="carousel-item">
            <div class="row w-100 justify-content-center">
                <div class="col-11 col-lg-8 container-darkbeige py-4">
                    <div class="row w-100 text-center green-text">

                        <div class="col">
                            <img width="76px" src="{{asset('assets/icons/gym.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Gimnasio</span>
                        </div>

                        <div class="col">
                            <img width="64px" src="{{asset('assets/icons/running.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Pista para correr</span>
                        </div>

                        <div class="col">
                            <img width="60px" src="{{asset('assets/icons/futbol.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Fútbol</span>
                        </div>

                        <div class="col">
                            <img width="46px" src="{{asset('assets/icons/pickle.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Pickleball</span>
                        </div>

                        <div class="col">
                            <img width="60px" src="{{asset('assets/icons/tennis.svg')}}" alt="">
                            <span class="fw-bold-zen d-block mt-2 fs-5">Tennis</span>
                        </div>
                       
                    </div>
                </div>
            </div>
          </div>
          
        </div>

    </div>

    <div class="row w-100 justify-content-center mb-6" style="position: relative;">
        <div class="col-11 col-lg-4 align-self-center" >
            <h4 class="fs-2 fw-normal-sackers green-text">Mercados <br><span class="beige-text">Saludables</span></h4>
            <p class="fs-6 fw-normal-sackers green-text"></p>
            <img width="25px" src="{{asset('assets/icons/laguna-icono-verde.svg')}}" alt="" loading="lazy">
            <img width="150px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; left:0; top:65%;">
        </div>

        <div class="col-11 col-lg-4">
            <img class="w-100 rounded-img" src="{{asset('assets/img/mercado.jpeg')}}" alt="Healthy market" loading="lazy">
        </div>
    </div>

    <div class="row w-100 justify-content-evenly mb-6" style="position: relative;">
        <div class="col-11 col-lg-4">
            <img class="w-100 rounded-img" src="{{asset('assets/img/inventory-landing.jpg')}}" alt="Healthy market" loading="lazy" style="height:620px; object-fit:cover;">
        </div>

        <div class="col-11 col-lg-4 align-self-center">
            <h4 class="fs-2 fw-normal-sackers green-text">Nos importa <br><span class="beige-text">tu seguridad</span></h4>
            <p class="fs-6 fw-normal-sackers green-text"></p>
            <img width="25px" src="{{asset('assets/icons/laguna-icono-verde.svg')}}" alt="" loading="lazy">
            <img width="150px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; right:-10px; top:65%;">
        </div>
        
    </div>

    <h3 class="green-text fw-normal-sackers fs-2 mb-5 text-center">Modelos <span class="beige-text">Disponibles</span></h3>

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
                        <img src="{{asset($largeImg['url']);}}" class="d-block" alt="..." style="max-height: 60vh;">
                    </div>

                    <h5 class="fw-normal-sackers fs-3 mt-5 mb-4">{{$type->name}}</h5>

                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-2">
                            Bedrooms:
                            <div class="fw-bold-zen fs-4">{{$type->bedrooms}}</div>
                        </div>
                        <div class="col-12 col-lg-2">
                            Bathrooms:
                            <div class="fw-bold-zen fs-4">{{$type->bathrooms}}</div>
                        </div>
                        <div class="col-12 col-lg-2">
                            Precios desde:
                            <div class="fw-bold-zen fs-4">
                                @if ($lowestPrice==null)
                                    No hay disponibles
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

    <div class="w-100 text-center">
        <a href="" class="btn btn-yellow shadow-7 my-5">Más información</a>
    </div>
    
    @include('pages.shared.contact')
</div>
    
@endsection