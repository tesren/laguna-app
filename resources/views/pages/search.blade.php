@extends('pages.base')
@section('content')

<div class="container-fluid px-0 green-text bg-beige pt-5">

    <h1 class="fs-1 mb-6 text-center fw-normal-sackers">Encuentra tu<span class="beige-text"> Unidad Ideal</span></h1>

    <div class="row w-100 mx-auto justify-content-center pb-5">

        @foreach ($units as $unit)

            @php
                $unitImg = $imgs->where('unit_type_id', $unit->type_id)->first();
            @endphp

            <div class="col-11 col-lg-3 mx-2 shadow-7 mb-4 px-0">
                <img class="w-100 search-img" src="{{asset($unitImg->url);}}" alt="Imagen del Modelo">

                <div class="row w-100 mx-auto fw-normal-zen bg-darkbeige py-4 px-3" style="min-height: 230px;">
                    <div class="col-6">
                        <h2 class="fs-4">Unidad {{$unit->name}}</h2>

                        <div class="d-flex fs-5 mb-3">
                            <img class="me-1" width="20px" src="{{asset('assets/icons/bedroom.svg')}}" alt=""> {{$unit->unitType->bedrooms}}
                            <img class="ms-2 me-1" width="20px" src="{{asset('assets/icons/bath.svg')}}" alt=""> {{$unit->unitType->bathrooms}}
                        </div>

                        <h3 class="fs-5">Modelo {{$unit->unitType->name}}</h3>
                        <h3 class="fs-5">Torre: {{$unit->tower->name}}</h3>
                        
                    </div>

                    <div class="col-6">
                        <h2 class="fs-4">${{number_format($unit->price)}} MXN</h2>
                        <h4 class="fs-5 mb-4">Dimension: {{$unit->meters_total}} m²</h4>
                        <a href="{{route('view.unit',['id' => $unit->id]);}}" class="btn btn-yellow shadow-7 w-100">Más Info</a>
                    </div>
                </div>
                
            </div>
            
        @endforeach

    </div>

</div>
@endsection