@extends('default')

@section('head')
  <link rel="stylesheet" href="css/login.css">
@endsection

@section('contenidoBody')
	<div class="container login" id="login">

		<div class="d-flex justify-content-center h-100 headerEspacio">
			<div class="card">
				<div class="card-header">
					<h1>Iniciar Sesión</h1>
					<div class="imagen" >
						<a href="home.php">
							<img src="img/logoNuevo.png" alt="logo" width="100px" height="100px">
						</a>
					</div>

				</div>
				<div class="card-body">
					<form class="form-login" action="login.php" method="post" enctype="multipart/form-data">

						<div class="form-group social_login">
							<a class="btn btn-block btn-social btn-twitter">
								<span class="fab fa-twitter"></span> Ingresá con Twitter
							</a>
							<a class="btn btn-block btn-social btn-facebook">
								<span class="fab fa-facebook"></span> Ingresá con Facebook
							</a>
							<a class="btn btn-block btn-social btn-google">
								<span class="fab fa-google"></span> Ingresá con Google
							</a>
							<div class = "space">
								O
							</div>
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder="correo" name="email" value="">
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="contraseña" name="contrasenia">
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox" class= "remember" name="record" value="si">Recuérdame


						</div>
						<div class="form-group">
							<input type="submit" value="Ingresar" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						No tenés cuenta?<a href="register.php">Registrate</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="restore-pass.php">Olvidaste tu contraseña?</a>
					</div>

					<!-- <div class="d-flex justify-content-start social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div> -->
				</div>

			</div>
		</div>
	</div>
@endsection
