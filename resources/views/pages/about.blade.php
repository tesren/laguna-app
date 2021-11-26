@extends('pages.base')

@section('content')

<div class="container-fluid px-0 text-center bg-beige">

    <div class="landing-container text-center">
        <img class="landing-img w-100" src="{{asset('assets/img/inventory-landing.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">Nosotros</h1>
            <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
            <a class="btn btn-arrow mt-5" href="#arrow-about"><i class="fas fa-chevron-down"></i></a>
        </div>
    </div>

    <h1 class="green-text fw-normal-sackers fs-1 mt-6 mb-5" id="arrow-about">Información sobre <br><span class="beige-text">el desarrollador</span></h1>

    <div class="row mx-auto w-100 justify-content-center mb-6">

        <div class="col-11 col-lg-6">

            <div class="container-darkbeige text-center p-3 p-lg-5" style="position: relative;">
                <div class="container-darkgreen p-3 p-lg-4">
                    <img class="w-75" src="{{asset('assets/img/casa-en-familia.png')}}" alt="Casa en familia logo" loading="lazy">
                </div>
        
                <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position: absolute; left:-150px; top:20%;" loading="lazy">
                <img class="d-none d-lg-block" width="150px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position: absolute; right:-150px; top:20%;" loading="lazy">
            </div>

        </div>

    </div>

    <div class="row mx-auto w-100 justify-content-center mb-6">
        <div class="col-11 col-lg-3 mb-3">
            <div class="fw-bold-zen fs-1 green-text">100%</div>
            <div class="fs-5 fw-normal-zen">Porcentaje de compras exitosas</div>
        </div>
        <div class="col-11 col-lg-3 mb-3">
            <div class="fw-bold-zen fs-1 green-text">10</div>
            <div class="fs-5 fw-normal-zen">Años de experiencia inmobiliaria</div>
        </div>
        <div class="col-11 col-lg-3 mb-3">
            <div class="fw-bold-zen fs-1 green-text">432</div>
            <div class="fs-5 fw-normal-zen">Viviendas desarrolladas</div>
        </div>
    </div>

    <div class="row mx-auto w-100 justify-content-center text-center text-lg-start pb-5">
        <div class="col-11 col-lg-4 pe-0 pe-lg-5">
            <img class="w-100 rounded-img tall-img" src="{{asset('assets/img/dan.jpg')}}" alt="Dan M. Schon Weinberg" loading="lazy">
        </div>
        <div class="col-10 col-lg-3 green-text align-self-center">
            <h2 class="fw-normal-sackers fs-2 mt-3 mt-lg-0">Dan M. Schon Weinberg</h2>
            <hr>
            <h3 class="fw-normal-sackers fs-4">Lic. en Administración</h3>
            <p class="fw-normal-zen">Emprendió como desarrollador en el año 2011 con un proyecto de 300 viviendas denominado “STAR” el cual fue un total éxito.</p>
            <img class="mb-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">
        </div>
    </div>

</div>
    
@endsection