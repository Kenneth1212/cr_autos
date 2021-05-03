<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicacionController extends Controller
{
    public function index(){
        if (isset($_COOKIE['usuario'])) {
            $lista = Http::get('http://localhost:51430/api/vehiculo/allinfo');
             return view('vehiculo.publicaciones',['lista'=>$lista->json()]);
            }else{
                return redirect()->to('/');
            } 
    }

    public function update(Request $request){
        Http::put('http://localhost:51430/api/vehiculo/vendido?id='.$request->id);
        $flag = Http::get('http://localhost:51430/api/vehiculo/'.$request->id);
        return ['flag'=>$flag->json()['vendido'],'id'=>$request->id];
    }
}
