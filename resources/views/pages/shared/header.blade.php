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

          <li class="nav-item me-5 d-none">
            <a class="nav-link link-light" href="#">Construcción</a>
          </li>
          
          <li class="nav-item me-5">
            <a href="{{route('view.lifestyle');}}" class="nav-link link-light">Estilo de Vida</a>
          </li>

          <li class="nav-item me-5">
            <a href="{{route('view.about');}}" class="nav-link link-light">Nosotros</a>
          </li>

          <li class="nav-item me-5">
            <a href="{{route('view.contact');}}" class="nav-link link-light">Contacto</a>
          </li>

          <li class="nav-item">
            <!-- Button trigger modal -->
            <button class="btn btn-yellow" type="button" style="vertical-align: -webkit-baseline-middle;" data-bs-toggle="modal" data-bs-target="#searchModal" onclick="indexTowers();">
                <i class="fas fa-search"></i>
            </button>
          </li>

        </ul>
        
      </div>
    </div>
  </nav>

<!-- Modal de busqueda-->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content bg-beige green-text">

      <div class="modal-header">
        <h5 class="modal-title fw-normal-sackers" id="searchModalLabel">Busqueda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body fw-normal-zen">

        <form action="{{route('view.search');}}" method="post">
          @csrf
          <div class="row justify-content-center mb-4">
            <label class="text-center mb-2">Precio</label>

            <input class="col-5 search-form" type="number" name="minprice" id="minprice" placeholder="Min">
            <span class="col-1 fs-4 text-center">-</span>
            <input class="col-5 search-form" type="number" name="maxprice" id="maxprice" placeholder="Max">
            <div id="slider-range-precios" class="mt-3 col-11"></div>
            
          </div>

          
          <label class="text-center mb-2">Recámaras</label>
          <select class="form-select mb-4" aria-label="Select Bedrooms" name="search-bedrooms" id="search-bedrooms">

            <option value="" selected>Elige uno</option>
            <option value="1">1 + Flex</option>
            <option value="2">2</option>
            <option value="3">3</option>
            
          </select>
          

          <label for="tower">Torre</label>
          <select class="form-select mb-4" aria-label="Select Torre" name="search-towers" id="search-towers">

              <option value="" selected>Elige uno</option>
              
          </select>

          <button type="submit" class="btn btn-yellow w-100 shadow-7">Buscar</button>
        </form>
        
      </div>
      
    </div>
  </div>
</div>