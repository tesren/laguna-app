@extends('admin.base-admin')

@section('content')
@include('admin.shared.sidebar')

<div class="c-main">

    <div class="row justify-content-center mt-5">

        @if (session('message'))
            <div class="col-11 fs-5 my-4 text-center" style="color: #198754;">
                <i class="far fa-check-circle"></i>
                {{ session('message'); }}
            </div>
        @endif

        <div class="col-11 col-lg-6 card px-0 shadow-8">
            <div class="card-header">
                <span class="fs-5 d-block">
                    <i class="fas fa-hand-holding-usd"></i>
                    Agregar un Plan de de Pago
                </span>
            </div>

            <div class="card-body">

                <form action="{{route('store.payment');}}" method="POST" onsubmit="disableButton();">
                    @csrf
                    <label for="pname">Nombre del Plan en Español</label>
                    <input type="text" class="form-control mb-3" name="pname" id="pname" required>

                    <label for="pname_en">Nombre del Plan en Inglés</label>
                    <input type="text" class="form-control mb-3" name="pname_en" id="pname_en" required>

                    <div class="row">

                        <div class="col-12 col-lg-6 ps-0 pe-0 pe-lg-2">
                            <label for="down">Enganche</label>
                            <div class="input-group mb-3">
                                <input type="number" name="down" id="down" class="form-control" aria-label="Enganche" aria-describedby="basic-addon" min="0">
                                <span class="input-group-text" id="basic-addon">%</span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 pe-0 ps-0 ps-lg-2">
                            <label for="discount">Descuento</label>
                            <div class="input-group mb-3">
                                <input type="number" name="discount" id="discount" class="form-control" aria-label="Descuento" aria-describedby="basic-addon2" min="0">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6 ps-0 pe-0 pe-lg-2">
                            <label for="down">Número de Mensualidades</label>
                            <input type="number" name="months" id="months" class="form-control mb-3" aria-label="Número de Mensualidades" min="0">
                        </div>

                        <div class="col-12 col-lg-6 pe-0 ps-0 ps-lg-2">
                            <label for="month_percent">Porcentaje de las Mensualidades</label>
                            <div class="input-group mb-3">
                                <input type="number" name="month_percent" id="month_percent" class="form-control" aria-describedby="basic-addon3" min="0">
                                <span class="input-group-text" id="basic-addon3">%</span>
                            </div>
                        </div>

                    </div>

                    <label for="closing">Pago a la entrega</label>
                    <div class="input-group mb-3">
                        <input type="number" name="closing" id="closing" class="form-control" aria-describedby="basic-addon4" min="0">
                        <span class="input-group-text" id="basic-addon4">%</span>
                    </div>

                    <label class="">Torres</label>
                    <div class="row mb-4">
                        @foreach ($towers as $tower)
                            <div class="form-check col-6 col-lg-2">
                                <input class="form-check-input" type="checkbox" value="{{$tower->id}}" id="torre-{{$tower->id}}" name="towers[]">
                                <label class="form-check-label fs-6" for="torre-{{$tower->id}}">
                                    {{$tower->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button id="submitBtn" class="btn btn-success w-100" type="submit">Agregar Plan de Pago</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection

@section('javascript')
    <script>
        function disableButton() {
            var btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerText = 'Cargando...'
        }
    </script>
@endsection