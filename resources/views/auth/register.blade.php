@extends('default')

@section('contenidoBody')
<div class="container registro" id="registro">
		<div class="d-flex justify-content-center h-100 headerEspacio">
			<div class="card">
				<div class="card-header">
					<h1>Registro</h1>
				</div>
				<div class="imagen" >
					<a href="home.php">
						<img src="img/logoNuevo.png" alt="logo" width="100px" height="100px">
					</a>
				</div>
				<div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
						<div class="form-group">
							<div class="input-group mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="tu nombre">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						{{-- <div class="form-group">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="apellido" placeholder="tu apellido" aria-label="tu apellido" aria-describedby="basic-addon1" >
								
							</div>
						</div> --}}
						<div class="form-group">
							<div class="input-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tu email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						{{-- <div class="form-group">
							<div class="input-group mb-3">
								<input type="file" class="file-input" name="foto" placeholder="tu foto de perfil" aria-label="tu foto de perfil" aria-describedby="basic-addon1" value="">
								
							</div>
						</div> --}}
						<div class="form-group">
							<div class="input-group mb-3">
							
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
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
						{{-- <div class="form-group">
							<div class="input-group mb-3">
								<select class="selectPregunta" name="preguntaSecreta">
									<option id="item" value="a">Nombre de tu escuela primaria</option>
									<option id="item" value="b">Nombre de tu superhéroe favorito</option>
									<option id="item" value="c">Año de nacimiento de tu madre</option>
								</select>
								
								
							</div>
						</div> --}}

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
