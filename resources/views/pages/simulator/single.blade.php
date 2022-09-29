@extends('pages.simulator.base')

@section('title')
    <title>Laguna Living - {{__('Unidad')}} {{$unit->name}}</title>
    <meta name="description" content="{{__('Condominio')}} {{$unit->name}} {{__('de Laguna Living, con')}} {{$unit->unitType->bedrooms}} {{__('Recámaras')}} & {{$unit->unitType->bathrooms}} {{__('Baños')}}. {{__('Ubicado en una de las mejores zonas de Nuevo Vallarta con acceso a múltiples amenidades y cercanía de servicios')}}">
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
                $galleryImgs = $img->where('type','gallery')->where('size', 'large');
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
        
        <h4 id="calculator" class="text-center fw-normal-sackers fs-2 green-text mb-4">{{__('Cotización de la')}} <span class="beige-text">{{__('Unidad')}} {{$unit->name}}</span></h4>
        
        <div class="row w-100 mx-auto justify-content-center pb-4">
            <div class="col-12 col-lg-4">
                <table class="table table-striped green-text">
                    <thead class="fs-4">
                        <tr>
                            <td class="fw-normal-zen">{{__('Unidad')}} <span class="beige-text">{{$unit->name}}</span></td>
                        </tr>
                    </thead>
        
                    <tbody class="fw-light-zen fs-5">
                        <tr>
                            <td>{{__('Recámaras')}}</td>
                            <td>{{$unit->unitType->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>{{__('Construcción total')}}</td>
                            <td>{{$unit->meters_total}} m²</td>
                        </tr>
                        <tr>
                            <td>{{__('Terraza')}}</td>
                            <td>{{$unit->meters_ext}} m²</td>
                        </tr>
                        <tr>
                            <td>{{__('Nivel')}}</td>
                            <td>{{$unit->floor}}</td>
                        </tr>
                        {{-- <tr>
                            <td>{{__('Fecha de Entrega')}}</td>
                            <td>{{ date_format($unit->tower->deliver_date, 'M Y') }}</td>
                        </tr> --}}
                        <tr>
                            <td>{{__('Primer pago')}} 35%</td>
                            <td>${{ number_format($unit->price * 0.35, 1) }} MXN</td>
                        </tr>
                        <tr>
                            <td>{{__('Segundo pago')}} 65%</td>
                            <td>${{ number_format($unit->price * 0.65, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Total')}}</td>
                            <td>${{ number_format($unit->price, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Valor a la Entrega')}}</td>
                            <td>${{ number_format($unit->price * 1.3, 1) }} MXN</td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Proyección de renta mensual')}}</td>
                            <td>${{ number_format($unit->unitType->future_rent) }} MXN</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-4">
                <table class="table table-striped green-text">
                    <thead class="fs-4">
                        <tr>
                            <td class="fw-normal-zen">{{__('Compare con otras')}} <span class="beige-text">{{__('unidades')}}</span></td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <select name="unit-select" id="unit-select" class="form-select-laguna" onchange="updateUnitData();">
                                            <option value="">{{__('Seleccione')}}</option>
                                        @foreach ($units as $unt)
                                            <option value="{{$unt->id}}">{{__('Unidad')}} {{$unt->name}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    </thead>
        
                    <tbody class="fw-light-zen fs-5">
                        <tr>
                            <td>{{__('Recámaras')}}</td>
                            <td id="td-beds"></td>
                        </tr>
                        <tr>
                            <td>{{__('Construcción total')}}</td>
                            <td id="td-const"></td>
                        </tr>
                        <tr>
                            <td>{{__('Terraza')}}</td>
                            <td id="td-ext"></td>
                        </tr>
                        <tr>
                            <td>{{__('Nivel')}}</td>
                            <td id="td-level"></td>
                        </tr>
                        {{-- <tr>
                            <td>{{__('Fecha de Entrega')}}</td>
                            <td id="td-date"></td>
                        </tr> --}}
                        <tr>
                            <td>{{__('Primer pago')}} 35%</td>
                            <td id="td-first-pay"></td>
                        </tr>
                        <tr>
                            <td>{{__('Segundo pago')}} 65%</td>
                            <td id="td-second-pay"></td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Total')}}</td>
                            <td id="td-total"></td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Valor a la Entrega')}}</td>
                            <td id="td-future"></td>
                        </tr>
                        <tr class="fw-normal-zen">
                            <td>{{__('Proyección de renta mensual')}}</td>
                            <td id="td-rent"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if (session('message'))
            <div class="w-100 fs-3 my-3 text-center fw-light-zen green-text">
                <i class="far fa-check-circle"></i>
                {{ session('message'); }}
            </div>
        @endif

        <div class="text-center pb-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-yellow shadow-7" data-bs-toggle="modal" data-bs-target="#downloadModal">
                <i class="fa-solid fa-download"></i> {{__('Descargar PDF')}}
            </button>
        </div>

        <!-- Modal de contacto para descarga-->
        <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered green-text">
                <div class="modal-content bg-beige">
                    <div class="modal-header">
                        <h5 class="fw-normal-sackers mb-0" id="downloadModalLabel">{{__('Descargar')}}  <span class="beige-text">{{__('cotización')}}</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fw-normal-zen">{{__('Le enviaremos un enlace a su correo electrónico para que pueda descargar su cotización')}}</p>
                        <form action="{{route('create.pdf');}}#calculator" method="post">
                            @csrf
            
                            <x-honeypot />
            
                            <input class="form-contact mb-3" type="text" name="name" id="name" placeholder="{{__('Nombre')}}" required style="color:#1E4748 !important;">
            
                            <input class="form-contact mb-3" type="email" name="email" id="email" placeholder="{{__('Correo electrónico')}}" required style="color:#1E4748 !important;">
            
                            <input class="form-contact mb-3" type="tel" name="phone" id="phone" placeholder="{{__('Teléfono')}}" required style="color:#1E4748 !important;">
            
                            <input type="hidden" name="c-type" id="c-type" value="Cotizador de la Unidad {{$unit->name}}" >

                            <input type="hidden" name="unit_1" id="unit_1" value="{{$unit->id}}">
                            <input type="hidden" name="unit_2" id="unit_2" value="">
                            
                            <input type="hidden" name="agent" id="agent" value="{{request()->query('utm_campaign') ?? Cookie::get('agent') ?? 'Sin Agente'}}">
            
                            <textarea class="form-contact mb-4" name="message" id="message" cols="30" rows="3" placeholder="{{__('Comentarios')}}" style="color:#1E4748 !important;"></textarea>
            
                            <button id="contact_submit" type="submit" class="btn btn-yellow w-100 shadow-7">{{__('Enviar')}}</button>
                        </form>
            
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('javascript')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
        function updateUnitData() {
            $(document).ready(function(){
                
                var unitID = $('#unit-select').val();
                
                $('#unit_2').val(unitID);

                $.ajax({
                    url: '/ajax/units/'+unitID,
                    method: 'POST',
                    data:{
                        id:1,
                        _token:$('input[name="_token"]').val()
                    },
                }).done(function(res){
                    var unitFull = JSON.parse(res);
                    var unit = unitFull['unit'];
                    var unitType = unitFull['unitType'];

                    //console.log(unitFull);
                    //console.log(unit);

                    $('#td-beds').html(unitType.bedrooms);

                    $('#td-level').html(unit.floor);

                    /*var deliverDate = new Date(unitFull['tower'].deliver_date);
                    var deliverDate = new Intl.DateTimeFormat('es-MX', {datestyle: 'full'}).format(deliverDate);

                    $('#td-date').html(deliverDate);
                    */
                    $('#td-const').html(unit.meters_total+' m²');
                    
                    $('#td-ext').html(unit.meters_ext+' m²');

                    var price = (unit.price).toLocaleString('en-US');
                    $('#td-total').html('$'+price+' MXN');
                    
                    var firstPay = (unit.price) * 0.35;
                    firstPay = firstPay.toLocaleString('en-US');
                    $('#td-first-pay').html('$'+firstPay+' MXN');

                    var secondPay = (unit.price) * 0.65;
                    secondPay = secondPay.toLocaleString('en-US');
                    $('#td-second-pay').html('$'+secondPay+' MXN');

                    var futureValue = (unit.price) * 1.3;
                    futureValue = futureValue.toLocaleString('en-US');
                    $('#td-future').html('$'+futureValue+' MXN');

                    var futureRent = unitType.future_rent;
                    futureRent = futureRent.toLocaleString('en-US');
                    $('#td-rent').html('$'+futureRent+' MXN');

                });
            });
        }
    </script>
@endsection