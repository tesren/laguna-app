@extends('admin.base-admin')

@section('content')

        <div class="col-12 col-md-8 col-lg-4 text-center pt-5">
            <img class="w-100" src="{{asset('/assets/img/laguna-logo-negro.png')}}" alt="Laguna Logo">

            <div class="card shadow-8 w-100">

                <h1 class="my-4 fs-1">Iniciar Sesión</h1>
    
                <form method="POST" action="">
                    @csrf

                    <div class="row">

                        <div class="col-12 mb-3">
                            <span class="d-block text-start secondary-text">Ingresa a tu cuenta</span>
                            <label class="visually-hidden" for="email">Correo</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="far fa-user"></i>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="visually-hidden" for="password">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-unlock-alt"></i>
                                </div>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>

                    </div>

                    <!-- Remember Me -->
                    <div class="row mb-4">
                        <label for="remember_me" class="inline-flex items-start text-start ms-1">
                            <input id="remember_me" type="checkbox" class="text-start" name="remember">
                            <span class="secondary-text">Recuérdame</span>
                        </label>
                    </div>

                    <div class="row">
                      <div class="col-12">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            {{-- <button class="btn w-100 btn-green mb-4" type="submit">Ingresar</button> --}}
                            <a class="btn w-100 btn-green mb-4" href="{{ route('dashboard') }}">Ingresar</a>
                      </div>
                    </div>

                </form>

            </div>

        </div>

    
@endsection