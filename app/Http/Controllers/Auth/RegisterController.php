<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'lastName' => $data['lastName'],
            'password' => Hash::make($data['password']),
        ]);

        // TODO: La respuesta secreta se guarda en la tabla de usuarios encriptada igual que la password
        // RespuestaSecreta::create([
        //     'user_id' => $user->id,
        //     'preguntas_secretas_id' => $data['pregunta_secreta'],
        //     'respuesta' => $data['respuesta_secreta']
        // ]);

        return $user;
    }

    protected function formularioDeRegistro(){

        $preguntasSecretas = DB::table('preguntas_secretas')->get();

        return view('auth.register', ["preguntas_secretas"=>$preguntasSecretas]);
    }
}
