<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'localidad' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'mimes:jpeg,jpg,png','max:1000'],
            'respuesta_secreta' => ['required','string', 'max:255'],
            'pregunta_secreta' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $uploadedFile = $data['foto'];
        $fotoSubida = Storage::putFile("/public/perfil", $uploadedFile);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'lastName' => $data['lastName'],
            'city_id' => $data['localidad'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono'],
            'foto' => $fotoSubida,
            // 'numTarjeta' => $data['numTarjeta'],
            // 'banco' => $data['banco'],
            'password' => Hash::make($data['password']),
            'pregSecreta_id' => $data['pregunta_secreta'],
            'respSecreta' => Hash::make($data['respuesta_secreta']),
            
        ]);
        return $user;
    }

    protected function formularioDeRegistro(){

        $preguntasSecretas = DB::table('preguntas_secretas')->get();
        $localidades = City::all();
        return view('auth.register', ["preguntas_secretas"=>$preguntasSecretas,
            "localidades" => $localidades
        ]);
    }
}
