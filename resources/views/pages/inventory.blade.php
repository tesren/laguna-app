@extends('pages.base')

@section('content')

<div class="container-fluid p-0 bg-beige">

    <div class="landing-container text-center">
        <img class="landing-img w-100" src="{{asset('assets/img/inventory-landing.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">Inventario</h1>
            <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            <a class="btn btn-arrow mt-5" href="#arrow-inventory"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>

    <h2 class="green-text fw-normal-sackers text-center my-6" id="arrow-inventory">Echa un vistazo a nuestras <br> 
        <span class="beige-text">Unidades Disponibles</span>
    </h2>

    <div class="row w-100 justify-content-center fw-normal-zen text-center fs-3 mb-4 mx-auto">

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #235631;"></i>
            <span class="green-text">Disponible</span>
        </div>

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #CEB54A;"></i>
            <span class="green-text">Apartada</span>
        </div>

        <div class="col-4 col-lg-2">
            <i class="fas fa-square" style="color: #631E1E;"></i>
            <span class="green-text">Vendida</span>
        </div>

    </div>

    <div class="row justify-content-center w-100 pb-5 mx-auto">
        <div class="col-12 col-md-11 col-lg-8">

            <div class="container-darkbeige p-4" style="position: relative;">
                <a class="btn btn-yellow btn-more-towers shadow-7" href="{{route('view.towers');}}">
                    <i class="fas fa-arrow-left"></i> Más torres
                </a>

                <p class="fw-light-zen green-text fs-3 text-center mb-3 mt-4 mt-lg-0">Haz clic en una unidad para ver mas información</p>

                <h2 class="fs-2 fw-normal-sackers green-text text-center mb-0">Torre 
                    <span class="beige-text">{{$tower->name}}</span>
                </h2>
                
                <div class="svg-container">
                    <img class="w-100" src="{{asset($img->url)}}" alt="">
        
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