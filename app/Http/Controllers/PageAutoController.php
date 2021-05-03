<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageAutoController extends Controller
{
    public function index()
    {
        $marcas = Http::get('http://localhost:51430/api/marca');
        $estilos = Http::get('http://localhost:51430/api/estilo');
        $transmisiones = Http::get('http://localhost:51430/api/transmision');
        $colorexteriores = Http::get('http://localhost:51430/api/colorexterior');
        $colorinteriores = Http::get('http://localhost:51430/api/colorinterior');
        

        $lista = Http::get('http://localhost:51430/api/vehiculo/allinfo');
        return view('principal', ['lista'=>$lista->json(),   'marcas' => $marcas->json(), 'estilos' => $estilos->json(),
        'transmisiones' => $transmisiones->json(), 'colorExteriores' => $colorexteriores->json(), 'colorInteriores' => $colorinteriores->json()
        ]);
    }
}
