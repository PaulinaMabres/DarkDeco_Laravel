<section id="header" class="header">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark Color fixed-top">

    {{-- Logo --}}
    <a class="navbar-brand mt-15" href="/">
      <img src="/images/logoNuevoRecortado.png" title="DarkDeco" class="d-inline-block align-top logo" alt="logoDarkD">
    </a>

    {{-- Menú hamburguesa --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- <a href="#" class="btn btn-info btn-sm">
    <span class="glyphicon glyphicon-menu-hamburger"></span>
</a> --}}

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="home-item nav-item">
          {{-- Home --}}
          <a class="nav-item nav-link" href="/">Home</a>
          {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
        </li>
        <li class="nav-item">
          {{-- FAQ --}}
          <a class="nav-item nav-link" href="/faq">FAQ</a>
          {{-- <a class="nav-link" href="#">Link</a> --}}
        </li>

        {{-- Productos --}}
        <li class="nav-item dropdown">
          <a class="menu-productos nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
            Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/products">Todos los Productos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/products/1">Habitación</a>
            <a class="dropdown-item" href="/products/2">Cocina</a>
            <a class="dropdown-item" href="/products/3">Lavabo</a>
            <a class="dropdown-item" href="/products/4">Outdoor</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/products/5"> Especial Navidad</a>
          </div>
        </li>

      </ul>

      {{-- Usuario - Register - Login --}}
      <div class="login-area login-collapse navbar-nav fluid">
        <ul class="login-nav navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              {{-- foto --}}
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                @if( Storage::exists(Auth::user()->image) )
                  <img class="img-circle" src="{{ Storage::url(Auth::user()->image) }}"  class="img-circle" height="35px" width="35px"/>
                @else
                  <img class="img-circle" src="{{url('/images/perfil/NotFound-ProfilePhoto.png') }}" class="img-circle" height="35px" width="35px"/>
                @endif
                {{ Auth::user()->name }}
                {{-- <span class="caret"></span> --}}
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('history') }}" > Historial de Compras </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('perfil') }}" > Mi perfil </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>

      {{--  Carrito --}}
      <a class=" nav-link text-secondary" href="{{ route('myCart') }}"><i class="fas fa-shopping-cart fa-2x"></i>
      </a>

      {{-- Buscador --}}
      <form class="form-inline my-2 my-lg-0" action="/searchProducts" method="get">
        <input class="form-control" type="search" name="filtro" placeholder="Buscar productos" aria-label="Search">
        <button class="btn-buscador btn" type="submit">Buscar</button>
      </form>


    </div>


  </div>
</nav>
</section>
