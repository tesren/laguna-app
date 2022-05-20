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
            <div class="card-header d-flex justify-content-between">
                <span class="fs-5 d-block" style="align-self: center">
                    <i class="fas fa-hand-holding-usd"></i>
                    Editar Plan de Pago
                </span>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Borrar</a>
            </div>

            <div class="card-body">

                <form action="{{route('update.payment',['id'=>$plan->id]);}}" method="POST" onsubmit="disableButton();">
                    @csrf
                    <label for="pname">Nombre del Plan en Español</label>
                    <input type="text" class="form-control mb-3" name="pname" id="pname" value="{{$plan->name}}" required onchange="enableBtn();">

                    <label for="pname_en">Nombre del Plan en Inglés</label>
                    <input type="text" class="form-control mb-3" name="pname_en" id="pname_en" value="{{$plan->name_en}}" required onchange="enableBtn();">

                    <div class="row">

                        <div class="col-12 col-lg-6 ps-0 pe-0 pe-lg-2">
                            <label for="down">Enganche</label>
                            <div class="input-group mb-3">
                                <input type="number" name="down" id="down" class="form-control" value="{{$plan->down_payment}}" aria-label="Enganche" aria-describedby="basic-addon" min="0" onchange="enableBtn();">
                                <span class="input-group-text" id="basic-addon">%</span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 pe-0 ps-0 ps-lg-2">
                            <label for="discount">Descuento</label>
                            <div class="input-group mb-3">
                                <input type="number" name="discount" id="discount" class="form-control" value="{{$plan->discount}}" aria-label="Descuento" aria-describedby="basic-addon2" min="0" onchange="enableBtn();">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6 ps-0 pe-0 pe-lg-2">
                            <label for="down">Número de Mensualidades</label>
                            <input type="number" name="months" id="months" class="form-control mb-3" value="{{$plan->months}}" aria-label="Número de Mensualidades" min="0" onchange="enableBtn();">
                        </div>

                        <div class="col-12 col-lg-6 pe-0 ps-0 ps-lg-2">
                            <label for="month_percent">Porcentaje de las Mensualidades</label>
                            <div class="input-group mb-3">
                                <input type="number" name="month_percent" id="month_percent" class="form-control" value="{{$plan->month_percent}}" aria-describedby="basic-addon3" min="0" onchange="enableBtn();">
                                <span class="input-group-text" id="basic-addon3">%</span>
                            </div>
                        </div>

                    </div>

                    <label for="closing">Pago a la entrega</label>
                    <div class="input-group mb-3">
                        <input type="number" name="closing" id="closing" class="form-control" value="{{$plan->closing_payment}}" aria-describedby="basic-addon4" min="0" onchange="enableBtn();">
                        <span class="input-group-text" id="basic-addon4">%</span>
                    </div>

                    <label class="">Torres</label>
                    <div class="row mb-4">
                        @php $i = 0; @endphp
                        @foreach ($towers as $tower)
                            <div class="form-check col-6 col-lg-2">
                                <input class="form-check-input" type="checkbox" value="{{$tower->id}}" id="torre-{{$tower->id}}" name="towers[]" onchange="enableBtn();"
                                
                                    @foreach ($tower->paymentPlans as $tplan)
                                        @if($tplan->id == $plan->id) 
                                            checked  
                                        @endif
                                    @endforeach

                                >

                                <label class="form-check-label fs-6" for="torre-{{$tower->id}}">
                                    {{$tower->name}}
                                </label>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>

                    <button id="submitBtn" class="btn btn-primary w-100 disabled" type="submit">Guardar Cambios</button>

                </form>

            </div>
        </div>
    </div>

</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title fs-4" id="deleteModalLabel">Borrar Plan de Pago definitivamente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body fs-5">
          <span class="d-block">¿Estás seguro que quieres borrar este Plan de Pago?</span>
          <span class="d-block fw-bold">Este cambio es irreversible</span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form action="{{ route('delete.payment', ['id'=>$plan->id] ); }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger ms-auto" onclick="this.disabled=true;this.form.submit();">Borrar</button>
            </form>
        </div>

      </div>
    </div>
  </div>

@endsection

@section('javascript')
    <script>
        function enableBtn(){
            $('#submitBtn').removeClass('disabled');
        }
        function disableButton() {
            var btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerText = 'Cargando...'
        }
    </script>
@endsection