@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent
<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Empleado</h1>
    </div>
</div>
<form method="post" action="{{url('catalogos/empleados/agregar')}}">
    @csrf
    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50" class="form-control" name="nombre" placeholder="Ingrese el nombre completo" id="nombre" required autofocus>
        </div>
        <div class="form-group mb-3 col-6">
            <label for="puesto">Puesto:</label>
            <input type="text" maxlength="50" class="form-control" name="puesto" placeholder="Ingrese el puesto" id="puesto" required>
        </div>
    </div>
    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="telefono">Teléfono:</label>
            <input type="text" maxlength="15" class="form-control" name="telefono" placeholder="Ingrese el teléfono" id="telefono" required>
        </div>
        <div class="form-group mb-3 col-6">
            <label for="email">Email:</label>
            <input type="email" maxlength="50" class="form-control" name="email" placeholder="Ingrese el email" id="email" required>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection