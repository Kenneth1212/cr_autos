<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class PDFController extends Controller
{
    function imprimir($id){
        $carro = Http::get('http://localhost:51430/api/vehiculo/info?id=' . $id)->json();
        $usuario = (Http::get('http://localhost:51430/api/vendedor/info?id=' . $carro['vendedorId']));
        $galeria = Http::get('http://localhost:51430/api/galeria/lista?id=' . $id)->json();

        $pdf = App::make('dompdf.wrapper'); //Inicializo paquete
        $pdf->loadView('PDF.ficha',['carro'=>$carro,'usuario'=>$usuario, 'galeria'=>$galeria]); //Puedo llamar a los metodos
        return $pdf->download(); //stream() Para verlo en el navegador
    }
}
