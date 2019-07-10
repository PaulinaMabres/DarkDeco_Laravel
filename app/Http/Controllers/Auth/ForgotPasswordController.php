<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\RespuestaSecreta;
use App\PreguntaSecreta;
use Illuminate\Http\Request;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email'), $this->resetNotifier()
        );
        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }
        // If an error was returned by the password broker, we will get this message
        // translated so we can notify a user of the problem. We'll redirect back
        // to where the users came from so they can attempt this process again.
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    public function mostrarFormularioDeReinicio(){
        return view('recuperarpassword');
    }

    public function reiniciarPassword(Request $request){
        
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'respuestaSecreta' => ['required','string', 'max:255']
        ]);

        $usuario = DB::table('users')->where('email', $validatedData['email'])->first();

        if($usuario == null)
        { 
            return back()->withErrors(['email' => 'No existe usuario con este correo']);
        }
        
        $preguntasSecretas = DB::table('respuesta_secretas')->where([
            ['user_id', '=', $usuario->id],
            ['respuesta', '=', $validatedData['respuestaSecreta'] ]
        ])->first();

        if($preguntasSecretas == null)
        {
            return back()->withErrors(['respuesta_secretas' => 'Tu respuesta es incorrecta']);
        }

        DB::table('users')->where('id', $usuario->id)->update(['password' => Hash::make( $validatedData['password'])]);
        
        return redirect()->route('home');
    }




}
