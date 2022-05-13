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

        <div class="col-11 col-md-11 col-lg-8 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Registrar Prototipo
            </div>

            <div class="card-body">

                <form class="row" action="{{route('store.type');}}" method="post" enctype="multipart/form-data" onsubmit="disableButton();">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="name">Nombre del prototipo</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>

                    <div class="col-12 col-lg-6 mb-3">
                        <label for="bedrooms">Recámaras</label>
                        <input class="form-control" type="text" name="bedrooms" id="bedrooms" required>
                    </div>

                    <div class="col-6 col-lg-3 mb-3">
                        <label for="bathrooms">Baños</label>
                        <input class="form-control" type="number" min="0" name="bathrooms" id="bathrooms" required>
                    </div>

                    <div class="col-6 col-lg-3 mb-3">
                        <label for="half_baths">Medios Baños</label>
                        <input class="form-control" type="number" min="0" name="half_baths" id="half_baths" required>
                    </div>

                    {{-- <div class="col-12 col-lg-4 mb-3">
                        <label for="const">Total de Metros cuadrados</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="const" id="const" required>
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <label for="interior">Metros cuadrados del interior</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="interior" id="interior" required>
                    </div>

                    <div class="col-12 col-lg-4 mb-3">
                        <label for="exterior">Metros cuadrados del exterior</label>
                        <input class="form-control" type="number" min="0" step="0.01" name="exterior" id="exterior" required>
                    </div> --}}

                    {{-- <div class="col-12 mb-3">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" maxlength="500" rows="4"></textarea>
                    </div> --}}

                    <div class="mb-3">
                        <label for="mainfile" class="form-label">Suba la imagen principal del prototipo</label>
                        <input class="form-control" type="file" id="mainfile" name="mainfile" accept=".jpg, .jpeg, .png, .webp, .svg" required>
                    </div>

                    <div class="mb-3">
                        <label for="blueprint" class="form-label">Suba la imagen de los Planos del prototipo</label>
                        <input class="form-control" type="file" id="blueprint" name="blueprint" accept=".jpg, .jpeg, .png, .webp, .svg" >
                    </div>

                    <div class="mb-3">
                        <label for="imgfiles" class="form-label">Suba imágenes para la galería</label>
                        <input class="form-control" type="file" id="imgfiles" name="imgfiles[]" multiple accept=".jpg, .jpeg, .png, .webp, .svg" >
                    </div>

                    @if (session('errors'))
                        <span class="d-block fs-6 mb-3" style="color:#dc3545;">
                            <i class="fas fa-exclamation-circle"></i> Cada imagen debe pesar menos de 2 MB.
                        </span>
                    @endif

                    <div class="col-12">
                        <button id="submitBtn" type="submit" class="btn btn-success w-100">Registrar Prototipo</button>
                    </div>
                    
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