@extends('default')

@section('head')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('contenidoBody')

<div class="container login"  id="restore">

		<div class="d-flex justify-content-center h-100 headerEspacio">
			<div class="card">
				<div class="card-header">
					<h1>Recuperar contraseña</h1>
					<div class="imagen" >
						<a href="home.php">
							<img src="images/logoNuevo.png" alt="logo" width="100px" height="100px">
						</a>
					</div>

				</div>
				<div class="card-body">
					<form class="form-login" action="{{ route('recuperarpassword') }}" method="post" enctype="multipart/form-data">
                        @csrf
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder="correo" name="email" >
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-question"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder= 'respuesta secreta' name="respuestaSecreta" >
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="nueva contraseña" name="contrasenia">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="confirmar contraseña" name="confirmarContrasenia">
						</div>
						
						<div class="form-group">
							<input type="submit" value="Restaurar" class="btn float-right login_btn">
						</div>
						<div class="form-group">
							<a href="login.php"><input type="button" value="Volver" class="btn float-right login_btn"></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>


@endsection