@extends('pagina-master')
@section('contenido')
<?php $id=Auth::user()->id?>
<form method="post" action="{{ url('/editar/'.$id) }}">
    @csrf
    {{method_field('PATCH')}}
    <input name="id_usuario" id="id_usuario" class="form-control" type="hidden" value="{{Auth::user()->id}}">
<div class="row mb-3">
    <label for="Titulo" class="col-sm-4 col-form-label">Titulo: </label>
    <div class="col-sm-8">
        <input type="text" name="Titulo" id="Titulo" class="form-control" autofocus required>
    </div>
</div>
<div class="row mb-3">
    <label for="Descripcion" class="col-sm-4 col-form-label">Descripcion: </label>
    <div class="col-sm-8">
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" autofocus required>
    </div>
</div>

<button type="submit">ACTUALIZAR PERFIL</button>
</form>
@endsection