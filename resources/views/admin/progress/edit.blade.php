@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center my-4 my-md-5">

        @if (session('message'))
            <div class="col-11 fs-5 my-4 text-center" style="color: #198754;">
                <i class="far fa-check-circle"></i>
                {{ session('message'); }}
            </div>
        @endif

        <div class="col-11 col-md-10 col-lg-7 card shadow-7 px-0">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                <i class="fas fa-hammer"></i>
                 Editar Avance
                </span>
            </div>

            <div class="card-body">
                <form action="{{route('update.post',['id'=>$post->id]);}}" method="post" enctype="multipart/form-data" onsubmit="disableButton();">
                    @csrf
                    <label for="title">Título</label>
                    <input class="form-control mb-3" type="text" name="title" id="title" value="{{$post->title}}" required>

                    <label for="title">Título en Inglés</label>
                    <input class="form-control mb-3" type="text" name="title-en" id="title-en" value="{{$post->title_en}}" required>

                    <label for="date">Fecha del avance</label>
                    <input class="form-control mb-3" type="date" name="date" id="date" value="{{$post->date}}" required>

                    <label for="description">Descripción</label>
                    <textarea class="form-control mb-3" name="description" id="description" maxlength="500" rows="4" required>{{$post->description}}</textarea>

                    <label for="description">Descripción en Inglés</label>
                    <textarea class="form-control mb-3" name="description-en" id="description-en" maxlength="500" rows="4" required>{{$post->description_en}}</textarea>

                    @php
                        $progImgs = $imgs->where('size', 'large');                   
                        $i=0;
                    @endphp

                    @if ($progImgs->isNotEmpty())

                        <label class="fs-6">Imágenes actuales</label>
                        <div id="carouselExampleControls" class="carousel slide mb-3 p-1" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($progImgs as $img)
                                    <div class="carousel-item @if($i==0) active @endif">
                                        <img src="{{asset($img->url);}}" class="d-block w-100" alt="Imagenes progreso" style="height: 400px; object-fit:cover;">
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                                    
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif

                    @if ($videos)
                        <label class="fs-6">Videos actuales</label>
                        <div class="row w-100 mx-auto mb-3">
                            @foreach ($videos as $video)
                                <div class="col-12 col-lg-6 p-1">
                                    <video src="{{$video->url}}" class="w-100" controls style="height: 200px; object-fit:cover;"></video>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <label for="imgfiles">Seleccione nuevas imágenes del avance</label>
                    <input class="form-control mb-4" type="file" id="imgfiles" name="imgfiles[]" multiple accept=".jpg, .jpeg, .png, .webp, .svg">

                    <label for="imgfiles">Seleccione nuevos videos del Avance</label>
                    <input class="form-control mb-4" type="file" id="videofiles" name="videofiles[]" multiple accept=".mp4, .mv4" >

                    @if (session('errors'))
                        <span class="d-block fs-6 mb-3" style="color:#dc3545;">
                            <i class="fas fa-exclamation-circle"></i> La imagen debe pesar menos de 2 MB.
                        </span>
                    @endif

                    <button id="submitBtn" type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection

@section('javascript')
    <script>
        function disableButton() {
            var btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerText = 'Cargando...'
        }
    </script>
@endsection