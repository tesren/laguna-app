@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center mt-4 mt-md-5">

        @if (session('message'))
            <div class="col-11 fs-5 my-4 text-center" style="color: #198754;">
                <i class="far fa-check-circle"></i>
                {{ session('message'); }}
            </div>
        @endif

        <div class="col-11 col-md-10 col-lg-8 card px-0 shadow-8">

            <div class="card-header">
                <i class="far fa-building"></i>
                Registrar Torre
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('store.tower');}}" enctype="multipart/form-data" onsubmit="disableButton();">
                    @csrf
                    <label for="name">Nombre de la Torre</label>
                    <input class="form-control mb-3" type="text" name="name" id="name" required>

                    <label for="units">Unidades en venta</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="units" id="units" required>

                    <label for="units">Fecha de Entrega (Solo se mostrará el mes y el año)</label>
                    <input class="form-control mb-3" type="date" name="deliver_date" id="deliver_date" required>

                    {{-- <label for="floors">Pisos</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="floors" id="floors" required> --}}

                    <div class="mb-4">
                        <label for="imgfile" class="form-label">Render de la Torre</label>
                        <input class="form-control" type="file" id="imgfile" name="imgfile" accept=".jpg, .jpeg, .png, .webp, .svg" required>
                    </div>

                    @if (session('errors'))
                        <span class="d-block fs-6 mb-3" style="color:#dc3545;">
                            <i class="fas fa-exclamation-circle"></i> La imagen debe pesar menos de 2 MB.
                        </span>
                    @endif

                    <button id="submitBtn" class="btn btn-success w-100" type="submit">Registrar Torre</button>
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