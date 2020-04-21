<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use hotelya\User;
use hotelya\Mail\OrderShipped;
use Auth;
use Session;
use hotelya\Mail\Useractivation;
use hotelya\Mail\Passwordrecovery;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\json_encode;
 

class LoginController extends Controller
{
    /**
     * Login Instructions - Step 2
     * 1. Auth middleware just was procceded and it came here
     * 2. This time middleware is doing other process but this time it seems to be doing some kind of exception to some method
     * *. Dont know exactly
     */
    public function __construct(){
        $this->middleware('auth', ['only' => ['logout']]);
    }

    /**
     * Login Instructions - Step 3
     * 1. Index is executed after the construct due to the web.php by the routhe request.
     * 2. Checks if users if logged and redirect to main page, otherwiese will call the login view.
     */
    public function index(){

        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('auth.login');
        }
    }

    /**
     * This method allows to check if the user logged exists and if hsi email verification is completly done
     * @param Request $request
     * @return void
     */
    public function login(Request $request){

        //Going to get the user who's trying to access by its email
        $user = User::where('email', $request->email)->first();
        //In this point we assume we have found the user by his email and exists in the database
        //but we need to know if he's giving the correct password
        if($user){

            //Check if the user has activated his/her account by email
            if($user->email_activation){
                $user_original_password = $user->password;
                $user_given_password = $request->password;
                //We need to check the given password against the original
                $does_match= Hash::check($user_given_password, $user_original_password);
                if($does_match){
                    Auth::login($user);
                    //return redirect()->route('identify_users', ['id' => $user->id]);
                    
                }else{
                    Session::flash('message-error', 'Los datos que ha ingresado son erroneos');
                }
            }else{
                Session::flash('message-error', 'Ingrese a su correo electronico y verifique el mensaje de activación de su cuenta. Si sigue teniendo problemas póngase en contacto con el administrador del sistema.');
            }
          
        }else{
            Session::flash('message-error', 'El correo que está ingresando no se encuentra registrado en nuestro sistema.');
        }
        return redirect()->back();

    }
    /**
     * This method just log out the user
     *
     * @return void
     */
    public function logout(){
        Session::forget('user');
        Auth::logout();
        return redirect('/');
    }
    
    /**
     * This method creates a new user
     * @param Request $request
     * @return void
     */
    public function register(Request $request){
        try{
            $does_exist = User::where("email",$request->email_r)->first();
            if($does_exist){
                Session::flash('message-error', 'El correo que está intentando registra ya existe en nuestra base de datos. Ingrese al sistema o recupere su contraseña');
            }else{
                $data = [
                    "_token"=>$request->_token,
                    "name"=>$request->username,
                    "email"=>$request->email_r,
                    "password"=>Hash::make($request->passwd),
                    "user_role"=>0,
                    "email_activation"=>0,
                    "user_state"=>1,
                ];
                $user_created = User::create($data);
                if($user_created){
                    $mailer = new \stdClass();
                    $mailer->user = $request->username;
                    $mailer->password = $request->passwd;
                    $mailer->link = url("/"). "/emailver/". base64_encode( "verification|". $request->name. "|". $request->password . "|". $request->email_r ."|email");
                    $mailer->sender = 'EsteHotel TEAM';
                    $mailer->receiver = $request->name;
                    Mail::to($request->email_r)->send(new Useractivation($mailer));
                    Session::flash('message-success', 'El usuario se ha registrado en el sistema. Verifique su correo electronico para finalizar el proceso de registro en el sistema.');
                }
            }
            
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        return redirect()->back();
        
        
    }
    /**
     * This method actives the register just after registration by sending an email
     *
     * @param Request $request
     * @param [type] $token
     * @return void
     */
    public function emailactivation(Request $request, $token){
        try{
            $data = (explode("|",base64_decode($token)));
            
            $user_email = $data[3];
            if($data[0]=="verification" && $data[4]=="email"){
                $user= User::where("email",$user_email)->first();
                if($user){
                    $user->update(['email_activation' => 1]);
                }
            }
        }catch(\Exception $e){

        }
        return redirect()->back();
    }
    
    public function passwordrestoration(Request $request){
        if($request->ajax()){
            $user = User::where('email', $request->email)->first();
            if($user){
                try{
                    $mailer = new \stdClass();
                    $mailer->link = url("/"). "/passwordrecovery/". base64_encode( "verification|"."|email|".$request->email);
                    $mailer->sender = 'EsteHotel TEAM';
                    $mailer->receiver = $user->name;
                    Mail::to($request->email)->send(new Passwordrecovery($mailer));
                    return json_encode(["message"=>"Hemos enviado un mensaje a su correo electronico para que reinice su contraseña.","type"=>"success"]);

                }catch(\Exception $e){

                }

            }else{
                return json_encode(["message"=>"El correo del usuario que ha ingresado no existe en nuestra base de datos.","type"=>"error"]);
            }
        }
    }

    public function passwordrecovery(Request $request,$token){

        try {
            $data = (explode("|",base64_decode($token)));
            // dd($data);
            $token_parte1 = $data[0];
            $token_parte2 = $data[2];
            $email = $data[3];
            $user = User::where('email', $email)->first();
            $user_email = $user->email;
            if($token_parte1 == "verification" && $token_parte2 == "email" ){
                return view("auth.passwords.reset",compact("user_email"));
                //return json_encode(["message"=>"Hemos enviado un mensaje a su correo electronico para que reinice su contraseña.","type"=>"success"]);
            }else{
                die("Esta intentando ingresar al sistema de una forma no permitida.");
            }
        } catch (\Throwable $th) {
             
        }

    }

    public function changepassword(Request $request){
        $datos = json_decode($_POST['data']); 
        try {
            $user = User::where('email', $datos->email)->first();
            if(User::where('email', $datos->email)->update(["password"=>Hash::make($datos->password)])){
                return json_encode(["message"=>"Se ha cambiado la contraseña de su cuenta.","type"=>1]);
            }else{
                return json_encode(["message"=>"Hubo un error al cambiar la contrasena","type"=>2]);
            }
        } catch (\Exception $th) {
            return json_encode(["message"=>$th->getMessage(),"type"=>2]);
        }

    }
}