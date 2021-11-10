@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center my-5">

        <div class="col-12 col-md-11 col-lg-11 card shadow-7 px-0">

            <form action="{{route('update.progress',['id'=>$progress->id]);}}" method="post">
                @csrf

                <div class="card-header d-flex justify-content-between">
                    <span class="fs-5 d-block" style="align-self: center">
                    <i class="fas fa-hammer"></i>
                    Progreso General
                    </span>
                    <button id="update" type="submit" class="btn btn-primary disabled" onclick="this.disabled=true;this.form.submit();">Guardar Cambios</a>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-10 chrome">
                            <label for="percent" class="form-label fs-6">Porcentaje del Progreso:</label>
                            <input type="range" class="d-block mb-4" min="0" max="100" step="1" value="{{$progress->percent}}" id="percent" name="percent" required oninput="updateValue();" onchange="updateValue();" >
                        </div>
                        <div class="col-2 fs-2" style="align-self: center;">
                            <span class="ms-3" id="progress-value">{{$progress->percent}}</span>%
                        </div>

                        <div class="col-12 d-block d-lg-flex mt-2">
                            <label class="form-label fs-6 d-block d-lg-flex">Etapas terminadas: </label>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage1" name="stage1" @if($progress->st1_done == 1) checked @endif onchange="enableBtn();" >
                                <label class="form-check-label" for="flexCheckDefault">{{$progress->stage_1}}</label>
                            </div>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage2" name="stage2" @if($progress->st2_done == 1) checked @endif onchange="enableBtn();">
                                <label class="form-check-label" for="flexCheckChecked">{{$progress->stage_2}}</label>
                            </div>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage3" name="stage3" @if($progress->st3_done == 1) checked @endif onchange="enableBtn();">
                                <label class="form-check-label" for="flexCheckChecked">{{$progress->stage_3}}</label>
                            </div>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage4" name="stage4" @if($progress->st4_done == 1) checked @endif onchange="enableBtn();">
                                <label class="form-check-label" for="flexCheckChecked">{{$progress->stage_4}}</label>
                            </div>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage5" name="stage5" @if($progress->st5_done == 1) checked @endif onchange="enableBtn();">
                                <label class="form-check-label" for="flexCheckChecked">{{$progress->stage_5}}</label>
                            </div>

                            <div class="form-check ms-2">
                                <input class="form-check-input mx-0" type="checkbox" id="stage6" name="stage6" @if($progress->st6_done == 1) checked @endif onchange="enableBtn();">
                                <label class="form-check-label" for="flexCheckChecked">{{$progress->stage_6}}</label>
                            </div>

                        </div>
                    </div>


                    

                </div>
            </form>

        </div>

        <div class="col-12 col-md-11 col-lg-11 card shadow-7 px-0 my-4">
            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                    <i class="fas fa-list-ol"></i> 
                     Actualizaciones del progreso
                </span>
                <a class="btn btn-success" href="{{route('create.progress');}}">Registrar Avances</a>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped table-bordered" id="all_posts_table" data-page-length='10'>
                    <thead>
                      <tr>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
    
                    <tbody>

                      @foreach($posts->all() as $post)
                            <tr>
                                <td>{{ $post->title; }}</td>
                                <td>{{ $post->date; }}</td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="{{route('edit.progress',['id'=> $post->id]);}}" class="btn btn-primary">Editar</a>
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
        // .chrome styling
        $(document).ready( function () {
            var percentage = $('#percent' ).val();
            $('#percent' ).css( 'background', 'linear-gradient(to right, green 0%, green '+percentage +'%, #e9ecef ' + percentage + '%, #e9ecef 100%)' );

            $('#all_posts_table').DataTable({
                fixedHeader: {
                        header: true,
                        footer:false,
                    },
                columnDefs: [
                    { orderable: false, targets: 2 }
                ]
            });
        });

        $( '.chrome input' ).on( 'input', function( ) {
            $( this ).css( 'background', 'linear-gradient(to right, green 0%, green '+this.value +'%, #e9ecef ' + this.value + '%, #e9ecef 100%)' );
        } );

        function updateValue() {
            var rangeValue = document.getElementById("percent").value;
            document.getElementById("progress-value").innerHTML = rangeValue;
            $('#update').removeClass('disabled');
        }

        function enableBtn(){
            $('#update').removeClass('disabled');
        }

    </script>
@endsection