<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\User;

class ManageusersController extends Controller{

    public function identify_user(Request $request, $id){
        // $user_name='Usuario anónimo';
        // $user_email='Registrese para obtener un correo';
        // $user_type=0;
        // if($id){
        //     $user = User::find($id);
        //     $user_name = $user->username;
        //     $user_email = $user->email;
        //     $user_type = 1;
        // }
        // return view ("admin.dashboard",compact("user_name","user_email","user_type"));
        //return view ("admin.dashboard");
    }
}
