@extends('pagina-master')
@section('contenido')

<?php 

use App\Models\User;
use App\Models\Publicacion;
use App\Models\Seguidores;
use App\Models\Perfil;
$id= Auth::user()->id;
$existe=Perfil::where('id_usuario','=',$id)->get();
if(count($existe)==0){
    $perfil=['id_usuario'=>$id,'titulo'=>'Mi perfil instaclon','Descripcion'=>'HOLAAAAAA'];
    Perfil::insert($perfil);
}
?>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="/new">Nueva Publicacion</a>
            </div>
            <div class="col-md-4">
            <?php 
            
                $seg=Seguidores::where('follower_id','=',$id)->get();
                foreach ($seg as $s){
                    $actp=Perfil::where('id','=',$s['following_id'])->get();

                    foreach ($actp as $per)
                    {
                        $usuarioa=User::where('id','=',$per['id_usuario'])->get();
                        foreach ($usuarioa as $sus)
                        {
                            $publicacion=Publicacion::where('perfil_id', '=', $sus['id'])->get();
                            foreach($publicacion as $p){
                                ?>
                            <a href="perfiles/{{$sus['id']}}"><?php echo $sus['nombreusuario'];?></a>
                            <h2>{{$p['Titulo'];}}</h2>
                            <div class="col-3 mr-5 mt-5"> <!-- Se cambia el src de la imagen -->
                            <img src="{{ asset('storage').'/'.$p['Imagen'] }}" class="img-fluid d-block w-100" alt="...">
                            <span>{{$p['Descripcion'];}}</span>
                            </div>
                            <?php
                            }   
                        }
                    }
                }
                ?>
                <span></span>
            </div> 
            <div class="col-md-4">
            <form action="/resultados" method="get">
            @csrf  
                <span>Nombre de Usuario:</span>
                <input type="text" name="usuario" id="usuario">
                <input type="submit" value="Buscar" />
            </form>
            </div>    
        </div>
    </div>
</main>
@endsection
