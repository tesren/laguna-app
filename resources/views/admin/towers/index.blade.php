@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-11 col-lg-10 card px-0 shadow-8">

            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                  <i class="far fa-building"></i>
                  Torres
                </span>
                <a class="btn btn-success" href="{{route('create.tower')}}">Registrar Torre</a>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped table-bordered" id="all_towers_table" data-page-length='10'>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Unidades</th>
                        <th>Visible</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
    
                    <tbody>
                    
                      @foreach($towers->all() as $tower)
                            <tr>
                                <td>{{ $tower->name; }}</td>
                                <td>{{ $tower->units; }}</td>
                                <td>
                                    @if ($tower->visible == 0)
                                        No
                                    @else
                                        Si   
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('edit.tower',['id'=>$tower->id]);}}" class="btn btn-primary me-1">Editar</a>

                                    @if ($tower->visible == 1)
                                        <form action="{{route('tower.visible',['id'=>$tower->id]);}}" method="post">
                                            @csrf
                                            <input type="hidden" name="visibility" id="visibility" value="0">
                                            <button type="submit" class="btn btn-success"><i class="far fa-eye"></i></button>
                                        </form>
                                    @else
                                        <form action="{{route('tower.visible',['id'=>$tower->id]);}}" method="post">
                                            @csrf
                                            <input type="hidden" name="visibility" id="visibility" value="1">
                                            <button type="submit" class="btn btn-danger"><i class="far fa-eye-slash"></i></button>
                                        </form>
                                    @endif
                                    
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
            $('#all_towers_table').DataTable({
                fixedHeader: {
                        header: true,
                        footer:false,
                    },
                columnDefs: [
                    { orderable: false, targets: 3 }
                ]
            });
        });
    </script>
   
@endsection