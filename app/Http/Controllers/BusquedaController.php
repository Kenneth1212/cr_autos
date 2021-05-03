<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BusquedaController extends Controller
{
    public function index()
    {
        $marcas = Http::get('http://localhost:51430/api/marca');
        return view('vehiculo.busqueda', ['marcas' => $marcas->json()]);
    }
    
    public function consulta(Request $request)
    {
        print_r($request->marca);
        exit;
    }
}
