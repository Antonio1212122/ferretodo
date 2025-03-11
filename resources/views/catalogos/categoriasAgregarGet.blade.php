@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent
<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Categoria</h1>
    </div>
    <div class="col"></div>
</div>
<form method="post" action="{{url('catalogo/categorias/agregar')}}">
    @csrf
    <div class="row my-2">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50" name="nombre" id="nombre" placeholder="Ingrese el nombre de la categoria" class="form-control" required autofocus>
        </div>
    </div>
    <div class="row my-2">
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" placeholder="Ingrese una descripción de la categoria" class="form-control" required></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection