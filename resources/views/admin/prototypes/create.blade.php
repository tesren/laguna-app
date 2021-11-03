@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center mt-5">

        <div class="col-12 col-md-10 col-lg-8 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Registrar Prototipo
            </div>

            <div class="card-body">

                <form class="row" action="{{route('store.type');}}" method="post">
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

                    <div class="col-12 col-lg-4 mb-3">
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
                    </div>

                    <div class="col-12 mb-3">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" maxlength="500" rows="4"></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success w-100">Registrar Prototipo</button>
                    </div>
                    
                </form>

            </div>

        </div>

    </div>

</div>

@endsection