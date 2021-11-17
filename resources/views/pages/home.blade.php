@extends('pages.base')

@section('content')

<div class="container-fluid p-0" style="position:relative">

    <h1 class="d-none">Laguna Living</h1>

    <video id="video-agua" src="{{asset('/assets/videos/video-ligero.m4v');}}" autoplay loop muted>
        Your browser does not support the video tag.
    </video>

    <div class="fondo-verde"></div>

    <img id="logo" src="{{asset('/assets/img/logo-dorado.png');}}" alt="Logo Laguna Living">

    <h2>COMING SOON</h2>

    <img id="logo-century" src="{{asset('/assets/img/logo-century.png');}}" alt="Logo Century 21">

</div>
    
@endsection