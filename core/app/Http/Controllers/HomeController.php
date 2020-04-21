<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;
use hotelya\User;

class HomeController extends Controller
{
    /**
     * 
     * Login Instructions - Step 1
     * 1. This is the first thing that happends when you application starts
     * 2. Middleware and auth process is executed, after then the request jumps inmediatly to logincontroller
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['main']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('/main');
          }else{
           return redirect('/login');
        }
    }

    public function main()
    {

        $user_name='Usuario anónimo';
        $user_email='Registrese para obtener un correo';
        $user_type=0;
        if(Auth::check()){
            $user_name = Auth::user()->username;
            $user_email = Auth::user()->email;
            $user_type = 1;
        }
        // return Redirect()->route('hoteles_administrar',compact("user_name","user_email","user_type"));
        return Redirect()->route('saludoInicial',compact("user_name","user_email","user_type"));
        //return view ("admin.dashboard",compact("user_name","user_email","user_type"));
    }

    
}
