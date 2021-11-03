@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="col">

    <div class="row justify-content-center mt-5">

        <div class="col-12 col-md-10 col-lg-8 card px-0 shadow-8">

            <div class="card-header">
                <i class="fas fa-home"></i>
                Editar Torre: 
                <strong>{{$tower->name;}}</strong>
            </div>

        </div>
    </div>

</div>


@endsection