@extends('default')

@section('head')
  <link rel="stylesheet" href="css/login.css">
@endsection


@section('contenidoBody')
  <div class="container registro" id="registro">
    <div class="d-flex justify-content-center h-100 headerEspacio">
      <div class="card">
        <div class="card-header">
          <h1>Registro</h1>
        </div>
        <div class="imagen" >
          <a href="home.php">
            <img src="/images/logoNuevo.png" alt="logo" width="100px" height="100px">
          </a>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="tu nombre">
                  @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="lastName" placeholder="tu apellido" aria-label="tu apellido" aria-describedby="basic-addon1" id="lastName">
                  @error('lastName')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <div class="input-group mb-3">
                  <select type="text" class="form-control" name="localidad" placeholder="tu localidad" aria-label="tu localidad" aria-describedby="basic-addon1" id="localidad">
                    @foreach($localidades as $localidad)
                      <option id="item" value="{{$localidad->id}}">{{$localidad->name}}</option>
                    @endforeach
                  </select>
                  @error('localidad')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="domicilio" placeholder="tu domicilio" aria-label="tu domicilio" aria-describedby="basic-addon1" id="domicilio">
                  @error('domicilio')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="telefono" placeholder="tu teléfono" aria-label="tu teléfono" aria-describedby="basic-addon1" id="telefono">
                  @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              {{--<div class="form-group">
              <div class="input-group mb-3">
              <input type="text" class="form-control" name="numTarjeta" placeholder="numTarjeta" aria-label="numTarjeta" aria-describedby="basic-addon1" id="numTarjeta">

            </div>
          </div>
          <div class="form-group">
          <div class="input-group mb-3">
          <input type="text" class="form-control" name="banco" placeholder="banco" aria-label="tu banco" aria-describedby="basic-addon1" id="banco">

        </div>
      </div>--}}
      <div class="form-group">
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tu email">

            @error('email')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="file" class="file-input" name="image" id="image" placeholder="tu foto de perfil" aria-label="tu foto de perfil" aria-describedby="basic-addon1" value="">
            @error('image')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña" >

              @error('password')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirmación de contraseña" >
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <select class="selectPregunta" name="pregunta_secreta" id="pregunta_secreta">
                @foreach($preguntas_secretas as $pregunta)
                  <option id="item" value="{{$pregunta->id}}">{{$pregunta->question}}</option>
                @endforeach
              </select>
              @error('selectPregunta')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="respuesta_secreta" placeholder="Resp. secreta: nombre de tu esc. primaria" aria-label="RespuestaSecreta" aria-describedby="basic-addon1" id="respuesta_secreta" >

            </div>
          </div>

          <div class="form-group">
            <input type="submit" value="Confirmar" class="btn float-right login_btn" >
          </div>
          <div class="form-group">
            <a href={{ route('home') }}><input type="button" value="Volver" class="btn float-right login_btn"></a>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>




@endsection
