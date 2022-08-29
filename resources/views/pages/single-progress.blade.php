@extends('pages.base')

@section('title')
    <title>Laguna Living - {{__('Construcción')}}</title>
    <meta name="description" content="{{__('Progreso de la construcción de Laguna Living')}} {{$post->title}}">
@endsection

@section('content')
<div class="container-fluid px-0 bg-beige">

    <h1 class="text-center pt-5 mb-1 fw-normal-sackers green-text">
        {{__('Progreso de la construcción')}}
        @if (app()->getLocale() == 'es')
            {{date('d/m/Y',strtotime($post->date))}}
        @else
            {{date('M Y',strtotime($post->date))}}
        @endif
    </h1>

    <h2 class="text-center fw-normal-sackers beige-text mb-6">
        @if (app()->getLocale() == 'es')
            {{$post->title}}
        @else
            {{$post->title_en}}   
        @endif
    </h2>

    @if ($imgs->isNotEmpty())
        <h3 class="text-center fw-normal-sackers green-text mb-4">{{__('Fotos')}}</h3>
        <div class="row justify-content-center w-100 mx-auto pb-5">

            @php
                $imgs = $imgs->where('size', 'large');
                $i = 1;
            @endphp

            @foreach ($imgs as $img)
                <div class="col-12 col-lg-4 col-xl-3 mb-3 @if($i>4) d-none @endif">
                    <img src="{{$img->url}}" alt="Progreso de la construcción de Laguna Living" class="w-100 rounded-2 shadow-7" data-fancybox="gallery" style="height: 270px; object-fit:cover;">
                </div>
                @php $i++ @endphp
            @endforeach

        </div>
    @endif
    

    @if($videos->isNotEmpty())
        <h3 class="text-center fw-normal-sackers green-text mb-4">{{__('Videos')}}</h3>
        <div class="row justify-content-center w-100 mx-auto pb-5">

            @php
                $j = 1;
            @endphp

            @foreach ($videos as $video)
                <div class="col-12 col-lg-4 col-xl-3 mb-3 @if($i>4) d-none @endif">
                    <video src="{{$video->url}}" class="w-100" controls >
                </div>
                @php $j++ @endphp
            @endforeach

        </div>
    @endif
    


</div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection