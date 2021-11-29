@extends('pages.base')

@section('content')

    <div class="container-fluid p-0 bg-beige">

        <div class="landing-container text-center">
            <img class="landing-img w-100" src="{{asset('assets/img/inventory-landing.jpg');}}" alt="Laguna Living Render">

            <div class="gradient-overlay"></div>

            <div class="title">
                <h1 class="fw-normal-sackers">{{__('Inventario')}}</h1>
                <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
                <a class="btn btn-arrow mt-5" href="#arrow-towers"><i class="fas fa-chevron-down"></i></a>
            </div>
        </div>

        <h2 class="green-text fw-normal-sackers text-center my-6" id="arrow-towers">{{__('Echa un vistazo a nuestras')}} <br> 
            <span class="beige-text">{{__('Unidades Disponibles')}}</span>
        </h2>

        <div class="row justify-content-evenly w-100 mx-auto">

            <div class="col-12 col-lg-3 green-text">
                <h3 class="fw-normal-sackers mt-0 mt-lg-5 text-center text-lg-start">{{__('Fase')}} 
                    <span class="beige-text">01</span>
                </h3>
                <p class="fw-light-zen">{{__('Haz clic en una torre para ver las unidades disponibles')}}</p>
                <img class="mb-5 mb-lg-0" width="20px" src="{{asset('/assets/icons/green-leaf.svg');}}" alt="">
            </div>

            <div class="col-12 col-lg-5 mb-6">
                <div class="container-darkbeige p-4" style="position: relative;">
                    <img class="d-none d-lg-block" width="100px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position:absolute; top:65%; left:-75px;">

                    <div class="svg-container">
                        <img class="w-100" src="{{asset('assets/img/render-edificios-phase1.jpg')}}" alt="">

                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-content" viewBox="0 0 1000 780"> 

                            @php
                                $caoba = $towers->where('name','Caoba')->first();
                                $cedro = $towers->where('name','Cedro')->first();  
                            @endphp

                            <a href="{{route('view.inventory',['id'=>$caoba->id]);}}" class="text-decoration-none">
                                <polygon class="building" points="496,88 601,75 638,73 648,36 706,54 714,84 780,107 790,172 760,216 774,294 753,324 424,230 426,178"></polygon>
                                <text x="523" y="188" font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">Caoba</text>
                            </a> 
                            
                            <a href="{{route('view.inventory',['id'=>$cedro->id]);}}" class="text-decoration-none">
                                <polygon class="building" points="206,406 317,406 522,456 550,513 443,710 466,750 340,713 262,608 170,580 125,520"></polygon>
                                <text x="240" y="508" font-size="44" font-weight="bold" fill="#fff" class="fw-normal-zen">Cedro</text>
                            </a>

                        </svg>
                    </div>
                    
                    

                </div>
            </div>

        </div>

    </div>

    
@endsection