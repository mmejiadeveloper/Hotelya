<?php
namespace hotelya\Http\Controllers;
 
use hotelya\Http\Controllers\Controller;
use hotelya\Mail\Useractivation;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'usuario de quien recibe';
        $objDemo->demo_two = 'contraseña de quien recibe';
        $objDemo->sender = 'EsteHotel TEAM';
        $objDemo->receiver = 'El usuario que recibe';

 
        Mail::to("lanh03@hotmail.com")->send(new Useractivation($objDemo));
    }
}