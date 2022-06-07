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

@section('metatags-fb')
    <meta property="og:title" content="{{__('Departamento')}} {{$unit->name}} - Laguna Living" />
    <meta property="og:url"   content="{{URL::current();}}" />
    <meta property="og:type"  content="website" />
    <meta property="og:description"   content="{{__('Ubicado en el destino residencial-turístico de Nuevo Vallarta, Laguna Living es el lugar perfecto para vivir la experiencia de conectar con la naturaleza y disfrutar lo mejor que la Riviera Nayarit tiene para ofrecer, al nivel del mar.')}}" />
    <meta property="og:image"  content="{{asset('assets/img/unit-landing.jpg');}}" />
@endsection

@section('content')

    <div class="container-fluid p-0 bg-beige">

        <div class="landing-container text-center mb-6">
            <img class="landing-img w-100" src="{{asset('assets/img/unit-landing.jpg');}}" alt="Laguna Living Render">
    
            <div class="gradient-overlay"></div>
    
            <div class="title">
                <h1 class="fw-normal-sackers">{{__('Unidad')}} {{$unit->name}}</h1>
                <img class="mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            </div>

            <div class="d-flex justify-content-center w-100 text-center position-absolute bottom-0" id="section03">
                <a href="#arrow-unit" class="mb-5"><span></span></a>
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
                <div class="tab-pane fade" id="pills-avaliable" role="tabpanel" aria-labelledby="pills-avaliable-tab">
                    @if($blueprint)
                        <img class="w-100" src="{{$blueprint->url}}" alt="Unit {{$unit->name}} blueprints" loading="lazy">
                    @endif
                </div>

                </div>

            </div>
        </div>
        
        <h4 class="text-center fw-normal-sackers fs-2 green-text">{{__('Planes de')}} <span class="beige-text">{{__('Pago')}}</span></h4>

        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">

            @php
                $l=1;
                foreach($unit->tower->paymentPlans as $plan):
            @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($l==1) active @endif link-laguna" id="pills-pay-{{$l}}-tab" data-bs-toggle="pill" data-bs-target="#pills-pay-{{$l}}" type="button" role="tab" aria-controls="pills-pay-{{$l}}" aria-selected="true">{{$l}}</button>
                </li>
            @php
                $l++;
                endforeach;
            @endphp

        </ul>

        <div class="tab-content" id="pills-tabContentPayments">

            {{-- Planes de Pago --}}
            @php
                $m=1;
                foreach($unit->tower->paymentPlans as $plan):
            @endphp
                <div class="tab-pane fade show @if($m==1) active @endif" id="pills-pay-{{$m}}" role="tabpanel" aria-labelledby="pills-pay-{{$m}}-tab">
                    <div class="col-11 col-lg-5 container-darkbeige mb-1 shadow-7 mx-auto" style="position: relative">

                        <h5 class="text-center fw-normal-sackers fs-2 beige-text pt-4">
                            @if (app()->getLocale() == 'en')
                                {{__($plan->name_en)}}
                            @else
                                {{__($plan->name)}}
                            @endif
                        </h5>

                        <hr class="w-75 mx-auto" style="opacity:1; color:#1E4748;">

                        <div class="row justify-content-evenly mx-auto text-center green-text">

                            @if (!empty($plan->down_payment) or $plan->down_payment != 0)
                                <div class="col-6 col-lg-3 mb-5">
                                    <div class="fs-2 fw-bold-zen">{{$plan->down_payment}}%</div>
                                    <div class="fw-normal-zen">{{__('Enganche')}}</div>
                                </div>
                            @endif

                            @if (!empty($plan->month_percent) or $plan->month_percent != 0)
                                <div class="col-6 col-lg-3 mb-5">
                                    <div class="fs-2 fw-bold-zen">{{$plan->month_percent}}%</div>
                                    <div class="fw-normal-zen">{{__('En')}} {{$plan->months}} {{__('Mensualidades')}}</div>
                                </div>
                            @endif

                            @if (!empty($plan->closing_payment) or $plan->closing_payment != 0)
                                <div class="col-6 col-lg-3 mb-5">
                                    <div class="fs-2 fw-bold-zen">{{$plan->closing_payment}}%</div>
                                    <div class="fw-normal-zen">{{__('A la Entrega')}}</div>
                                </div>
                            @endif

                            @if (!empty($plan->discount) or $plan->discount != 0)
                                <div class="col-6 col-lg-3 mb-5">
                                    <div class="fs-2 fw-bold-zen">{{$plan->discount}}%</div>
                                    <div class="fw-normal-zen">{{__('Descuento')}}</div>
                                </div>
                            @endif

                        </div>
                        <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position:absolute; top:15%; right:-100px;" loading="lazy">
                    </div>
                </div>

            @php
                $m++;
                endforeach;
            @endphp
                
            <p class="fw-normal-zen green-text text-center pb-5 mb-0 px-3 px-lg-0">{{__('Los precios, descuentos y planes de pago están sujetos a modificaciones sin previo aviso.')}}</p>
            
        </div>

        <h5 class="mt-6 mb-5 fw-normal-sackers fs-3 green-text text-center">{{__('Comparte esta unidad en tus')}} <span class="beige-text">{{__('redes sociales')}}</span></h5>

        <div class="d-flex justify-content-center pb-5">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current();}}" class="btn-yellow share_fb me-5" title="{{__('Compartir en Facebook')}}" aria-label="{{__('Compartir en Facebook')}}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top">
                <i class="fab fs-4 fa-facebook-f" style="padding: 7px 14px;"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{URL::current();}}" class="btn-yellow share_whatsapp me-5" title="{{__('Compartir en Whatsapp')}}" aria-label="{{__('Compartir en Whatsapp')}}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top">
                <i class="fab fs-4 fa-whatsapp" style="padding: 8px 10px;"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?text={{__('Departamento en Preventa en Laguna Living')}}&url={{URL::current();}}" class="btn-yellow share_tweet" title="{{__('Compartir en Twitter')}}" aria-label="{{__('Compartir en Twitter')}}" target="_blank" rel="noopener noreferrer" data-bs-toggle="tooltip" data-bs-placement="top">
                <i class="fab fs-4 fa-twitter" style="padding: 8px 10px;"></i>
            </a>
        </div>

    </div>

    @include('pages.shared.contact')
@endsection

@section('javascript')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection