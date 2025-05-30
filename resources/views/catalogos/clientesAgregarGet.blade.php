@extends("components.layout")

@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Cliente</h1>
    </div>
</div>

<form method="post" action="{{ url('catalogo/clientes/agregar') }}">
    @csrf

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50"
                class="form-control @error('nombre') is-invalid @enderror"
                name="nombre" id="nombre"
                placeholder="Ingrese el nombre"
                value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-6">
            <label for="apellido">Apellido:</label>
            <input type="text" maxlength="50"
                class="form-control @error('apellido') is-invalid @enderror"
                name="apellido" id="apellido"
                placeholder="Ingrese el apellido"
                value="{{ old('apellido') }}" required>
            @error('apellido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="direccion">Dirección:</label>
            <input type="text" maxlength="100"
                class="form-control @error('direccion') is-invalid @enderror"
                name="direccion" id="direccion"
                placeholder="Ingrese la dirección"
                value="{{ old('direccion') }}" required>
            @error('direccion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-6">
            <label for="telefono">Teléfono:</label>
            <input type="text" maxlength="10" pattern="\d{10}"
                class="form-control @error('telefono') is-invalid @enderror"
                name="telefono" id="telefono"
                placeholder="Ingrese el teléfono (10 dígitos)"
                value="{{ old('telefono') }}" required
                title="El teléfono debe contener exactamente 10 dígitos numéricos">
            @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="email">Email:</label>
            <input type="email" maxlength="50"
                class="form-control @error('email') is-invalid @enderror"
                name="email" id="email"
                placeholder="Ingrese el email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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