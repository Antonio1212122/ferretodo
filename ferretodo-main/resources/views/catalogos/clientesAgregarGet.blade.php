@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent
<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Clientes</h1>
    </div>
    <div class="col"></div>
</div>
<form method="post" action="{{url('catalogo/clientes/agregar')}}">
    @csrf
    <div class="row my-2">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50" name="nombre" id="nombre" placeholder="Ingrese el nombre del cliente" class="form-control" required autofocus>
        </div>
    </div>
    <div class="row my-2">
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" maxlength="50" name="apellido" id="apellido" placeholder="Ingrese el apellido del cliente" class="form-control" required>
        </div>
    </div>
    <div class="row my-2">
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" maxlength="100" name="direccion" id="direccion" placeholder="Ingrese la dirección del cliente" class="form-control" required>
        </div>
    </div>
    <div class="row my-2">
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" maxlength="15" name="telefono" id="telefono" placeholder="Ingrese el teléfono del cliente" class="form-control" required>
        </div>
    </div>
    <div class="row my-2">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" maxlength="50" name="email" id="email" placeholder="Ingrese el email del cliente" class="form-control" required>
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