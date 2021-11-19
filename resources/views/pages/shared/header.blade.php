<nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top shadow-7">

    <div class="container-fluid">

      <a class="navbar-brand py-2 ms-2 ms-lg-4 logo-yellow" href="/">
        <img class="w-100" src="{{asset('assets/img/logo-dorado.png');}}" alt="Logo Laguna Living">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLaguna" aria-controls="navbarLaguna" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarLaguna">

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fs-5 fw-normal-zen">

          <li class="nav-item me-5">
            <a class="nav-link link-light" href="{{route('view.towers');}}">Inventario</a>
          </li>

          <li class="nav-item me-5">
            <a class="nav-link link-light" href="#">Construcción</a>
          </li>
          
          <li class="nav-item me-5">
            <a class="nav-link link-light">Estilo de Vida</a>
          </li>

          <li class="nav-item me-5">
            <a class="nav-link link-light">Nosotros</a>
          </li>

          <li class="nav-item me-5">
            <a class="nav-link link-light">Contacto</a>
          </li>

          <li class="nav-item">
            <button class="btn btn-yellow" type="button" style="vertical-align: -webkit-baseline-middle;">
                <i class="fas fa-search"></i>
            </button>
          </li>

        </ul>
        
      </div>
    </div>
  </nav>