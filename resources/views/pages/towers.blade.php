@extends('pages.base')

@if (app()->getLocale() == 'en')
    @section('title', 'Laguna Living - Towers')
@else
    @section('title', 'Laguna Living - Torres')
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
                <img class="mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            </div>

            <div class="d-flex justify-content-center w-100 text-center position-absolute bottom-0" id="section03"> 
                <a href="#arrow-towers" class="mb-5"><span></span></a>
            </div>
        </div>

        <h2 class="green-text fw-normal-sackers text-center my-6" id="arrow-towers">{{__('Echa un vistazo a nuestras')}} <br> 
            <span class="beige-text">{{__('Torres Disponibles')}}</span>
        </h2>

        <div class="row justify-content-evenly w-100 mx-auto">

            <div class="col-12 col-lg-3 green-text">
                <h3 class="fw-normal-sackers mt-0 mt-lg-5 text-center text-lg-start">{{__('Elige una')}} 
                    <span class="beige-text">{{__('Torre')}}</span>
                </h3>
                <p class="fw-light-zen">{{__('Haz clic en una torre para ver las unidades disponibles')}}</p>
                <img class="mb-5 mb-lg-0" width="20px" src="{{asset('/assets/icons/green-leaf.svg');}}" alt="">
            </div>

            <div class="col-12 col-lg-6 mb-6">
                <div class="container-darkbeige p-4" style="position: relative;">
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:65%; left:-75px;">

                    <div class="svg-container">
                        <img class="w-100" src="{{asset('/assets/img/5-torres.jpg')}}" alt="">

                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1190 967"> 

                            @foreach ($towers as $tower)
                                <a href="{{route('view.inventory',['id'=>$tower->id]);}}" class="text-decoration-none">
                                    <polygon class="building" points="{{$tower->points ?? '0,0'}}"></polygon>
                                    <text x="{{$tower->text_x ?? 0}}" y="{{$tower->text_y ?? 0}}" font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">{{$tower->name}}</text>
                                </a> 
                            @endforeach

                        </svg>
                    </div>
                    
                    

                </div>
            </div>

        </div>

    </div>

    
@endsection