
<div class="d-none d-lg-flex flex-column flex-shrink-0  bg-green shadow-8 p-0" id="sidebar">

    <a href="{{route('dashboard');}}" class="d-flex align-items-center mb-0 bg-darkgreen">
        <img class="w-100 py-4" src="{{ asset('/assets/img/logo-dorado.png'); }}" alt="Laguna logo">
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
            <a href="{{route('all.progress');}}" class="nav-link link-light">
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
    
    <div class="d-flex p-2 bg-darkgreen">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn p-0 fs-5 link-light">
                <i class="fas fa-sign-out-alt"></i> 
                Cerrar Sesión
            </button>
        </form>
    </div>
    
</div>

{{--Navbar distinto para móvil--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-green d-flex fixed-top d-lg-none" id="admin-navbarMobile">
    <div class="container-fluid">

        <a class="navbar-brand ms-2" href="{{route('dashboard');}}" id="logo-icono">
            <img class="w-100" src="{{ asset('/assets/icons/logo-laguna-icono.svg'); }}" alt="Laguna logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fs-4" id="navbarSupportedContent">
            
            <a href="{{route('dashboard');}}" class="mb-4">
                <img class="w-100" src="{{ asset('/assets/img/logo-dorado.png'); }}" alt="Laguna logo">
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{route('dashboard');}}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.units');}}" class="nav-link">
                        <i class="far fa-list-alt"></i>
                        Inventario
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.prototypes')}}" class="nav-link">
                        <i class="fas fa-home"></i>
                        Prototipos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.towers')}}" class="nav-link">
                        <i class="far fa-building"></i>
                        Torres
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.progress');}}" class="nav-link">
                        <i class="fas fa-hammer"></i>
                        Progreso
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.messages');}}" class="nav-link">
                        <i class="fas fa-envelope-open-text"></i>
                        Mensajes
                    </a>
                </li>
                <li class="nav-item bg-darkgreen" style="position: absolute; bottom: 0; left: 0; width: 100%;">
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn p-0 fs-5 link-light ms-3 mb-1">
                            <i class="fas fa-sign-out-alt"></i> 
                            Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>