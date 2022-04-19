<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionesController extends Controller
{
    public function getAll()
    {
        $publicaciones = Publicacion::all();
        return response()->json($publicaciones);
    }


    public function find($id) 
    {
        $publicacion = Publicacion::find($id);
        if (empty($publicacion))
            return response()->json(['message' => 'Publicacion no encontrada.'], 404);
        return response()->json($publicacion);
    }

    public function create(Request $req)
    {
        //return Publicacion::create($req->all());
        $publicacion = new Publicacion();
        $publicacion->titulo = $req->titulo;
        $publicacion->contenido = $req->contenido;
        $publicacion->autor = $req->autor;
        $publicacion->fecha_publicacion = $req->fecha_publicacion;
        $publicacion->save();
        return response()->json($publicacion, 201);
    }

    public function update(Request $req, $id)
    {
        $publicacion = Publicacion::find($id);
        if (empty($publicacion))
            return response()->json(['message' => 'Publicacion no encontrada'], 404);
        $publicacion->titulo =  is_null($req->titulo) ? 
                $publicacion->titulo : $req->titulo;
        $publicacion->contenido = is_null($req->contenido) ? 
                $publicacion->contenido : $req->contenido;
        $publicacion->fecha_publicacion = is_null($req->fecha_publicacion) ?
                $publicacion->fecha_publicacion : $req->fecha_publicacion;
        $publicacion->save();
        return response()->json($publicacion);
    }

    public function delete($id)
    {
        $publicacion = Publicacion::find($id);
        if (empty($publicacion))
            return response()->json(['message' => 'Publicacion no encontrada'], 404);
        $publicacion->delete();
        return response()->json(['message' => 'Publicacion borrada']);
    }
}
