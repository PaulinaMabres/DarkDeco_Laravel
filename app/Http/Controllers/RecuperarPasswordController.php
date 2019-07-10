<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarPasswordController extends Controller
{
    public function index()
    {
        return view("recuperarpassword");
    }

    public function recuperar()
    {
        // Usuario pone su nombre
        
        

        /**
         * 1 - Usuario pone su nombre
         * 2 - Validamos que el usuario exista.
         * 3 - Obtenemos la pregunta secreta para el usuario y mostramos la vista para que coloque la respuesta.
         * 4 - Validamos la respuesta ingresada por el usuario.
         * 5 - Mostramos el formulario de reinicio de contraseña.
         * 6 - Reiniciamos password
         */

        return view("home");
    }
}
