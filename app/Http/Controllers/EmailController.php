<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function contact(Request $request){
        try {
            if($request->action=='local'){
                $subject = $request->asunto;
                $for = $request->destinatario;
                $from = json_decode(\Request::cookie('usuario'),true)['correo'];
                Mail::send('mail.contacto_correo',$request->all(), function($msj) use($subject,$for,$from){
                    $msj->from($from,$subject);
                    $msj->subject($subject);
                    $msj->to($for);
        
                });
                return redirect()->back();
            }else{
                $subject = $request->asunto;
                $for = $request->destinatario;
                $from = $request->correo;
                Mail::send('mail.contacto_correo',$request->all(), function($msj) use($subject,$for,$from){
                    $msj->from($from,$subject);
                    $msj->subject($subject);
                    $msj->to($for);
        
                });
                return redirect()->back();
            }
       
   
        } catch (\Throwable $th) {
            echo $th->getMessage();
        } 
    }


    //registro
    public function info(){
        try {
            
        $usuario = Http::get('http://localhost:51430/api/vendedor/-1')->json();
        $subject = "¡Hola ".$usuario['nombre'].", usted ha sido registrado a CRAutos!";
        $for = $usuario['correo'];
        $from = 'crautos@gmail.com';

        Mail::send('mail.login_email',['usuario'=>$usuario], function($msj) use($subject,$for,$from){
            $msj->from($from,$subject);
            $msj->subject($subject);
            $msj->to($for);

        });
        $response = Http::get('http://localhost:51430/api/vendedor/-1');
       
        return redirect()->to('/user')->withCookie(cookie('usuario', $response, time() + (24 * 60 * 60)));
   
        //return redirect()->back();
   
        } catch (\Throwable $th) {
            echo $th->getMessage();
        } 
    }
    

}
