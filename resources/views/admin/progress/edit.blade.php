@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center my-5">

        <div class="col-12 col-md-10 col-lg-7 card shadow-7 px-0">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                <i class="fas fa-hammer"></i>
                 Editar Avance
                </span>
            </div>

            <div class="card-body">
                <form action="{{route('update.post',['id'=>$post->id]);}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Título</label>
                    <input class="form-control mb-3" type="text" name="title" id="title" value="{{$post->title}}" required>

                    <label for="date">Fecha del Avance</label>
                    <input class="form-control mb-3" type="date" name="date" id="date" value="{{$post->date}}" required>

                    <label for="description">Descripción</label>
                    <textarea class="form-control mb-3" name="description" id="description" maxlength="500" rows="4" required>{{$post->description}}</textarea>

                    @php
                        $progImgs = $imgs->where('progress_post_id', $post->id)->where('size', 'large');
                        $i=0;
                    @endphp

                    @if (!empty($progImgs))

                        <label>Imágenes actuales</label>
                        <div id="carouselExampleControls" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($progImgs as $img)
                                    <div class="carousel-item @if($i==0) active @endif">
                                        <img src="{{asset($img->url);}}" class="d-block w-100" alt="Imagenes progreso">
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

                    <label for="imgfiles">Seleccione nuevas imágenes del Avance</label>
                    <input class="form-control mb-4" type="file" id="imgfiles" name="imgfiles[]" multiple accept=".jpg, .jpeg, .png, .webp, .svg" required>

                    <button type="submit" class="btn btn-primary w-100" onclick="this.disabled=true;this.form.submit();">Guardar Cambios</button>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection