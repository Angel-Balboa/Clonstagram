<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Seguidores;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //
    public function index($id)
    {
        $pefil['perfil']=User::find($id);
        $datos['datos']=Perfil::where('id_usuario','=',$id)->get();
        return view('Perfil',$pefil,$datos);
    }    
    public function perfil(Request $request){
        $datos=request()->except('_token');
        $usuario=$datos['usuario'];
        $perfiles['perfiles']=User::where('nombreusuario','LIKE', '%' . $usuario . '%')->get();
        return view('Usuarios',$perfiles);
    }

    public function seguir(Request $request){
        $estado=request()->except('_token');
        if($estado['estado']=="Eliminar"){
            $estadofollow=Seguidores::where([['follower_id','=',$estado['id2']],['following_id','=',$estado['id']]])->delete();            
        }
        else{
            $preparar=['follower_id'=>$estado['id2'],'following_id'=>$estado['id']];
            Seguidores::insert($preparar);
        }
        return redirect('/');
    }

    public function editar($id){
        $datos['datos']=Perfil::where('id_usuario','=',$id)->get();
        return view('edicion',$datos);
    }

    public function updateperfil(Request $request, $id)
    {
        $datoperfil=request()->except('_token','_method');
        Perfil::where('id_usuario','=',$id)->update(['Titulo'=>$datoperfil['Titulo']]);
        Perfil::where('id_usuario','=',$id)->update(['descripcion'=>$datoperfil['Descripcion']]);
        #return response()->json($peri);
        return redirect('/');
    }
}
