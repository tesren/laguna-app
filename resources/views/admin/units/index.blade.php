@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">
    <div class="row justify-content-center mt-5">
        <div class="col-12">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Todas</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link link-success" id="pills-avaliable-tab" data-bs-toggle="pill" data-bs-target="#pills-avaliable" type="button" role="tab" aria-controls="pills-avaliable" aria-selected="false">Disponibles</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link link-warning" id="pills-hold-tab" data-bs-toggle="pill" data-bs-target="#pills-hold" type="button" role="tab" aria-controls="pills-hold" aria-selected="false">Apartadas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link link-danger" id="pills-sold-tab" data-bs-toggle="pill" data-bs-target="#pills-sold" type="button" role="tab" aria-controls="pills-sold" aria-selected="false">Vendidas</button>
                  </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                {{-- Todas las unidades --}}
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                    <div class="card shadow-7">
                        <div class="card-header">
                            <i class="fas fa-envelope-open-text"></i>
                            Todas las unidades
                        </div>
            
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped" id="all_units_table" data-page-length='10'>
                                <thead>
                                  <tr>
                                    <th class="table-secondary">Unidad</th>
                                    <th>Tipo</th>
                                    <th class="table-secondary">BR</th>
                                    <th>BA</th>
                                    <th class="table-secondary">Torre</th>
                                    <th>Nivel</th>
                                    <th class="table-secondary">Estado</th>
                                    <th>Precio</th>
                                    <th class="table-secondary text-center">Acciones</th>
                                  </tr>
                                </thead>
                
                                <tbody>
                                
                                  @foreach($units->all() as $unit)
                                        <tr>
                                            <td>{{ $unit->name; }}</td>
                                            <td>{{ $unit->type_id; }} </td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$unit->tower_id}}</td>
                                            <td>{{$unit->floor}}</td>
                                            <td>{{$unit->status}}</td>
                                            <td>${{number_format($unit->price);}}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('show.message', ['id' => 1] ) }}" class="btn btn-primary">Editar</a>
                                            </td>
                                        </tr>
                                  @endforeach
                
                                </tbody>
                              </table>
                        </div>
                    </div>
                    
                </div>

                {{-- Unidades Disponibles --}}
                <div class="tab-pane fade" id="pills-avaliable" role="tabpanel" aria-labelledby="pills-avaliable-tab">
                    <div class="card shadow-7">
                        <div class="card-header">
                            <i class="fas fa-envelope-open-text"></i>
                            Unidades Disponibles
                        </div>
            
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped" id="avaliable_units_table" data-page-length='10'>
                                <thead>
                                  <tr>
                                    <th class="table-secondary">Unidad</th>
                                    <th>Tipo</th>
                                    <th class="table-secondary">BR</th>
                                    <th>BA</th>
                                    <th class="table-secondary">Torre</th>
                                    <th>Nivel</th>
                                    <th class="table-secondary">Estado</th>
                                    <th>Precio</th>
                                    <th class="table-secondary text-center">Acciones</th>
                                  </tr>
                                </thead>
                
                                <tbody>
                                  <?php $avaliableUnits = $units->where('status', 'Disponible'); ?>
                                  @foreach($avaliableUnits->all() as $unit)
                                        <tr>
                                            <td>{{ $unit->name; }}</td>
                                            <td>{{ $unit->type_id; }} </td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$unit->tower_id}}</td>
                                            <td>{{$unit->floor}}</td>
                                            <td>{{$unit->status}}</td>
                                            <td>${{number_format($unit->price);}}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('show.message', ['id' => 1] ) }}" class="btn btn-primary">Editar</a>
                                            </td>
                                        </tr>
                                  @endforeach
                
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

                {{-- Unidades Apartadas --}}
                <div class="tab-pane fade" id="pills-hold" role="tabpanel" aria-labelledby="pills-hold-tab">
                    <div class="card shadow-7">
                        <div class="card-header">
                            <i class="fas fa-envelope-open-text"></i>
                            Unidades Apartadas
                        </div>
            
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped" id="onHold_units_table" data-page-length='10'>
                                <thead>
                                  <tr>
                                    <th class="table-secondary">Unidad</th>
                                    <th>Tipo</th>
                                    <th class="table-secondary">BR</th>
                                    <th>BA</th>
                                    <th class="table-secondary">Torre</th>
                                    <th>Nivel</th>
                                    <th class="table-secondary">Estado</th>
                                    <th>Precio</th>
                                    <th class="table-secondary text-center">Acciones</th>
                                  </tr>
                                </thead>
                
                                <tbody>
                                  <?php $onHoldUnits = $units->where('status', 'Apartada'); ?>
                                  @foreach($onHoldUnits->all() as $unit)
                                        <tr>
                                            <td>{{ $unit->name; }}</td>
                                            <td>{{ $unit->type_id; }} </td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$unit->tower_id}}</td>
                                            <td>{{$unit->floor}}</td>
                                            <td>{{$unit->status}}</td>
                                            <td>${{number_format($unit->price);}}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('show.message', ['id' => 1] ) }}" class="btn btn-primary">Editar</a>
                                            </td>
                                        </tr>
                                  @endforeach
                
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

                {{-- Unidades Vendidas --}}
                <div class="tab-pane fade" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab">
                    <div class="card shadow-7">
                        <div class="card-header">
                            <i class="fas fa-envelope-open-text"></i>
                            Unidades Vendidas
                        </div>
            
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped" id="sold_units_table" data-page-length='10'>
                                <thead>
                                  <tr>
                                    <th class="table-secondary">Unidad</th>
                                    <th>Tipo</th>
                                    <th class="table-secondary">BR</th>
                                    <th>BA</th>
                                    <th class="table-secondary">Torre</th>
                                    <th>Nivel</th>
                                    <th class="table-secondary">Estado</th>
                                    <th>Precio</th>
                                    <th class="table-secondary text-center">Acciones</th>
                                  </tr>
                                </thead>
                
                                <tbody>
                                  <?php $soldUnits = $units->where('status', 'Vendida'); ?>
                                  @foreach($soldUnits->all() as $unit)
                                        <tr>
                                            <td>{{ $unit->name; }}</td>
                                            <td>{{ $unit->type_id; }} </td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$unit->tower_id}}</td>
                                            <td>{{$unit->floor}}</td>
                                            <td>{{$unit->status}}</td>
                                            <td>${{number_format($unit->price);}}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('show.message', ['id' => 1] ) }}" class="btn btn-primary">Editar</a>
                                            </td>
                                        </tr>
                                  @endforeach
                
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

              </div>

        </div>
    </div>
</div>
    
@endsection

@section('javascript')

    <script>
        $(document).ready( function () {
            $('#all_units_table').DataTable({
          fixedHeader: {
                header: true,
                footer:false,
            },
           columnDefs: [
              { orderable: false, targets: 8 }
            ]
        });

        $('#avaliable_units_table').DataTable({
          fixedHeader: {
                header: true,
                footer:false,
            },
           columnDefs: [
              { orderable: false, targets: 8 }
            ]
        });

        $('#onHold_units_table').DataTable({
          fixedHeader: {
                header: true,
                footer:false,
            },
           columnDefs: [
              { orderable: false, targets: 8 }
            ]
        });

        $('#sold_units_table').DataTable({
          fixedHeader: {
                header: true,
                footer:false,
            },
           columnDefs: [
              { orderable: false, targets: 8 }
            ]
        });


        } );
      
    </script>
    
@endsection