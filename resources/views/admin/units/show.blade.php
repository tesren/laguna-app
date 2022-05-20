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

            @if (session('errors'))
                @foreach (session('errors') as $error)
                    <div class="col-11 fs-5 my-2 text-center" style="color: #dc3545;">
                        <i class="fa-regular fa-circle-xmark"></i>
                        {{ $error; }}
                    </div>
                @endforeach
            @endif

            <div class="col-11 col-md-10 col-lg-8 px-0 card shadow-8 mb-5">

                <div class="card-header">
                    <i class="fas fa-home"></i>
                    Editar Unidad {{$unit->name}}
                </div>

                <div class="card-body">
                    <form class="row" action="{{route('update.unit', $unit->id)}}" method="post" onsubmit="disableButton();">
                        @csrf
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="unit">Unidad</label>
                            <input class="form-control" type="text" name="unit" id="unit" required value="{{$unit->name}}" onchange="enableBtn();">    
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="type">Tipo</label>
                            <select class="form-select" aria-label="Default select example" name="type" id="type" required onchange="updateInfo();">

                                <?php $unitModel = $unit->unitType->id; ?>

                                @foreach ($unitTypes->all() as $unitType)
                                    <option @if($unitModel == $unitType->id) selected @endif value="{{$unitType->id}}">{{$unitType->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mb-3">
                            <label for="bedrooms">Recámaras</label>
                            <input class="form-control" type="text" name="bedrooms" id="bedrooms" readonly value="{{$unit->unitType->bedrooms}}" onchange="enableBtn();">
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="bathrooms">Baños</label>
                            <input class="form-control" type="text" name="bathrooms" id="bathrooms" readonly value="{{$unit->unitType->bathrooms}}"  onchange="enableBtn();">
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="half_baths">Medios baños</label>
                            <input class="form-control" type="text" name="half_baths" id="half_baths" readonly value="{{$unit->unitType->half_baths}}"  onchange="enableBtn();">
                        </div>

                        <div class="col-12 col-lg-4 mb-3">
                            <label for="const">Total de Metros cuadrados</label>
                            <input class="form-control" type="number" min="0" step="0.01" name="const" id="const" value="{{$unit->meters_total}}" required onchange="enableBtn();">
                        </div>
    
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="interior">Metros cuadrados del interior</label>
                            <input class="form-control" type="number" min="0" step="0.01" name="interior" id="interior" value="{{$unit->meters_int}}" required onchange="enableBtn();">
                        </div>
    
                        <div class="col-12 col-lg-4 mb-3">
                            <label for="exterior">Metros cuadrados del exterior</label>
                            <input class="form-control" type="number" min="0" step="0.01" name="exterior" id="exterior" value="{{$unit->meters_ext}}" required onchange="enableBtn();">
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="tower">Torre</label>
                            <select class="form-select" aria-label="Select Torre" name="tower" id="tower" required  onchange="enableBtn();">

                                <?php $unitTower = $unit->tower->id; ?>

                                @foreach ($towers->all() as $tower)
                                    <option @if($unitTower == $tower->id) selected @endif value="{{$tower->id}}">{{$tower->name}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="status">Estado</label>
                            <select class="form-select" name="status" id="status" required  onchange="enableBtn();">
                                <option <?php if($unit->status =='Disponible'){echo 'selected';} ?> value="Disponible">Disponible</option>
                                <option <?php if($unit->status =='Apartada'){echo 'selected';} ?> value="Apartada">Apartada</option>
                                <option <?php if($unit->status =='Vendida'){echo 'selected';} ?> value="Vendida">Vendida</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-4 mb-3">
                            <label for="floor">Piso</label>
                            <select class="form-select" name="floor" id="floor" required  onchange="enableBtn();">

                                <?php $floor =(int)$unit->floor; ?>
                                @for ($i=1; $i<21; $i++)
                                    <option <?php if($floor == $i){echo 'selected';} ?> value="{{$i}}">{{$i}}</option>
                                @endfor

                            </select>
                        </div>

                        {{-- <div class="col-12 mb-3">
                            <label for="points">Puntos</label>
                            <input type="text" class="form-control" name="points" id="points" value="{{$unit->shape['0']['points'] ?? ''}}" required  onchange="enableBtn();" maxlength="254">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="text_x">Text X</label>
                            <input type="number" class="form-control" name="text_x" id="text_x" value="{{$unit->shape['0']['text_x'] ?? ''}}" required min="0" onchange="enableBtn();">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="text_x">Text Y</label>
                            <input type="number" class="form-control" name="text_y" id="text_y" value="{{$unit->shape['0']['text_y'] ?? ''}}" required min="0" onchange="enableBtn();">
                        </div> --}}


                        <div class="col-12 mb-4">
                            <label for="price">Precio</label>
                            <input class="form-control" type="number" name="price" id="price" required value="{{$unit->price}}"  onchange="enableBtn();">   
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
                            //$('#const').val(arrayTypes[j].meters_total);
                        }
                    }
                    $('#update').removeClass('disabled');
                });

            });
        }

        function enableBtn(){
            $('#update').removeClass('disabled');
        }

        function disableButton() {
            var btn = document.getElementById('update');
            btn.disabled = true;
            btn.innerText = 'Cargando...'
        }
        
    </script>
@endsection