<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use NumberFormatter;

class DeseadoController extends Controller
{
    public function index(){
        if (isset($_COOKIE['usuario'])) {
   
        $lista = Http::get('http://localhost:51430/api/vehiculo/deseados?id='.(json_decode(\Request::cookie('usuario'),true)['id']));
         return view('vehiculo.favoritos',['lista'=>$lista->json()]);
        }else{
            return redirect()->to('/');
        }
    }
    public function delete($id)
    {
        Http::delete('http://localhost:51430/api/deseado/'.$id);
    }
    public function insert($id1, $id2)
    {
        Http::post('http://localhost:51430/api/deseado', [
            'vehiculoId' => intval($id1),
            'vendedorId' => intval($id2),
        ]);
    }

    public function controlador(Request $request)
    {
        $id = $request->vehiculo_id;
        $id2 = $request->vendedor_id;

        if (!$this->consulta($id, $id2)) {
            $this->insert($id, $id2);
            $respuesta = ['id', 'resp' => true];
            return $respuesta;
        } else {
            $this->delete($this->consulta($id, $id2)['id']);
            $respuesta = ['id' => $request->vehiculo_id . $request->vendedor_id, 'resp' => false];
            return $respuesta;
        }
    }

    public function consulta($id1, $id2)
    {
        $response = Http::get('http://localhost:51430/api/deseado/' . intval($id1) . '/' . intval($id2));
        if ($response->json() != null) {
            return $response->json(); //existe
        } else {
            return false; //no existe
        }
    }

    public function init($id,$id2)
    {
        $response = Http::get("http://localhost:51430/api/deseado/".intval($id)."/".intval($id2));
        if ($response->json() != null) {
            return 'true'; //existe
        }else{
            return 'false'; //no existe
        }
        
    }
}
