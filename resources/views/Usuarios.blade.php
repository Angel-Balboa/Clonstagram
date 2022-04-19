@extends('pagina-master')
@section('contenido')


@foreach($perfiles as $perfil)
<span>{{$perfil['name'];}}</span> <span> {{$perfil['apellido'];}}</span>
<a href="perfiles/{{$perfil['id'];}}">{{$perfil['nombreusuario'];}}</a><br><br>
@endforeach
@endsection
