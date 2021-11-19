@extends('pages.base')

@section('content')

<div class="container-fluid p-0 bg-beige">

    <div class="landing-container text-center">
        <img class="landing-img w-100" src="{{asset('assets/img/inventory-landing.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">Inventory</h1>
            <img width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
        </div>
    </div>

    <h2 class="green-text fw-normal-sackers text-center my-6">Echa un vistazo a nuestras <br> 
        <span class="beige-text">Unidades Disponibles</span>
    </h2>

    <div class="row w-100 justify-content-center fw-normal-zen text-center fs-3 mb-4">

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

    <div class="row justify-content-center w-100 mb-6">
        <div class="col-12 col-md-11 col-lg-8">

            <div class="container-darkbeige p-4" style="position: relative;">
                <a class="btn btn-yellow" href="{{route('view.towers');}}" style="position: absolute; left:10px; top:30px;">
                    <i class="fas fa-arrow-left"></i> Más torres
                </a>

                <p class="fw-light-zen green-text fs-3 text-center mb-3">Haz clic en una unidad para ver mas información</p>

                <h2 class="fs-2 fw-normal-sackers green-text text-center mb-0">Torre 
                    <span class="beige-text">{{$tower->name}}</span>
                </h2>
                
                <div class="svg-container">
                    <img class="w-100" src="{{asset($img->url)}}" alt="">
        
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1280 720">     
                        
                        @foreach ($units as $unit )
                            <a href="{{route('view.unit',['id'=>$unit->id]);}}" class="text-decoration-none">
                                <polygon class="building" points="{{ ($shapes->where('unit_id',$unit->id)->first())['points'] }}"></polygon>

                                <text x="{{($shapes->where('unit_id',$unit->id)->first())['text_x']}}" 
                                      y="{{($shapes->where('unit_id',$unit->id)->first())['text_y']}}" 
                                      font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">
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