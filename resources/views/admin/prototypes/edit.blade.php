@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-10 col-lg-8 card shadow-8 px-0">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Editar Prototipo: 
                <strong>{{$prototype->name;}}</strong>
            </div>

            <div class="card-body">

                <form class="row" action="{{route('update.type', ['id'=>$prototype->id]);}}" method="post">
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

                    <div class="col-12">
                        <button id="update" type="submit" class="btn btn-primary w-100 disabled">Guardar Cambios</button>
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