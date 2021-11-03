@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">
    <div class="row justify-content-center mt-5">

        <div class="col-12 col-md-11 card px-0 shadow-8">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                  <i class="fas fa-home"></i>
                  Prototipos
                </span>
                <a class="btn btn-success" href="{{route('create.type');}}">Registrar Prototipo</a>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped table-bordered" id="all_types_table" data-page-length='10'>
                    <thead>
                      <tr>
                        <th>Tipo</th>
                        <th>BR</th>
                        <th>BA</th>
                        <th>m² Total</th>
                        <th>m² Interior</th>
                        <th>m² Exterior</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
    
                    <tbody>
                    
                      @foreach($unitTypes->all() as $type)
                            <tr>
                                <td>{{ $type->name; }}</td>
                                <td>{{ $type->bedrooms; }}</td>
                                <td>{{ $type->bathrooms; }}</td>
                                <td>{{$type->meters_total}}</td>
                                <td>{{$type->meters_int}}</td>
                                <td>{{$type->meters_ext}}</td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="{{route('edit.prototypes', ['id' => $type->id])}}" class="btn btn-primary">Editar</a>
                                    <a href="" class="btn btn-primary"><i class="far fa-images"></i></a>
                                </td>
                            </tr>
                      @endforeach
    
                    </tbody>
                  </table>
            </div>

        </div>

    </div>
</div>

@endsection

@section('javascript')

    <script>
        $(document).ready( function () {
            $('#all_types_table').DataTable({
                fixedHeader: {
                        header: true,
                        footer:false,
                    },
                columnDefs: [
                    { orderable: false, targets: 6 }
                ]
            });
        });
    </script>
   
@endsection