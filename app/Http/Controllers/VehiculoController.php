<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Vehiculo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function vefificar()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!isset($_COOKIE['usuario'])) {
            return redirect()->to('/');
        } else {

            $carro = null;
            $ruta = 'vehiculo.store';
            $boton = 'Insertar';
            $icon = "create";
            $titulo = "Insertar vehículo";
            $marcas = Http::get('http://localhost:51430/api/marca');
            $modelos = Http::get('http://localhost:51430/api/modelo');
            $estilos = Http::get('http://localhost:51430/api/estilo');
            $transmisiones = Http::get('http://localhost:51430/api/transmision');
            $colorexteriores = Http::get('http://localhost:51430/api/colorexterior');
            $colorinteriores = Http::get('http://localhost:51430/api/colorinterior');
            $combustibles = Http::get('http://localhost:51430/api/combustible');
            $galeria = null;
            return view('vehiculo.insertar', [
                'marcas' => $marcas->json(), 'modelos' => $modelos->json(), 'estilos' => $estilos->json(),
                'transmisiones' => $transmisiones->json(), 'colorExteriores' => $colorexteriores->json(), 'colorInteriores' => $colorinteriores->json(), 'combustibles' => $combustibles->json(),
                'ruta' => $ruta, 'boton' => $boton, 'icon' => $icon, 'titulo' => $titulo, 'carro' => $carro, 'galeria' => $galeria
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($_COOKIE['usuario'])) {
            return redirect()->to('/');
        } else {

            $name = rand(10, 100) . rand(10, 150) . $request->id;;
            $perfil = '';

            if ($request->hasFile('perfil')) {
                $perfil = rand(10, 100) . rand(10, 150) . $request->id . $request->file('perfil')->getClientOriginalName();
                $request->file('perfil')->storeAs('public/carroperfil', $perfil);
            } else {
                $perfil = '';
            }


            $fecha_actual = date("Y-m-d");
            Http::post('http://localhost:51430/api/vehiculo', [
                "ano" => intval($request->ano),
                "precio" => intval($request->precio),
                "cilindraje" => intval($request->cilindraje),
                "cantidadPuertas" => intval($request->puertas),
                "recibe" => intval($request->recibe),
                "negociable" => intval($request->negociable),
                "fechaIngreso" => date("Y-m-d", strtotime($fecha_actual . "- 1 days")),
                "imgPrincipal" => $perfil,
                "vendido" => 0, //intval($request->estado)
                "vendedorId" => intval($request->id),
                "marcaId" =>  intval($request->marca),
                "modeloId" => intval($request->modelo),
                "estiloId" => intval($request->estilo),
                "transmisionId" => intval($request->transmision),
                "colorExteriorId" => intval($request->colorExterior),
                "colorInteriorId" => intval($request->colorInterior),
                "combustibleId" => intval($request->combustible)
            ]);

            $last = Http::get('http://localhost:51430/api/vehiculo/last');


            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $img) {
                    $img->storeAs('public/galeria', $name . $img->getClientOriginalName());
                    Http::post('http://localhost:51430/api/galeria', [
                        "url" => $name . $img->getClientOriginalName(),
                        "vehiculoId" => intval($last->json())
                    ]);
                }
            }




            return redirect()->route('vehiculo.edit', $last->json());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $carro = new Vehiculo((Http::get('http://localhost:51430/api/vehiculo/info?id=' . $id)->json()));
        $usuario = (Http::get('http://localhost:51430/api/vendedor/info?id=' . $carro->vendedorId)->json());
        $galeria = Http::get('http://localhost:51430/api/galeria/lista?id=' . $id)->json();

        return view('vehiculo.vehiculo', ['carro' => $carro, 'usuario' => $usuario, 'galeria' => $galeria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = new Vehiculo((Http::get('http://localhost:51430/api/vehiculo/' . $id)->json()));

        if (isset($_COOKIE['usuario']) && $carro->vendedorId == json_decode(\Request::cookie('usuario'), true)['id']) {
            // $carro = new Vehiculo((Http::get('http://localhost:51430/api/vehiculo/' . $id)->json()));
            $usuario = (Http::get('http://localhost:51430/api/vendedor/info?id=' . $carro->vendedorId)->json());
            $ruta = 'vehiculo.update';
            $icon = "edit";
            $boton = 'Actualizar';
            $titulo = "Editar vehículo";
            $marcas = Http::get('http://localhost:51430/api/marca');
            $modelos = Http::get('http://localhost:51430/api/modelo');
            $estilos = Http::get('http://localhost:51430/api/estilo');
            $transmisiones = Http::get('http://localhost:51430/api/transmision');
            $colorexteriores = Http::get('http://localhost:51430/api/colorexterior');
            $colorinteriores = Http::get('http://localhost:51430/api/colorinterior');
            $combustibles = Http::get('http://localhost:51430/api/combustible');

            $galeria = Http::get('http://localhost:51430/api/galeria/lista?id=' . $carro->id);

            return view('vehiculo.insertar', [
                'carro' => $carro, 'usuario' => $usuario, 'icon' => $icon, 'titulo' => $titulo,
                'marcas' => $marcas->json(), 'modelos' => $modelos->json(), 'estilos' => $estilos->json(),
                'transmisiones' => $transmisiones->json(), 'colorExteriores' => $colorexteriores->json(), 'colorInteriores' => $colorinteriores->json(), 'combustibles' => $combustibles->json(),
                'ruta' => $ruta, 'boton' => $boton, 'galeria' => $galeria->json(), 'config' => null
            ]);
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!isset($_COOKIE['usuario'])) {
            return redirect()->to('/');
        } else {

            $perfil = '';
            if ($request->hasFile('perfil')) {
                if ($request->img_original != '') {
                    Storage::delete('public/carroperfil/' . $request->img_original);
                }
                $perfil = rand(10, 100) . rand(10, 150) . $request->id . $request->file('perfil')->getClientOriginalName();
                $request->file('perfil')->storeAs('public/carroperfil', $perfil);
            } else {
                $perfil = $request->img_original;
            }

            Http::put('http://localhost:51430/api/vehiculo/' . $id, [
                "ano" => intval($request->ano),
                "precio" => intval($request->precio),
                "cilindraje" => intval($request->cilindraje),
                "cantidadPuertas" => intval($request->puertas),
                "recibe" => intval($request->recibe),
                "negociable" => intval($request->negociable),
                "fechaIngreso" => '',
                "imgPrincipal" => $perfil,
                //   "vendido" => 0, //intval($request->estado)
                "vendedorId" => intval($request->id),
                "marcaId" =>  intval($request->marca),
                "modeloId" => intval($request->modelo),
                "estiloId" => intval($request->estilo),
                "transmisionId" => intval($request->transmision),
                "colorExteriorId" => intval($request->colorExterior),
                "colorInteriorId" => intval($request->colorInterior),
                "combustibleId" => intval($request->combustible)
            ]);

            $name = rand(10, 100) . rand(10, 150) . $request->id;
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $img) {
                    $img->storeAs('public/galeria', $name . $img->getClientOriginalName());
                    Http::post('http://localhost:51430/api/galeria', [
                        "url" => $name . $img->getClientOriginalName(),
                        "vehiculoId" => intval($id)
                    ]);
                }
            }


            return redirect()->route('vehiculo.edit', $request->id_carro);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete_perfiles_carro($id); //eliminar fots perfil carro
        $this->delete_galeria($id); //eliminar galería
        Http::delete('http://localhost:51430/api/vehiculo/' . $id);
        
        return back();
    }
 
    public function delete_galeria($id)
    {
        $lista = Http::get('http://localhost:51430/api/galeria/lista?id=' . $id);
        if ($lista != null) {
            foreach ($lista->json() as $galeria) {
                Storage::delete('public/galeria/' . $galeria['url']);
            }
        }
    }
    public function delete_perfiles_carro($id)
    {
        $lista = Http::get('http://localhost:51430/api/vehiculo');
        if ($lista != null) {
            foreach ($lista->json() as $carro) {
                if ($carro['id'] == $id) { //si tiene carros
                    $url = $carro['imgPrincipal'];
                    Storage::delete("public/carroperfil/".trim($url));
                }
            }
        }
    }


    public function insert(Request $request)
    {
        echo json_encode($request->id);
    }
}
