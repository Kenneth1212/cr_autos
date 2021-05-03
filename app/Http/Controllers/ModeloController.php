<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModeloController extends Controller
{
    public function get_modelos($id){
        $modelos = Http::get('http://localhost:51430/api/modelo/bymarca?id='.$id);
        return $modelos->json();
    }
}
