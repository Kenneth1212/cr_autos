<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->stateless()->user();

        if (!$this->show($social_user->id)) {
            $response = Http::post('http://localhost:51430/api/vendedor', [
                'nombre' => $social_user->name,
                'correo' => $social_user->email,
                'telefono' => '',
                'direccion' => '',
                'avatar' => '',
                'providerId' => $social_user->id,
                'provider' => $provider,
            ]);
             //$response = Http::get('http://localhost:51430/api/vendedor/-1');

            // return redirect()->to('/user')->withCookie(cookie('usuario', $response, time() + (24 * 60 * 60)));
            return redirect()->to('/info');
        } else {
            
             $response = Http::get('http://localhost:51430/api/vendedor/' .$social_user->id);
            return redirect()->to('/')->withCookie(cookie('usuario', $response, time() + (24 * 60 * 60)));
        }
    }

    public function authAndRedirect($user)
    {
        //Auth::login($user, true);
        return redirect()->to('/home');
    }
    public function show($id)
    {
        $response = Http::get('http://localhost:51430/api/vendedor/' . $id);
        if ($response->json() != null) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user()
    {
        if (isset($_COOKIE['usuario'])) {
            return true;
        } else {
            return false;
        }
    }
    public function get_access()
    {
        if (!$this->get_user()) {
            return true;
        }
    }
    function get_access_login()
    {
        if ($this->get_user()) {
            header('Location: dashboard.php');
        }
    }

    public function logout()
    {
        setcookie('usuario', '', time() - 1000);
        unset($_COOKIE['usuario']);
        return redirect()->to('/');
    }
}
