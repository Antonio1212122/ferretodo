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
            <input type="text" maxlength="50"
                class="form-control @error('nombre') is-invalid @enderror"
                name="nombre"
                id="nombre"
                placeholder="Ingrese el nombre completo"
                value="{{ old('nombre') }}"
                required autofocus>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-6">
            <label for="puesto">Puesto:</label>
            <input type="text" maxlength="50"
                class="form-control @error('puesto') is-invalid @enderror"
                name="puesto"
                id="puesto"
                placeholder="Ingrese el puesto"
                value="{{ old('puesto') }}"
                required>
            @error('puesto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="telefono">Teléfono:</label>
            <input type="text" maxlength="10" pattern="\d{10}"
                class="form-control @error('telefono') is-invalid @enderror"
                name="telefono"
                id="telefono"
                placeholder="Ingrese el teléfono (10 dígitos)"
                value="{{ old('telefono') }}"
                required
                title="El teléfono debe contener exactamente 10 dígitos numéricos">
            @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-6">
            <label for="email">Email:</label>
            <input type="email" maxlength="50"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                id="email"
                placeholder="Ingrese el email"
                value="{{ old('email') }}"
                required>
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
