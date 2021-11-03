@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

    <div class="col">

        <div class="row justify-content-center mt-5">

            <div class="col-12 col-md-10 col-lg-8 px-0 card">

                <div class="card-header">
                    <i class="fas fa-home"></i>
                    Registrar Unidad
                </div>

                <div class="card-body">

                    <form class="row" action="{{route('store.unit')}}" method="post">
                        @csrf
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="unit">Unidad</label>
                            <input class="form-control" type="text" name="unit" id="unit" required>    
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="type">Tipo</label>
                            <select class="form-select" aria-label="Default select example" name="type" id="type" required onchange="updateInfo();">
                                
                                <option selected>Elige uno</option>
                                @foreach ($unitTypes->all() as $unitType)
                                    <option value="{{$unitType->id}}">{{$unitType->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mb-3">
                            <label for="bedrooms">Recámaras</label>
                            <input class="form-control" type="text" name="bedrooms" id="bedrooms" readonly>
                        </div>

                        <div class="col-6 col-lg-2 mb-3">
                            <label for="bathrooms">Baños</label>
                            <input class="form-control" type="text" name="bathrooms" id="bathrooms" readonly>
                        </div>

                        <div class="col-6 col-lg-2 mb-3">
                            <label for="half_baths">Medios baños</label>
                            <input class="form-control" type="text" name="half_baths" id="half_baths" readonly >
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="const">Metros cuadrados</label>
                            <input class="form-control" type="text" name="const" id="const" readonly>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="tower">Torre</label>
                            <select class="form-select" aria-label="Select Torre" name="tower" id="tower" required>

                                <option selected>Elige uno</option>

                                @foreach ($towers->all() as $tower)
                                    <option value="{{$tower->id}}">{{$tower->name}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="status">Estado</label>
                            <select class="form-select" name="status" id="status" required>
                                <option selected value="Disponible">Disponible</option>
                                <option value="Apartada">Apartada</option>
                                <option value="Vendida">Vendida</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="floor">Piso</label>
                            <select class="form-select" name="floor" id="floor" required>

                                @for ($i=1; $i<21; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor

                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="price">Precio</label>
                            <input class="form-control" type="number" name="price" id="price" required min="0">   
                        </div>

                        <div class="col-12">
                            <button id="store" type="submit" class="btn btn-success w-100">Registrar Unidad</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>


    </div>

@endsection

@section('javascript')
    <script>
        function updateInfo(){
            $(document).ready( function () {

                $.ajax({
                    url: '/admin/unit/types',
                    method: 'POST',
                    data:{
                        id:1,
                        _token:$('input[name="_token"]').val()
                    },
                }).done(function(res){
                    var arrayTypes = JSON.parse(res);
                    //console.log(arrayTypes);

                    for(var j=0; j<arrayTypes.length; j++){
                        if( $('#type').val()  == arrayTypes[j].id){
                            $('#bedrooms').val(arrayTypes[j].bedrooms);
                            $('#bathrooms').val(arrayTypes[j].bathrooms);
                            $('#half_baths').val(arrayTypes[j].half_baths);
                            $('#const').val(arrayTypes[j].meters_total);
                        }
                    }

                });

            });
        }
        
    </script>
@endsection