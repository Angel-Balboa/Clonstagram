<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;


class PublicacionController extends Controller
{
    //
    public function create()
    {
        //
        return view('.NuevaPublicacion');
    }
    public function store(Request $request)
    {
        //
        $publicacion = request()->except('_token');
        if($request->hasFile('Imagen')){
            $publicacion['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        Publicacion::insert($publicacion);
        return redirect('/');
    }
        
}
