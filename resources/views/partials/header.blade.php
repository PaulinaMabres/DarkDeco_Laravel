<section id="header" class="header">

  <nav class="navbar navbar-expand-sm  navbar-dark bg-dark container-fluid Color fixed-top anchura ml-0">

    {{-- Logo --}}
    <a class="navbar-brand mt-15 " href="/">
      <img src="/images/logoNuevoRecortado.png" title="DarkDeco" class="d-inline-block align-top logo" alt="logoDarkD">
    </a>

    {{-- ???? --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav mr-auto ml-auto text-center">
        {{-- Home --}}
        <a class="nav-item nav-link active h4 ml-3" href="/">Home</a>

        {{-- FAQ --}}
        <a class="nav-item nav-link h4 ml-3" href="/faq">FAQ</a>

        {{-- Productos --}}
        <li class="nav-item dropdown">
          <a class="menu-productos nav-link dropdown-toggle h4 ml-3 p-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/products">Productos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/products/1">Habitación</a>
            <a class="dropdown-item" href="/products/2">Cocina</a>
            <a class="dropdown-item" href="/products/3">Lavabo</a>
            <a class="dropdown-item" href="/products/4">Outdoor</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/products/5"> Especial Navidad</a>
          </div>
        </li>

        <!-- IDEA: LINK extra
        <a class="nav-item nav-link h4 ml-3" href="#"> Extra </a> -->
      </div>

      <div>
        <div class="login-area login-collapse navbar-nav d-flex flex-row fluid">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding:0">
                  
                    @if(Storage::exists(Auth::user()->image) )    
                        <img class="img-circle" src="{{ Storage::url(Auth::user()->image) }}  " alt=""  onerror="{{Storage::url('perfil/NotFound-ProfilePhoto.png') }}" height="35px" width="35px"/>
                    @else
                        <img class="img-circle" src="{{Storage::url('perfil/NotFound-ProfilePhoto.png') }}" alt="" height="35px" width="35px"/>
                    @endif
                  {{ Auth::user()->name }}
                  {{-- <span class="caret"></span> --}}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

      </div>
    </div>


    <!-- IDEA: LOGIN collapse -->

    <div class="login-collapse navbar-nav d-flex flex-row justify-content-around">

      <?php
      // IDEA: Todo esto hay que descomentarlo despues IDEA

      // if (session_status() == PHP_SESSION_NONE) {
      //     session_start();
      // }
      // if( isset($_SESSION['logueado']) &&  $_SESSION['logueado']
      //     && isset($_COOKIE['UsuarioLogueado']) && $_COOKIE['UsuarioLogueado'] == true )
      // {
      //   // IDEA: SI el usuario está logueado:
      //   echo '
      //
      //
      //   <li class="nav-item dropdown btn-group dropleft">
      //     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      //       <i class="fas fa-user-circle fa-2x"></i>
      //     </a>
      //     <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
      //       <h6>&nbsp Bienvenido, <strong>';
      //
      //         echo $_SESSION['nombreGuardado'];
      //
      //       echo'</strong> </h6>
      //       <a class="dropdown-item" href="logout.php"><button class="btn btn-outline-danger" type="submit">Log out</button></a>
      //       <div class="dropdown-divider"></div>
      //       <a class="dropdown-item" href="edit-usuario.php">Modificar perfil</a>
      //     </div>
      //   </li>
      //
      //   </div>';
      // }
      // else
      // {
      //   // IDEA: SI no lo está:
      //   echo '
      //   <a class="btn btn-outline-warning mr-3 h4" href="register.php">Registrate</a>
      //   <a class= "btn text-white mr-3 h4 " href="login.php">Iniciar sesión</a>
      //   ';
      // }
      // ?>
    </div>

    {{--  Idea: CARRITO; se comenta porque no funciona --}}
    <a class=" nav-link text-secondary d-flex justify-content-center mb-2"href="#"><i class="fas fa-shopping-cart fa-2x"></i>
    </a>

    {{-- Buscador --}}
    <form class="form-inline my-2 my-lg-0" action="/searchProducts" method="get">
      <input class="form-control mr-sm-2" type="search" name="filtro" placeholder="Buscar productos" aria-label="Search">
      <button class="btn-buscador btn my-2 my-sm-0" type="submit">Buscar</button>
    </form>

  </div>

</nav>
</section>
