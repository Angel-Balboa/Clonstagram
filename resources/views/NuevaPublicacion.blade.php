@extends('pagina-master')
@section('contenido')
<form method="post" action="{{ url('/pub') }}" enctype="multipart/form-data">
    @csrf
    <input name="perfil_id" id="perfil_id" class="form-control" type="hidden" value="{{Auth::user()->id}}">
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

<div class="d-flex justify-content-center mt-5">
    <div class="btn btn-mdb-color btn-rounded float-left">
        <input type="file" name="Imagen" id="Imagen" accept="image/*">
    </div>
</div>
<button type="submit">SUBIR PUBLICACION</button>
</form>
@endsection