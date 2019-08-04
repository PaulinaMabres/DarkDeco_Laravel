<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\SecretQuestion;
use App\User;
use App\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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

        return view('perfil.perfil', 
        [
            "preguntas_secretas"=>$preguntasSecretas,
            "cities" => $localidades,
            "banks" => $banks,
            'user' => auth()->user()
        ]);
    }
    public function actualizarImagen( Request $request){
        // Traes la informacion del usuario
        $user = auth()->user();
        $preguntasSecretas = SecretQuestion::all();
        $localidades = City::all();
        $banks = Bank::all();

        // Validas
        // dd($request);
        $validatedData = $request->validate([
            'imagenPerfil' => ['required', 'mimes:jpeg,jpg,png','max:1000'],
        ]);
        
        // Guardas la imagen en el disco
        $uploadedFile = $validatedData['imagenPerfil'];
        $imageUploaded = Storage::putFile("/public/perfil", $uploadedFile);
        
        // Actualizas el registro del usuario con la nueva imagen
        User::where('id', $user->id)->update(
        [
            'image' => $imageUploaded
        ]);

        return Redirect("/perfil");
        // return view('perfil.perfil', [
        //     'user' => auth()->user(),
        //     "preguntas_secretas"=>$preguntasSecretas,
        //     "cities" => $localidades,
        //     "banks" => $banks 
        // ] );
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


    public function ValidateEditarPerfilData( Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'bank' =>['required','string','max:255'],
            'cardNumber' =>['required','string','max:16'],
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['messaje'=>$validator->errors()->all(),'errores'=>$validator->errors(),'valida'=>false]);
        }
        return response()->json(['messaje'=>'Tus campos son validos','valida'=>true]);
    }


    public function ValidateEditarContraseñaData( Request $request){
        $validator = Validator::make($request->all(), [
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' =>  ['required', 'string', 'min:8', 'confirmed'],
            'secretAnswer' => ['required','string', 'max:255'],
            'secretQuestion' => ['required'],
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['messaje'=>$validator->errors()->all(),'errores'=>$validator->errors(),'valida'=>false]);
        }
        return response()->json(['messaje'=>'Tus campos son validos','valida'=>true]);
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
