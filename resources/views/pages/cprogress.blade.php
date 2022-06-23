@extends('pages.base')

@section('title')
    <title>Laguna Living - {{__('Construcción')}}</title>
    <meta name="description" content="{{__('Progreso de la construcción de Laguna Living, aquí podrás ver las actualizaciones mas recientes sobre el progreso de la obra de construcción')}}">
@endsection

@section('content')

<div class="container-fluid px-0 bg-beige">

    <div class="landing-container text-center mb-6">
        <img class="landing-img w-100" src="{{asset('assets/img/unit-landing.jpg');}}" alt="Laguna Living Render">

        <div class="gradient-overlay"></div>

        <div class="title">
            <h1 class="fw-normal-sackers">{{__('Progreso de la Construcción')}}</h1>
            <img class="d-none d-lg-block mx-auto" width="50px" src="{{asset('/assets/icons/four-leaves.svg');}}" alt="">
        </div>

        <div class="d-flex justify-content-center w-100 text-center position-absolute bottom-0" id="section03">
            <a href="#arrow-progress" class="mb-5"><span></span></a>
        </div>

    </div>

    <h2 id="arrow-progress" class="fs-1 fw-normal-sackers text-center green-text my-6">{{__('Avances de')}} <span class="beige-text">{{__('Obra')}}</span></h2>

    <div class="row w-100 mx-auto justify-content-center green-text">

        @php
            $totalPosts = count($posts);
        @endphp

        @foreach ($posts as $post)
            <div class="col-11 col-lg-10 pb-5" style="border-left: 2px solid #1E4748;">

                <div class="row w-100 mx-auto justify-content-end justify-content-lg-evenly" style="position:relative;">

                    <div class="col-11 col-lg-4 align-self-center">

                        @if (app()->getLocale() == 'en')
                            <h3 class="fs-2 fw-normal-sackers">{{date('M Y',strtotime($post->date))}}</h3>
                            <h4 class="fs-4 fw-normal-zen">{{$post->title_en}}</h4>
                            <p class="fw-light-zen fs-5">{{$post->description_en}}</p>
                        @else
                            <h3 class="fs-2 fw-normal-sackers">{{date('d/m/Y',strtotime($post->date))}}</h3>
                            <h4 class="fs-4 fw-normal-zen">{{$post->title}}</h4>
                            <p class="fw-light-zen fs-5">{{$post->description}}</p>
                        @endif
                        
                        <img class="mb-3" width="20px" src="{{asset('assets/icons/green-leaf.svg');}}" alt="" loading="lazy">

                        <div class="post-number text-center fs-2 fw-normal-sackers bg-beige">{{$totalPosts}}</div>
                    </div>

                    <div class="col-11 col-lg-5 px-0" style="position: relative;">

                        <div id="carouselProgress-{{$post->id}}" class="carousel slide" data-bs-ride="carousel">

                            @php
                                $postImgs = $imgs->where('progress_post_id', $post->id);
                                $i = 0;
                            @endphp

                            <div class="carousel-inner container-darkbeige">

                                @foreach ($postImgs as $postImg)
                                    <div class="carousel-item @if($i==0) active @endif">
                                        <img src="{{asset($postImg->url);}}" class="d-block progress-img p-2 p-lg-4" alt="Avance de Obra {{$post->date}}">
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                                                          
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProgress-{{$post->id}}" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProgress-{{$post->id}}" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <img class="px-0 d-none d-lg-block" src="{{asset('/assets/img/leaves-left.png');}}" alt="" style="position:absolute; right:-140px; top:120px; width:140px;">

                    </div>
                </div>

            </div>

            @php $totalPosts--; @endphp

        @endforeach

    </div>

</div>
    
@endsection