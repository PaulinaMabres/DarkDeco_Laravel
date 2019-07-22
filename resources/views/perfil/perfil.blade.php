@extends('default')

@section('head')
<link rel="stylesheet" href="/css/login.css">
@endsection


@section('contenidoBody')
<div class="container perfil" id="perfil">
    <div class="d-flex justify-content-center h-100 headerEspacio">
        <div class="card">
            <div class="card-header">
                <h1>Perfil</h1>
            </div>
            <div class="imagen">
                <a href="home.php">
                    <img src="/images/logoNuevo.png" alt="logo" width="100px" height="100px">
                </a>
            </div>
            <div class="card-body">
                    <div class="card col-md-6">
                        <div class="card-header">
                            <h2>Información Personal:</h2>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label form-control-label"> Nombre</label>
                            <div class="input-group col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus
                                    placeholder="tu nombre" readonly>
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label form-control-label"> Apellido</label>
                            <div class="input-group col-md-8">
                                <input type="text" class="form-control" name="lastName" placeholder="tu apellido"
                                    aria-label="tu apellido" aria-describedby="basic-addon1" id="lastName" value="{{ old('lastName', $user->lastName) }}" readonly>
                                @error('lastName')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 col-form-label form-control-label"> Localidad </label>
                            <div class="input-group col-md-8">
                                <select type="text" class="form-control" name="city" placeholder="tu localidad"
                                    aria-label="tu localidad" aria-describedby="basic-addon1" id="city" disabled>
									<option id="item" value=""></option>
									@foreach($cities as $city)
                                    <option id="item" value="{{$city->id}}"
                                        @if ($city->id == $user->city_id )
                                        selected="selected"
                                        @endif
                                    >{{$city->cityName}}</option>
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
                            <label class="col-md-4 col-form-label form-control-label"> Domicilio </label>
                            <div class="input-group col-md-8">
                                <input type="text" class="form-control" name="address" placeholder="tu domicilio"
                                    aria-label="tu domicilio" aria-describedby="basic-addon1" id="address" value="{{ old('address', $user->address) }}" readonly>
                                @error('address')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-md-4 col-form-label form-control-label"> Teléfono </label>
                            <div class="input-group col-md-8">
                                <input type="text" class="form-control" name="phone" placeholder="tu teléfono"
                                    aria-label="tu teléfono" aria-describedby="basic-addon1" id="phone" value="{{ old('address', $user->phone) }}"  readonly>
                                @error('phone')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
						</div>
						<div class="form-group">
								<label class="col-md-4 col-form-label form-control-label"> E-mail </label>
								<div class="input-group col-md-8">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
										name="email" value="{{ old('email',$user->email) }}" required autocomplete="email"
										placeholder="tu email" readonly>
			
									@error('email')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<a href={{ route('editarContraseña') }}><input type="button" value="Editar Contraseña" class="btn float-right login_btn"></a>
                    </div>
            
            <div class="card col-md-6">
                <div class="card-header ">
                    <h2>Medios de pago </h2>
                </div>
				<div class="form-group">
						<label class="col-md-4 col-form-label form-control-label"> Banco </label>
						<div class="input-group col-md-8">
							<select type="text" class="form-control" name="city" 
								aria-label="tu banco" aria-describedby="basic-addon1" id="bank" disabled>
								<option id="item" value=""></option>
									@foreach($banks as $bank)
									<option id="item" value="{{$bank->id}}"
										@if ($bank->id == $user->bank_id )
										selected="selected"
										@endif
									>{{$bank->bankName}}</option>
								
								@endforeach
							</select>
							@error('banco')
							<span class="invalid-feedback d-block" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
				<div class="form-group">
						<label class="col-md-4 col-form-label form-control-label">Número De Tarjeta </label>
						<div class="input-group col-md-8">
							<input id="cardNumber" type="number" class="form-control @error('cardNumber') is-invalid @enderror"
								name="cardNumber" value="{{ old('cardNumber',$user->cardNumber) }}" required autocomplete="cardNumber"
								placeholder="" readonly>
	
							@error('cardNumber')
							<span class="invalid-feedback d-block" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
				</div>
            </div>
        </div>
        <div class="form-group">
			
			<a href={{ route('editarPerfil') }}> <input type="button" value="Editar Perfil" class="btn float-right login_btn"> </a>
            <a href={{ route('home') }}><input type="button" value="Volver" class="btn float-right login_btn"></a>
        </div>
    </div>
    </div>
</div>
</div>




@endsection