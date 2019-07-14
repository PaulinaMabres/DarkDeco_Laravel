<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\PreguntaSecreta;
class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $preguntasSecretas = PreguntaSecreta::all();
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
            'localidad' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'mimes:jpeg,jpg,png','max:1000'],
            'respuesta_secreta' => ['required','string', 'max:255'],
            'pregunta_secreta' => ['required'], 
        ]);

        DB::table('users')->where('id', $usuario->id)->update(
        [
            // 'name' => $validatedData['name'],
            // 'lastName' => $validatedData['lastName'],
            // 'email' => $validatedData['email'],
            // 'password' => $validatedData['password'],
            'localidad' => $validatedData['localidad'],
            'domicilio' => $validatedData['domicilio'],
            'telefono' => $validatedData['telefono'],
            'foto' => $validatedData['foto'],
            'respuesta_secreta' => $validatedData['respuesta_secreta'],
            'pregunta_secreta' => $validatedData['pregunta_secreta']
        ]);

    }

    // public function cambiarContraseña()
}
