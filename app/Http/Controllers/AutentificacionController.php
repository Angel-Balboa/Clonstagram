<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;

class AutentificacionController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function doLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('index')
                ->withSuccess('Autentificación correcta');
        }

        return back()->withInput($req->except('password'))
                ->withErrors(['email' => 'User or password incorrect']);
    }

    public function registroNuevoUsuario() {
        return view('registro-nuevo-usuario');
    }

    public function doRegistro(Request $req)
    {
        $req-> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'apellido' => 'required',
            'nombreusuario' => 'required',
            'password' => 'required|min:6'
        ]);

        $usuario = $this->crearUsuario($req->all());

        return redirect()->route('index');
    }

    public function crearUsuario(array $datos)
    {
        return User::create([
            'name' => $datos['name'],
            'apellido' => $datos['apellido'],
            'nombreusuario' => $datos['nombreusuario'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password'])
        ]);
    }
    public function following() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }
    
    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }
}
