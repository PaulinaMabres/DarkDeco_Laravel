<section id="header" class="header">

  <nav class="navbar navbar-expand-sm  navbar-dark bg-dark container-fluid Color fixed-top anchura ml-0">

    <a class="navbar-brand mt-15 " href="/">
      <img src="/images/logoNuevoRecortado.png" title="DarkDeco" class="d-inline-block align-top logo" alt="logoDarkD">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav mr-auto ml-auto text-center">
        <a class="nav-item nav-link active h4 ml-3" href="/">Home</a>

        <!-- IDEA: Categorias
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle h4 ml-3 p-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorías
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><center>Sillas</center></a>
            <a class="dropdown-item" href="#"><center>Mesas</center></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"> <center>Promociones</center></a>
          </div>
        </li> -->

        <a class="nav-item nav-link h4 ml-3" href="faq">FAQ</a>
        <!-- IDEA: LINK extra
        <a class="nav-item nav-link h4 ml-3" href="#"> Extra </a> -->
      </div>

      {{-- Buscador --}}
      <div class="div-buscador">
        <form class="buscador" action="/searchProducts" method="get">
          <div class="filtro input-group">
            <input type="text" name="filtro" class="form-control" value="" placeholder="Buscar productos">
            {{-- <button type="submit" class="btn btn-dark borde text-uppercase"> <span class="h6">Buscar</span></button> --}}
            <div class="input-group-btn">
              <button class="btn-buscador btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div>
        <div class="login-collapse navbar-nav d-flex flex-row justify-content-around">
          <ul class="navbar-nav ml-auto">
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
                  <img src={{ Storage::url(Auth::user()->image) }}  class="img-circle" height="35px" width="35px"/>
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

      <!-- IDEA: CARRITO; se comenta porque no funciona -->
      <!-- <a class=" nav-link text-secondary d-flex justify-content-center mb-2"href="#"><i class="fas fa-shopping-cart fa-2x"></i>
      </a> -->

      <?php // IDEA: Se comenta porque no funciona [Boton de busqueda ] ?>
      <!-- <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
      </form> -->

    </div>

  </nav>
</section>
