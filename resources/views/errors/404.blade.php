@extends('pages.base')

@section('content')

    <div class="container-fluid bg-beige text-center bg-beige " style="min-height: 60vh">
      
      <div class="row mx-auto w-100 justify-content-center py-5">

        <div class="col-11 col-lg-6 align-self-center">

            <div class="container-darkbeige p-3 p-lg-5 green-text" style="position: relative;">
              <h1 class="fs-1 fw-bold-zen">404</h1>
              <p class="fw-normal-zen">Error 404, el url no existe</p>
              <img class="d-none d-lg-block" width="130px" src="{{asset('assets/img/leaves-right.png');}}" alt="" style="position: absolute; left:-130px; top:10%;" loading="lazy">
              <img class="d-none d-lg-block" width="130px" src="{{asset('assets/img/leaves-left.png');}}" alt="" style="position: absolute; right:-130px; top:10%;" loading="lazy">
            </div>

        </div>

      </div>

      <a class="btn btn-yellow mb-6 shadow-7" href="{{route('home.page')}}">Volver a Inicio</a>

    </div>

@endsection

@section('javascript')

@endsection