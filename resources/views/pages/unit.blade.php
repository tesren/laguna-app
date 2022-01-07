@extends('pages.base')

@if (app()->getLocale() == 'en')
    @section('title')
        Laguna Living - Unit {{$unit->name}}
    @endsection
@else
    @section('title')
        Laguna Living - Unidad {{$unit->name}}
    @endsection
@endif

@section('content')

    <div class="container-fluid p-0 bg-beige">

        <div class="landing-container text-center mb-6">
            <img class="landing-img w-100" src="{{asset('assets/img/unit-landing.jpg');}}" alt="Laguna Living Render">
    
            <div class="gradient-overlay"></div>
    
            <div class="title">
                <h1 class="fw-normal-sackers">{{__('Unidad')}} {{$unit->name}}</h1>
                <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                <a class="btn btn-arrow mt-5" href="#arrow-unit"><i class="fas fa-chevron-down"></i></a>
            </div>
        </div>

        <div class="row mx-auto justify-content-evenly w-100">

            <div class="col-12 col-lg-4 green-text">

                @if (app()->getLocale()=='en')
                    <h3 class="fw-normal-sackers mt-6 fs-2" id="arrow-unit">{{$unit->unitType->name}}
                        <span class="beige-text"> {{__('Modelo')}}</span>
                    </h3>
                @else
                    <h3 class="fw-normal-sackers mt-6 fs-2" id="arrow-unit">{{__('Modelo')}} 
                        <span class="beige-text">{{$unit->unitType->name}}</span>
                    </h3>
                @endif
                

                <hr class="w-75" style="opacity:1; color:#1E4748;">

                <h4 class="fw-normal-sackers fs-5 mb-4">{{__('Construcción')}}: {{$unit->meters_total}} m²</h4>
                <p class="fw-light-zen fs-6 mb-4">{{--$unit->unitType->description--}}</p>

                <img width="20px" class="mb-5" src="{{asset('/assets/icons/green-leaf.svg');}}" alt="" loading="lazy">

                <h3 class="fw-normal-sackers fs-2 mb-5">${{ number_format($unit->price); }} <span class="fs-5">MXN</span></h3>
            </div>

            <div class="col-12 col-lg-3 mb-6">
                <div class="container-darkbeige p-4 shadow-7" style="position: relative;">
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:55%; left:-100px;" loading="lazy">

                    @php
                        $mainImg = $img->where('type','main')->first();
                    @endphp

                    <img class="w-100" src="{{ asset($mainImg->url); }}" alt="Modelo {{$unit->unitType->name}}" loading="lazy">
                </div>
            </div>

        </div>

        <div class="row mx-auto justify-content-center w-100 green-text text-center">

            <h4 class="fw-normal-sackers fs-2 mb-5">{{__('Detalles')}}</h4>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-1 p-lg-4 fw-normal-zen shadow-7">
                    <img class="mt-5" width="55px" src="{{asset('assets/icons/bedroom.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->unitType->bedrooms}} {{__('Recámaras')}}</div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-1 p-lg-4 fw-normal-zen shadow-7">
                    <img class="mt-5" width="50px" src="{{asset('assets/icons/bath.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->unitType->bathrooms}} {{__('Baños')}}</div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-1 p-lg-4 fw-normal-zen shadow-7">
                    <img class="mt-5" width="45px" src="{{asset('assets/icons/meters.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{$unit->meters_total}} m²</sup></div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <div class="container-darkbeige p-1 p-lg-4 fw-normal-zen shadow-7">
                    <img class="mt-5" width="40px" src="{{asset('assets/icons/terrace.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{__('Terraza')}} {{$unit->meters_ext}} m²</sup></div>
                </div>
            </div>

            <div class="col-12 col-lg-2 mb-6">
                <div class="container-darkbeige p-1 p-lg-4 fw-normal-zen shadow-7">
                    <img class="mt-5" width="40px" src="{{asset('assets/icons/building.svg');}}" alt="">
                    <div class="mt-3 mb-5 fs-4">{{__('Nivel')}} {{$unit->floor}}</div>
                </div>
            </div>

        </div>

        <h4 class="text-center fw-normal-sackers fs-2 green-text">{{__('Galería')}}</h4>

        <div class="row mx-auto w-100 justify-content-center mb-6">

            @php
                $galleryImgs = $img->where('type','gallery');
            @endphp

            <div class="col-12 col-lg-8 px-0">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        
                    <div class="carousel-inner">
                        @php $i=0; @endphp
        
                        @foreach ($galleryImgs as $img)
        
                            <div class="carousel-item @if($i==0) active @endif">
                                <img src="{{$img->url}}" class="d-block w-100" alt="..." loading="lazy">
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

        <h4 class="text-center fw-normal-sackers fs-2 green-text">{{__('Ubicada en la Torre')}} <span class="beige-text">{{$unit->tower->name}}</span></h4>
        <div class="row mx-auto justify-content-center w-100 mb-6">
            <div class="col-12 col-lg-8 container-darkbeige">
                
                <div class="svg-container">
                    <picture>
                        <source srcset="{{$towerImg->url}}" type="image/webp" />
                        <img class="w-100" src="{{$towerImgJpg->url}}" alt="Torre {{$unit->tower->name}}" loading="lazy">
                    </picture>
                    

                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1280 720"> 

                        <polygon class="unit-polygon" points="{{$shape->points}}"></polygon>
                        <text x="{{$shape->text_x}}" y="{{$shape->text_y}}" font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">{{$unit->name}}</text>
                    
                    </svg>

                </div>

            </div>
        </div>

        <h4 class="text-center fw-normal-sackers fs-2 green-text mb-4">{{__('Planos de')}} <span class="beige-text">{{__('la Unidad')}}</span></h4>

        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active link-laguna" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">{{__('Ubicación en planta')}}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link link-laguna" id="pills-avaliable-tab" data-bs-toggle="pill" data-bs-target="#pills-avaliable" type="button" role="tab" aria-controls="pills-avaliable" aria-selected="false">{{__('Planos')}}</button>
            </li>
        </ul>

        <div class="row mx-auto justify-content-center w-100 mb-6">
            <div class="col-11 col-lg-7 p-4 container-darkbeige" style="position:relative;">
                
                <img class="d-none d-lg-block" width="140px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:60%; left:-140px;" loading="lazy">
    
                <div class="tab-content" id="pills-tabContent">

                {{-- Unidad marcada en planta --}}
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <img class="w-100" src="{{asset('assets/marked-units/'.$unit->name.'.jpg')}}" alt="Floor location of unit {{$unit->name}}" loading="lazy">
                </div>

                {{-- Plano de la unidad --}}
                @php
                    $blueprint = $img->where('type','blueprint')->first();
                @endphp

                <div class="tab-pane fade" id="pills-avaliable" role="tabpanel" aria-labelledby="pills-avaliable-tab">
                    <img class="w-100" src="{{asset($blueprint->url)}}" alt="Unit {{$unit->name}} blueprints" loading="lazy">
                </div>

                </div>

            </div>
        </div>
        
        <h4 class="text-center fw-normal-sackers fs-2 green-text">{{__('Planes de')}} <span class="beige-text">{{__('Pago')}}</span></h4>

        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active link-laguna" id="pills-pay-1-tab" data-bs-toggle="pill" data-bs-target="#pills-pay-1" type="button" role="tab" aria-controls="pills-pay-1" aria-selected="true">{{__('1')}}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link link-laguna" id="pills-pay-2-tab" data-bs-toggle="pill" data-bs-target="#pills-pay-2" type="button" role="tab" aria-controls="pills-pay-2" aria-selected="false">{{__('2')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link link-laguna" id="pills-pay-3-tab" data-bs-toggle="pill" data-bs-target="#pills-pay-3" type="button" role="tab" aria-controls="pills-pay-3" aria-selected="false">{{__('3')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link link-laguna" id="pills-pay-4-tab" data-bs-toggle="pill" data-bs-target="#pills-pay-4" type="button" role="tab" aria-controls="pills-pay-4" aria-selected="false">{{__('4')}}</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContentPayments">

            {{-- Plan de pago 1 --}}
            <div class="tab-pane fade show active" id="pills-pay-1" role="tabpanel" aria-labelledby="pills-pay-1-tab">
                <div class="col-11 col-lg-5 container-darkbeige mb-1 shadow-7 mx-auto" style="position: relative">
                    <h5 class="text-center fw-normal-sackers fs-2 green-text pt-4">@if(app()->getLocale()=='es') De @endif <span class="beige-text">{{__('Contado')}}</span></h5>
                    <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                    <div class="row mx-auto text-center green-text">

                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">90%</div>
                            <div class="fw-normal-zen">{{__('Enganche')}}</div>
                        </div>
                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">10%</div>
                            <div class="fw-normal-zen">{{__('A la Entrega')}}</div>
                        </div>
                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">10%</div>
                            <div class="fw-normal-zen">{{__('Descuento')}}</div>
                        </div>

                    </div>
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;" loading="lazy">
                </div>
            </div>
            
            {{-- Plan de pago 2 --}}
            <div class="tab-pane fade" id="pills-pay-2" role="tabpanel" aria-labelledby="pills-pay-2-tab">
                <div class="col-11 col-lg-5 container-darkbeige mb-1 shadow-7 mx-auto" style="position: relative">
                    <h5 class="text-center fw-normal-sackers fs-2 green-text pt-4">{{__('En')}} <span class="beige-text">{{__('Mensualidades')}}</span></h5>
                    <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                    <div class="row mx-auto text-center green-text">

                        <div class="col-6 col-lg-3 mb-4 mb-lg-5">
                            <div class="fs-2 fw-bold-zen">40%</div>
                            <div class="fw-normal-zen">{{__('Enganche')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-4 mb-lg-5 px-0">
                            <div class="fs-2 fw-bold-zen">50%</div>
                            <div class="fw-normal-zen">{{__('En 24 Mensualidades')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="fs-2 fw-bold-zen">10%</div>
                            <div class="fw-normal-zen">{{__('A la Entrega')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="fs-2 fw-bold-zen">8%</div>
                            <div class="fw-normal-zen">{{__('Descuento')}}</div>
                        </div>

                    </div>
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;" loading="lazy">
                </div>
            </div>

            {{-- Plan de pago 3 --}}
            <div class="tab-pane fade" id="pills-pay-3" role="tabpanel" aria-labelledby="pills-pay-3-tab">
                <div class="col-11 col-lg-5 container-darkbeige mb-1 shadow-7 mx-auto" style="position: relative">
                    <h5 class="text-center fw-normal-sackers fs-2 green-text pt-4">{{__('En')}} <span class="beige-text">{{__('Mensualidades')}}</span></h5>
                    <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                    <div class="row mx-auto text-center green-text">

                        <div class="col-6 col-lg-3 mb-4 mb-lg-5">
                            <div class="fs-2 fw-bold-zen">35%</div>
                            <div class="fw-normal-zen">{{__('Enganche')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-4 mb-lg-5 px-0">
                            <div class="fs-2 fw-bold-zen">55%</div>
                            <div class="fw-normal-zen">{{__('En 24 Mensualidades')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="fs-2 fw-bold-zen">10%</div>
                            <div class="fw-normal-zen">{{__('A la Entrega')}}</div>
                        </div>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="fs-2 fw-bold-zen">7%</div>
                            <div class="fw-normal-zen">{{__('Descuento')}}</div>
                        </div>

                    </div>
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;" loading="lazy">
                </div>
            </div>

             {{-- Plan de pago 4 --}}
             <div class="tab-pane fade" id="pills-pay-4" role="tabpanel" aria-labelledby="pills-pay-4-tab">
                <div class="col-11 col-lg-5 container-darkbeige mb-1 shadow-7 mx-auto" style="position: relative">
                    <h5 class="text-center fw-normal-sackers fs-2 green-text pt-4">{{__('En Dos')}} <span class="beige-text">{{__('Pagos')}}</span></h5>
                    <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                    <div class="row mx-auto text-center green-text">

                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">60%</div>
                            <div class="fw-normal-zen">{{__('Enganche')}}</div>
                        </div>
                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">40%</div>
                            <div class="fw-normal-zen">{{__('A la Entrega')}}</div>
                        </div>
                        <div class="col-4 mb-5">
                            <div class="fs-2 fw-bold-zen">5%</div>
                            <div class="fw-normal-zen">{{__('Descuento')}}</div>
                        </div>

                    </div>
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;" loading="lazy">
                </div>
            </div>

                
            <p class="fw-normal-zen green-text text-center pb-5 mb-0 px-3 px-lg-0">{{__('Los precios, descuentos y planes de pago están sujetos a modificaciones sin previo aviso.')}}</p>
            
        </div>
    </div>

    @include('pages.shared.contact')
@endsection