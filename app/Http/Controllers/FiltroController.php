<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class FiltroController extends Controller
{
    public function filtro(Request $request)
    {
        $marca = $request->marca==null?null:explode('/',$request->marca)[1];
        $modelo = $request->marca==null?null:$request->modelo;
        $estilo = $request->estilo==null?null:$request->estilo;
        $transmision = $request->transmision==null?null:$request->transmision; 
        $color_exterior = $request->colorExterior==null?null:$request->colorExterior;
        $color_interior = $request->colorInterior==null?null:$request->colorInterior;
        $combustible = $request->combustible==null?null:$request->combustible;
        $ano_inicio = $request->rango_ano==null?0:json_decode($request->rango_ano, true)['ai1'];
        $ano_final = $request->rango_ano==null?2020:json_decode($request->rango_ano, true)['af2'];
        $precio_inicio = $request->rango_precio==null?0:json_decode($request->rango_precio, true)['p1'];
        $precio_final = $request->rango_precio==null?500000000:json_decode($request->rango_precio, true)['p2'];
        $cilindraje = $request->cilindraje==null?10000000:$request->cilindraje;
        $puerta1 = $request->puertas==null?0:explode('-',$request->puertas)[0];
        $puerta2 = $request->puertas==null?10:explode('-',$request->puertas)[1];
        $order = $request->ordenar==null?'id':$request->ordenar;

        $arreglo = array('marca'=>$request->marca!=null?$request->marca:null,'modelo'=>$modelo,'estilo'=>$estilo,'transmision'=>$transmision,'color_exterior'=>$color_exterior,'color_interior'=>$color_interior,'combustible'=>$combustible,'ano_inicio'=>$ano_inicio,
        'ano_final'=>$ano_final,'precio_inicio'=>$precio_inicio,'precio_final'=>$precio_final,'cilindraje'=>$cilindraje,'puerta1'=>$puerta1,'puerta2'=>$puerta2,'order'=>$order,'checkpuertas'=>$request->puertas==null?'':$request->puertas); 

        $filtro = Http::get('http://localhost:51430/api/vehiculo/filtro?marca='.$marca.'&modelo='.$modelo.'&estilo='.$estilo.'&transmision='.$transmision.'&ce='.$color_exterior.'&ci='.$color_interior.'&combustible='.$combustible.'&ai='.$ano_inicio.'&af='.$ano_final.'&p1='.$precio_inicio.'&p2='.$precio_final.'&cilindraje='.$cilindraje.'&puerta1='.$puerta1.'&puerta2='.$puerta2.'&order='.$order);
 

        $marcas = Http::get('http://localhost:51430/api/marca');
        $modelos = Http::get('http://localhost:51430/api/modelo');
        $estilos = Http::get('http://localhost:51430/api/estilo');
        $transmisiones = Http::get('http://localhost:51430/api/transmision');
        $colorexteriores = Http::get('http://localhost:51430/api/colorexterior');
        $colorinteriores = Http::get('http://localhost:51430/api/colorinterior');
        $combustibles = Http::get('http://localhost:51430/api/combustible');


        return view('vehiculo.busqueda',['filtro'=>$filtro->json(),'config'=>$arreglo,   'marcas' => $marcas->json(), 'estilos' => $estilos->json(),
        'transmisiones' => $transmisiones->json(), 'colorExteriores' => $colorexteriores->json(), 'colorInteriores' => $colorinteriores->json(), 'combustibles' => $combustibles->json(),
        ]);
    }

 
}
