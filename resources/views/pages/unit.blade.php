@extends('pages.base')

@section('content')

    <div class="container-fluid p-0 bg-beige">

        <div class="landing-container text-center mb-6">
            <img class="landing-img w-100" src="{{asset('assets/img/unit-landing.jpg');}}" alt="Laguna Living Render">
    
            <div class="gradient-overlay"></div>
    
            <div class="title">
                <h1 class="fw-normal-sackers">Unidad {{$unit->name}}</h1>
                <img width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            </div>
        </div>

        <div class="row justify-content-evenly w-100">

            <div class="col-12 col-lg-4 green-text">
                <h3 class="fw-normal-sackers mt-6 fs-2">Modelo 
                    <span class="beige-text">{{$unit->unitType->name}}</span>
                </h3>

                <hr class="w-75" style="opacity:1; color:#1E4748;">

                <h4 class="fw-normal-sackers fs-5 mb-4">Construcción: {{$unit->meters_total}}</h4>
                <p class="fw-light-zen fs-6 mb-4">{{$unit->unitType->description}}</p>

                <img width="20px" class="mb-5" src="{{asset('/assets/icons/green-leaf.svg');}}" alt="">

                <h3 class="fw-normal-sackers fs-2 mb-5">${{ number_format($unit->price); }} <span class="fs-5">MXN</span></h3>
            </div>

            <div class="col-12 col-lg-3 mb-6">
                <div class="container-darkbeige p-4" style="position: relative;">
                    <img width="100px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:55%; left:-65px;">

                    @php
                        $mainImg = $img->where('type','main')->first();
                    @endphp

                    <img class="w-100" src="{{ asset($mainImg->url); }}" alt="Modelo {{$unit->unitType->name}}" loading="lazy">
                </div>
            </div>

        </div>

        <div class="row justify-content-center w-100 green-text text-center">

            <h4 class="fw-normal-sackers fs-2 mb-5">Detalles</h4>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-4 fw-normal-zen">
                    <img class="mt-5" width="55px" src="{{asset('assets/icons/bedroom.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->unitType->bedrooms}} Recámaras</div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-4 fw-normal-zen">
                    <img class="mt-5" width="50px" src="{{asset('assets/icons/bath.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->unitType->bathrooms}} Baños</div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-4 fw-normal-zen">
                    <img class="mt-5" width="45px" src="{{asset('assets/icons/meters.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->meters_total}} m<sup>2</sup></div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-4 fw-normal-zen">
                    <img class="mt-5" width="40px" src="{{asset('assets/icons/terrace.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">Terraza {{$unit->meters_ext}} m<sup>2</sup></div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-6">
                <div class="container-darkbeige p-4 fw-normal-zen">
                    <img class="mt-5" width="40px" src="{{asset('assets/icons/building.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">Piso {{$unit->floor}}</div>
                </div>
            </div>

        </div>

        <h4 class="text-center fw-normal-sackers fs-2 green-text">Galería</h4>

        <div class="row w-100 justify-content-center mb-6">

            @php
                $galleryImgs = $img->where('type','gallery');
            @endphp

            <div class="col-12 col-lg-8">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        
                    <div class="carousel-inner">
                        @php $i=0; @endphp
        
                        @foreach ($galleryImgs as $img)
        
                            <div class="carousel-item @if($i==0) active @endif">
                                <img src="{{$img->url}}" class="d-block w-100" alt="...">
                            </div>
        
                            @php $i++; @endphp
                        @endforeach
        
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

            </div>
        </div>

        <h4 class="text-center fw-normal-sackers fs-2 green-text">Ubicada en la torre <span class="beige-text">{{$unit->tower->name}}</span></h4>
        <div class="row justify-content-center w-100 mb-6">
            <div class="col-12 col-lg-8 container-darkbeige">
                
                <div class="svg-container">
                    <img class="w-100" src="{{$towerImg->url}}" alt="Torre {{$unit->tower->name}}">

                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1000 780"> 

                        <polygon class="building" points="{{$shape->points}}"></polygon>
                        <text x="{{$shape->text_x}}" y="{{$shape->text_y}}" font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">{{$unit->name}}</text>
                    
                    </svg>

                </div>

            </div>
        </div>
        
        <h4 class="text-center fw-normal-sackers fs-2 green-text">Plan de <span class="beige-text">Pago</span></h4>
        <div class="row justify-content-center w-100">

            <div class="col-12 col-lg-4 container-darkbeige mb-6" style="position: relative">
                <h5 class="text-center fw-normal-sackers fs-2 green-text mt-4">De <span class="beige-text">Contado</span></h5>
                <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                <div class="row text-center green-text">

                    <div class="col-6 mb-5">
                        <div class="fs-2 fw-bold-zen">40%</div>
                        <div class="fw-normal-zen">Primer Pago</div>
                    </div>
                    <div class="col-6 mb-5">
                        <div class="fs-2 fw-bold-zen">60%</div>
                        <div class="fw-normal-zen">En 24 Mensualidades</div>
                    </div>

                </div>
                <img width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;">
            </div>

        </div>

    </div>

    @include('pages.shared.contact')
@endsection