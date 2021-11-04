@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center my-5">

        <div class="col-12 col-md-10 col-lg-6 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Editar Torre: 
                <strong>{{$tower->name;}}</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Nombre de la Torre</label>
                    <input class="form-control mb-3" type="text" name="name" id="name" value="{{$tower->name}}" required>

                    <label for="units">Unidades en venta</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="units" id="units" value="{{$tower->units}}" required>

                    <label for="floors">Pisos</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="floors" id="floors" value="{{$tower->floors}}" required>

                    <div class="mb-4">
                        <label for="imgfile" class="form-label">Render de la Torre</label>
                        <img class="w-100" src="{{asset($tower->render_url);}}" alt="Imagen">
                        <input class="form-control" type="file" id="imgfile" name="imgfile" accept=".jpg, .jpeg, .png, .webp, .svg">
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Guardar Cambios</button>
                </form>
            </div>

        </div>
    </div>

</div>


@endsection