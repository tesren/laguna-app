@extends('pages.base')

@if (app()->getLocale() == 'en')
    @section('title')
        Laguna Living - Tower {{$tower->name}}
    @endsection
@else
    @section('title')
        Laguna Living - Torre {{$tower->name}}
    @endsection
@endif

@section('content')

<div class="container-fluid p-0 bg-beige">

    <div class="landing-container text-center">
        <picture>
            <source srcset="{{asset('assets/img/inventory-landing.webp');}}" type="image/webp" />
           
            <img class="landing-img w-100" src="{{asset('assets/img/inventory-landing.jpg');}}" alt="Laguna Living Render">
        </picture> 
        
        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">{{__('Inventario')}}</h1>
            <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            <a class="btn btn-arrow mt-5" href="#arrow-inventory"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>

    <h2 class="green-text fw-normal-sackers text-center my-6" id="arrow-inventory">{{__('Echa un vistazo a nuestras')}} <br> 
        <span class="beige-text">{{__('Unidades Disponibles')}}</span>
    </h2>

    <div class="row w-100 justify-content-center fw-normal-zen text-center fs-3 mb-4 mx-auto">

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #235631;"></i>
            <span class="green-text">{{__('Disponible')}}</span>
        </div>

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #CEB54A;"></i>
            <span class="green-text">{{__('Apartada')}}</span>
        </div>

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #631E1E;"></i>
            <span class="green-text">{{__('Vendida')}}</span>
        </div>

    </div>

    <div class="row justify-content-center w-100 pb-5 mx-auto">
        <div class="col-12 col-md-11 col-lg-8">

            <div class="container-darkbeige p-4" style="position: relative;">
                <a class="btn btn-yellow btn-more-towers shadow-7" href="{{route('view.towers');}}">
                    <i class="fas fa-arrow-left"></i> {{__('Más torres')}}
                </a>

                <p class="fw-light-zen green-text fs-3 text-center mb-3 mt-4 mt-lg-0">{{__('Haz clic en una unidad para ver mas información')}}</p>

                <h2 class="fs-2 fw-normal-sackers green-text text-center mb-0">{{__('Torre')}} 
                    <span class="beige-text">{{$tower->name}}</span>
                </h2>
                
                <div class="svg-container">
                    <picture>
                        <source srcset="{{asset($img->url)}}" type="image/webp" />
                        <img class="w-100" src="{{asset($imgjpg->url)}}" alt="{{$tower->name}}" loading="lazy">
                    </picture>
                    
        
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1280 720">     
                        
                        @foreach ($units as $unit )

                            <a 
                                @if ($unit->status == "Disponible")
                                    href="{{route('view.unit',['id'=>$unit->id]);}}" 
                                    class="text-decoration-none" 
                                @else
                                    class="text-decoration-none disabled"
                                    aria-disabled="true"
                                @endif
                                style="position: relative"
                            >
                                
                                <polygon class="building-{{$unit->status}}" points="{{ $unit->shape[0]['points'] ?? 0,0; }}"></polygon>

                                <text x="{{$unit->shape[0]['text_x'] ?? 0;}}" 
                                      y="{{$unit->shape[0]['text_y'] ?? 0; }}" 
                                     font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen" style="position: absolute; left:0; top:0; width:100%;">
                                    {{$unit->name}}
                                </text>
                                
                            </a>
                        @endforeach
        
                    </svg>
                </div>
        
            </div>
        </div>
    </div>

</div>
    
@endsection