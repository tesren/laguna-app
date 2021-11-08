@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center my-4">

        <div class="col-12 col-md-10 col-lg-6 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Editar Torre: 
                <strong>{{$tower->name;}}</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('update.tower',['id'=>$tower->id]);}}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Nombre de la Torre</label>
                    <input class="form-control mb-3" type="text" name="name" id="name" value="{{$tower->name}}" required onchange="enableBtn();">

                    <label for="units">Unidades en venta</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="units" id="units" value="{{$tower->units}}" required onchange="enableBtn();">

                    {{-- <label for="floors">Pisos</label>
                    <input class="form-control mb-3" type="number" min="0" step="1" name="floors" id="floors" value="{{$tower->floors}}" required onchange="enableBtn();"> --}}

                    <div class="mb-4">
                        
                        @php
                            $img = $imgs->where('tower_id', $tower->id)->where('size', 'large')->first();
                        @endphp

                        @if (!empty($img->url))
                            <label class="form-label">Render Actual de la Torre</label>
                            <img class="w-100 mb-3" src="{{asset($img->url);}}" alt="Imagen">
                        @endif
                        
                        <label for="imgfile" class="form-label d-block">Elige un nuevo render</label>
                        <input class="form-control" type="file" id="imgfile" name="imgfile" accept=".jpg, .jpeg, .png, .webp, .svg" onchange="enableBtn();">
                    </div>

                    <button id="update" class="btn btn-primary w-100 disabled" type="submit" onclick="this.disabled=true;this.form.submit();">Guardar Cambios</button>
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