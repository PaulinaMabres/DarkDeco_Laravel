@extends('default')

@section('head')
  <link rel="stylesheet" href="css/login.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
          @if ($errors->any())
    <div class="alert alert-danger">
      
      <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
    </div>
    @endif


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
                  <input  id="lastName" type="text" class="form-control" name="lastName" placeholder="tu apellido" aria-label="tu apellido" aria-describedby="basic-addon1" id="lastName" value="{{ old('lastName') }}">
                  @error('lastName')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <div class="input-group mb-3">
                  <select id="city" type="text" class="form-control" name="city" placeholder="tu localidad" aria-label="tu localidad" aria-describedby="basic-addon1" id="city">
                    @foreach($cities as $city)
                      <option id="item" value="{{$city->id}}">{{$city->cityName}}</option>
                    @endforeach
                  </select>
                  @error('city')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <input id="address" type="text" class="form-control" name="address" placeholder="tu dirección" aria-label="tu address" aria-describedby="basic-addon1" id="address" value="{{ old('address') }}">
                  @error('address')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <input id="phone" type="text" class="form-control" name="phone" placeholder="tu teléfono" aria-label="tu teléfono" aria-describedby="basic-addon1" id="phone" value="{{ old('phone') }}">
                  @error('phone')
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
            <input id="image" type="file" class="file-input" name="image" id="image" placeholder="tu foto de perfil" aria-label="tu foto de perfil" aria-describedby="basic-addon1" value="{{ old('file') }}">
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
              <select class="selectPregunta" name="secretQuestion" id="secretQuestion">
                @foreach($secretQuestions as $question)
                  <option id="item" value="{{$question->id}}">{{$question->question}}</option>
                @endforeach
              </select>
              @error('secretQuestion')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="secretAnswer" placeholder="Resp. secreta: nombre de tu esc. primaria" aria-label="RespuestaSecreta" aria-describedby="basic-addon1" id="secretAnswer" >

            </div>
          </div>

          <div class="form-group">
            <input type="submit" value="Confirmar" class="btn float-right login_btn"  onClick="validateForm(event)">
          </div>
          <div class="form-group">
            <a href={{ route('home') }}><input type="button" value="Volver" class="btn float-right login_btn"></a>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>



<script src="/js/register.js"> </script>



@endsection
