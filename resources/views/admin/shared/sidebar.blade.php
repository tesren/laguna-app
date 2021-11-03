
    <div class="d-flex flex-column flex-shrink-0  bg-green shadow-8 p-0" id="sidebar">

        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 bg-darkgreen">
            <img class="w-100" src="{{ asset('/assets/img/logo-dorado.png'); }}" alt="Laguna logo">
        </a>

        <ul class="nav nav-pills flex-column mb-auto fs-4 fw-light">

            <li class="nav-item">
                <a href="{{route('dashboard');}}" class="nav-link link-light">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="#" class="nav-link link-light">
                    <i class="far fa-user"></i>
                    Usuarios
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{route('all.units');}}" class="nav-link link-light">
                    <i class="far fa-list-alt"></i>
                    Inventario
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('all.prototypes')}}" class="nav-link link-light">
                    <i class="fas fa-home"></i>
                    Prototipos
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('all.towers')}}" class="nav-link link-light">
                    <i class="far fa-building"></i>
                    Torres
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link-light">
                    <i class="fas fa-hammer"></i>
                    Progreso
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('all.messages');}}" class="nav-link link-light">
                    <i class="fas fa-envelope-open-text"></i>
                    Mensajes
                </a>
            </li>
        </ul>
        
        <a href="#" class="d-flex p-2 link-light text-decoration-none bg-darkgreen">
            <span class="fs-5"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</span>
        </a>
        
    </div>