<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Cookie;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\Cookie as FacadesCookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;

class UserController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }


    public function editar()
    {
        if (isset($_COOKIE['usuario'])) {
            return view('usuario.perfil');
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
    public function update(Request $request)
    {

        $img = "";
        if ($request->hasFile('avatar')) {
            Storage::delete('public/' . $request->avatar_actual);

            $nombre = $request->file('avatar')->getClientOriginalName();
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $name = $request->id . $nombre;
            $img = 'perfiles/' . $name;
            $path = $request->file('avatar')->storeAs(
                'public/perfiles',
                $name
            );
        } else {
            $img = $request->avatar_actual == '' ? '' : $request->avatar_actual;
        }

        //$request->file('avatar')->store('perfiles');
        $response = Http::put('http://localhost:51430/api/vendedor/' . $request->id, [
            "nombre" => $request->nombre,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "avatar" => $img,
        ]);

        return $this->back($request->id);
    }

    public function back($id)
    {
        $response = Http::get('http://localhost:51430/api/vendedor/info?id=' . $id);
        setcookie('usuario', '', time() - 1000);
        unset($_COOKIE['usuario']);
        return redirect()->to('user')->withCookie(cookie('usuario', $response, time() + (24 * 60 * 60)))->with('notificacion', '¡Perfil actualizado!');
    }

    public function delete_galeria($id)
    {
        $lista = Http::get('http://localhost:51430/api/vehiculo/allinfo');
        $galeria = Http::get('http://localhost:51430/api/galeria');
        if ($lista != null) {
            foreach ($lista->json() as $carro) {
                if ($carro['vendedorId'] == $id) { //si tiene carros
                    if ($galeria != null) {
                        foreach ($galeria->json() as $g) {
                            $vehiculoId = $carro['id']; //id del carro
                            if ($g['vehiculoId'] == $vehiculoId) {
                                $url =  $g['url'];
                                Storage::delete('public/galeria/' . $url);
                            }
                        }
                    }
                }
            }
        }
    }
    public function delete_perfiles_carro($id)
    {
        $lista = Http::get('http://localhost:51430/api/vehiculo');
        if ($lista != null) {
            foreach ($lista->json() as $carro) {
                if ($carro['vendedorId'] == $id) { //si tiene carros
                    $url = $carro['imgPrincipal'];
                    Storage::delete('public/carroperfil/'.trim($url));
                }
            }
        }
    } 

    public function destroy()
    {
        $usuario = json_decode(\Request::cookie('usuario'), true);

        $this->delete_perfiles_carro($usuario['id']); //eliminar fots perfil carro
        Storage::delete('public/' . $usuario['avatar']); //elimina el avatar
        $this->delete_galeria($usuario['id']); //eliminar galería
        Http::delete('http://localhost:51430/api/deseado/user?id=' . $usuario['id']); //eliminar favoritos
        Http::delete('http://localhost:51430/api/vendedor/' . $usuario['id']); //elimnar al user

        return redirect()->to('logout');
    }
}
