@extends('default')

@section('head')
<link rel="stylesheet" href="/css/login.css">
@endsection


@section('contenidoBody')
<div class="container registro passwordReset" id="registro">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="d-flex justify-content-center h-100 headerEspacio">
        <div class="card">
            <div class="card-header">
                <h1>Editar Contraseña</h1>
            </div>
            <div class="imagen">
                <a href="home.php">
                    <img src="/images/logoNuevo.png" alt="logo" width="100px" height="100px">
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('actualizarContraseña') }}" enctype="multipart/form-data">
                    @csrf
                        
                    <div class="form-group">
                            <label class="col-md-4 col-form-label form-control-label"> Contraseña Anterior</label>
                            <div class="input-group col-md-8">
                                <input id="oldPassword" type="password"
                                    class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required
                                    autocomplete="new-password" placeholder="contraseña">
        
                                @error('oldPassword')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                <div class="form-group">
                    <label class="col-md-4 col-form-label form-control-label"> Contraseña </label>
                    <div class="input-group col-md-8">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="contraseña">

                        @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-form-label form-control-label"> Repetir Contraseña </label>
                    <div class="input-group col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="confirmación de contraseña">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 col-form-label form-control-label"> Pregunta Secreta: </label>
                    <div class="input-group col-md-8">
                        <select class="form-control selectPregunta" name="secretQuestion" id="secretQuestion">
                            @foreach($preguntas_secretas as $pregunta)
                        <option id="item" value="{{$pregunta->id}}"
                            @if ($pregunta->id == $user->secretQuestion_id )
                                selected="selected"
                            @endif
                            >{{$pregunta->question}}</option>
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
                    <label class="col-md-4 col-form-label form-control-label"> Respuesta Secreta</label>
                    <div class="input-group col-md-8">
                        <input type="text" class="form-control" name="secretAnswer"
                            placeholder="Resp. secreta: nombre de tu esc. primaria" aria-label="RespuestaSecreta"
                            aria-describedby="basic-addon1" id="secretAnswer">
                            @error('secretAnswer')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>

            
                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn float-right login_btn">
                        <a href={{ route('home') }}><input type="button" value="Volver" class="btn float-right login_btn"></a>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>




@endsection