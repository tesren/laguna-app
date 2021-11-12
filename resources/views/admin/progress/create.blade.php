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

        <div class="col-11 col-md-10 col-lg-8 card shadow-7 px-0">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                <i class="fas fa-hammer"></i>
                 Registrar Avance
                </span>
            </div>

            <div class="card-body">
                <form action="{{route('store.progress');}}" method="post" enctype="multipart/form-data" onsubmit="disableButton();">
                    @csrf
                    <label for="title">Título</label>
                    <input class="form-control mb-3" type="text" name="title" id="title" required>

                    <label for="date">Fecha del Avance</label>
                    <input class="form-control mb-3" type="date" name="date" id="date" required>

                    <label for="description">Descripción</label>
                    <textarea class="form-control mb-3" name="description" id="description" maxlength="500" rows="4" required></textarea>

                    <label for="imgfiles">Seleccione imágenes del Avance</label>
                    <input class="form-control mb-4" type="file" id="imgfiles" name="imgfiles[]" multiple accept=".jpg, .jpeg, .png, .webp, .svg" required>

                    @if (session('errors'))
                        <span class="d-block fs-6 mb-3" style="color:#dc3545;">
                            <i class="fas fa-exclamation-circle"></i> La imagen debe pesar menos de 2 MB.
                        </span>
                    @endif

                    <button type="submit" id="submitBtn" class="btn btn-success w-100">Publicar Avance</button>
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