<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\SecretQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;

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


    public function ValidateRecuperarPasswordData( Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'secretAnswer' => ['required','string', 'max:255'],
           
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['messaje'=>$validator->errors()->all(),'errores'=>$validator->errors(),'valida'=>false]);
        }
        return response()->json(['messaje'=>'Tus campos son validos','valida'=>true]);
    }


    public function reiniciarPassword(Request $request){

        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'secretAnswer' => ['required','string', 'max:255']
        ],
            [
                'email.required' => 'El correo no puede estar vacio',
                'password.required' => 'El password no puede estar vacio',
                'secretAnswer.required' => 'La respuesta secreta no puede estar vacio'
            ]
        );

        $usuario = DB::table('users')->where('email', $validatedData['email'])->first();

        if($usuario == null)
        {
            return back()->withErrors(['email' => 'No existe usuario con este correo']);
        }

        if( Hash::check( $validatedData['secretAnswer'] ,  $usuario->secretAnswer ) )
        {

            DB::table('users')->where('id', $usuario->id)->update(['password' => Hash::make( $validatedData['password']) ]);

            if ( Auth::attempt( ['email' => $validatedData['email'], 'password' => $validatedData['password']], true ) )
            {
                return redirect()->route('home');
            }
            else{
                return redirect()->route('anonimo');
            }


        }
        else
        {
            return back()->withErrors(['respuesta_secretas' => 'Tu respuesta es incorrecta']);
        }
    }




}
