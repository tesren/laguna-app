@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-10 col-lg-7 card shadow-8 px-0">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Editar Prototipo: 
                <strong>{{$prototype->name;}}</strong>
            </div>

            <div class="card-body">

                <form class="row" action="{{route('update.type', ['id'=>$prototype->id]);}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="name">Nombre del prototipo</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$prototype->name}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-12 col-lg-6 mb-3">
                        <label for="bedrooms">Recámaras</label>
                        <input class="form-control" type="text" name="bedrooms" id="bedrooms" value="{{$prototype->bedrooms}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-6 col-lg-3 mb-3">
                        <label for="bathrooms">Baños</label>
                        <input class="form-control" type="number" min="0" name="bathrooms" id="bathrooms" value="{{$prototype->bathrooms}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-6 col-lg-3 mb-3">
                        <label for="half_baths">Medios Baños</label>
                        <input class="form-control" type="number" min="0" name="half_baths" id="half_baths" value="{{$prototype->half_baths}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <label for="const">Total de Metros cuadrados</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="const" id="const" value="{{$prototype->meters_total}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <label for="interior">Metros cuadrados del interior</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="interior" id="interior" value="{{$prototype->meters_int}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <label for="exterior">Metros cuadrados del exterior</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="exterior" id="exterior" value="{{$prototype->meters_ext}}" required onchange="enableBtn();">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="4" maxlength="500" onchange="enableBtn();">{{$prototype->description}}</textarea>
                    </div>

                    @php
                        $mainImg = $imgs->where('unit_type_id', $prototype->id)->where('type', 'main')->where('size', 'large')->first();
                    @endphp

                    @if (!empty($mainImg->url))
                        <div class="col-12 mb-3 text-center">
                            <label class="d-block text-start" for="description">Render actual</label>
                            <img class="w-75" src="{{asset($mainImg->url);}}" alt="Render actual">
                        </div>
                    @endif

                    <div class="col-12 mb-3">
                        <label for="mainfile" class="form-label d-block">Elige un nuevo render</label>
                        <input class="form-control" type="file" id="mainfile" name="mainfile" accept=".jpg, .jpeg, .png, .webp, .svg" onchange="enableBtn();">
                    </div>

                    @php
                        $galleryImgs = $imgs->where('unit_type_id', $prototype->id)->where('type', 'gallery')->where('size', 'large');
                    @endphp

                    @if (!empty($galleryImgs))
                        <div class="col-12 mb-3">
                            <label for="description">Galería actual</label>
                            
                            <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    @php $i=0; @endphp
                                    @foreach ($galleryImgs as $img)

                                        <div class="carousel-item @if($i==0) active @endif">
                                            <img src="{{asset($img->url);}}" class="d-block w-100" alt="...">
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach
                    
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>

                              </div>

                        </div>
                    @endif

                    <div class="col-12 mb-3">
                        <label for="imgfiles" class="form-label d-block">Elige imágenes para la galería</label>
                        <input class="form-control" type="file" id="imgfiles" name="imgfiles[]" accept=".jpg, .jpeg, .png, .webp, .svg" multiple onchange="enableBtn();">
                    </div>

                    <div class="col-12">
                        <button id="update" type="submit" class="btn btn-primary w-100 disabled" onclick="this.disabled=true;this.form.submit();">Guardar Cambios</button>
                    </div>
                    
                </form>

            </div>

        </div>
    </div>

</div>

@endsection

@section('javascript')

    <script>
        function enableBtn(){
            $('#update').removeClass('disabled');
        }
    </script>
    
@endsection