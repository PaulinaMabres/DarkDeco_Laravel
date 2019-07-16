<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\SecretQuestion;
class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $preguntasSecretas = SecretQuestion::all();
        $localidades = City::all();
        return view('perfil', ["preguntas_secretas"=>$preguntasSecretas,
            "localidades" => $localidades
        ]);
    }

    public function guardarCambiosPerfil( Request $request ){
        $validatedData = $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'lastName' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:jpeg,jpg,png','max:1000'],
            'secretAnswer' => ['required','string', 'max:255'],
            'secretQuestion' => ['required'],
        ]);

        DB::table('users')->where('id', $usuario->id)->update(
        [
            // 'name' => $validatedData['name'],
            // 'lastName' => $validatedData['lastName'],
            // 'email' => $validatedData['email'],
            // 'password' => $validatedData['password'],
            'city' => $validatedData['localidad'],
            'address' => $validatedData['domicilio'],
            'phone' => $validatedData['telefono'],
            'image' => $validatedData['image'],
            'secretAnswer' => $validatedData['secretAnswer'],
            'secretQuestion' => $validatedData['secretQuestion']
        ]);

    }

    // public function cambiarContraseña()
}
