@extends('pagina-master')
@section('contenido')
<?php 
use App\Models\Perfil;
use App\Models\Seguidores;
use App\Models\Publicacion;
?>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
        <div class="col-md-4">

                        <?php
                        if(isset($perfil))
                        {
                            $id2=Auth::user()->id;
                            foreach ($datos as $dato){
                                $id=$dato['id_usuario'];
                                $titulo=$dato['titulo'];
                                $descripcion=$dato['descripcion'];
                            } 
                            if($id==$id2)
                        {?>
                            <a href="{{ url('/edit/'.$id) }}">Editar Perfil</a>
                        <?php 
                    }
                     }?>
                        </div>
            <div class="col-md-4">
                <span>
                    <?php 
                    if(isset($perfil))
                    {
                        foreach ($datos as $dato){
                            $id=$dato['id_usuario'];
                            $titulo=$dato['titulo'];
                            $descripcion=$dato['descripcion'];
                        }
                        $id2=Auth::user()->id;
                        $seguidores=Seguidores::where([['follower_id', '=', $id],['following_id', '=', $id2],])->get();
                        ?>
                        <form action="{{ url('/seguir') }}" method="POST">
                        <?php $estadofollow=Seguidores::where([['follower_id','=',$id2],['following_id','=',$id]])->get();
                        ?>  

                        @csrf
                        <button @if($id==$id2)
                        {
                            hidden="hidden"
                        }
                        @endif
                        >
                        <?php
                        if(count($estadofollow)==0){?>
                            Follow</button>
                            <input type="hidden" name="estado" id="estado" value="Agregar">
                        <?php }
                        else{ ?>
                            Unfollow</button>
                            <input type="hidden" name="estado" id="estado" value="Eliminar">

                        <?php }
                        ?>

                        <input type="hidden" id="id" name="id" value="{{$id}}">
                        <input type="hidden" id="id2" name="id2" value="{{$id2}}">
                        </form>
                        <h1>
                        <?php

                        echo $perfil['nombreusuario']." ";
                        echo $titulo;
                        ?>
                        </h1>
                        <br>
                        <h2>Descripcion:</h2>
                        <span><?php echo $descripcion; ?></span>
                        <br>
                        <br>
                        <h1>PUBLICACIONES:</h1>
                        <br>
                        <?php 
                         $publicacion=Publicacion::where('perfil_id', '=', $id)->get();
                         foreach ($publicacion as $pub){
                             ?>
                             <h2>{{$pub['Titulo'];}}</h2>
                            <div class="col-3 mr-5 mt-5"> <!-- Se cambia el src de la imagen -->
                                <img src="{{ asset('storage').'/'.$pub['Imagen'] }}" class="img-fluid d-block w-100" alt="...">
                            </div>
                             <?php
                         }
                        ?>
                        <div>
                            <div>
                                <img src="{{$perfil['Imagen']}}" alt="">
                            </div>
                        </div>
                    <?php
                        }
                    else
                    {
                        echo 'ESTE PERFIL NO EXISTE';
                    }
                    ?>
                </span>
            </div>        
        </div>
    </div>
</main>
@endsection