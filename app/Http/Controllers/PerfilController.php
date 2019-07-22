<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\SecretQuestion;
use App\User;
use App\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $banks = Bank::all();

        return view('perfil.perfil', ["preguntas_secretas"=>$preguntasSecretas,
            "cities" => $localidades,
            "banks" => $banks,
            'user' => auth()->user()
        ]);
    }

      /**
     * GET: /perfil/editarPerfil
     */
    public function editarPerfil(){
        $preguntasSecretas = SecretQuestion::all();
        $localidades = City::all();
        $banks = Bank::all();
        return view('perfil.editarperfil', [
            "preguntas_secretas"=>$preguntasSecretas,
            "cities" => $localidades,
            "banks" => $banks,
            'user' => auth()->user()
        ]);
    }
    /**
     * Post: /perfil/actualizarPerfil
     */
    public function update( Request $request ){
        $usuario = auth()->user();
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'bank' =>['required','string','max:255'],
            'cardNumber' =>['required','string','max:16'],
        ]);
        User::where('id', $usuario->id)->update(
        [
            'name' => $validatedData['name'],
            'lastName' => $validatedData['lastName'],
            // 'email' => $validatedData['email'],
            // 'password' => $validatedData['password'],
            'city_id' => $validatedData['city'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            // 'image' => $validatedData['image'],
            // 'secretAnswer' => $validatedData['secretAnswer'],
            // 'secretQuestion' => $validatedData['secretQuestion']
            'bank_id'=>$validatedData['bank'],
            'cardNumber'=>$validatedData['cardNumber'],
        ]);
        return redirect('/perfil');
    }

    /**
     * GET: /perfil/editarcontraseña
     */
    public function editarContraseña(){
        $preguntasSecretas = SecretQuestion::all();
        
        return view('perfil.editarcontraseña',[
            "preguntas_secretas"=>$preguntasSecretas,
            'user' => auth()->user()   
        ]);
    }
    
    /**
     * POST: /perfil/actualizarcontraseña
     */
    public function actualizarContraseña(Request $request){
        $usuario = auth()->user();
        $validatedData = $request->validate([
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' =>  ['required', 'string', 'min:8', 'confirmed'],
            'secretAnswer' => ['required','string', 'max:255'],
            'secretQuestion' => ['required'],

        ]);
        
        if(  Hash::check( $validatedData['oldPassword'] ,  $usuario->password ) ){
            User::where('id', $usuario->id)->update(
                [  
                    'password' => Hash::make( $validatedData['password'] ),
                    'secretAnswer' => Hash::make( $validatedData['secretAnswer'] ),
                    'secretQuestion_id' => $validatedData['secretQuestion']
                ]);
                return redirect('/perfil');
        } else{
            return back()->withErrors(['oldPassword' => 'Su contraseña es incorrecta']);
        }

     
    }


}
