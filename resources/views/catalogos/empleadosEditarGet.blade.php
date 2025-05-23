@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<h1 class="my-4">Editar Empleado</h1>

<form method="post" action="{{ url('/catalogo/empleados/editar/' . $empleado->id_empleado) }}">
    @csrf

    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="50"
            value="{{ old('nombre', $empleado->nombre) }}"
            class="form-control @error('nombre') is-invalid @enderror" required>
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="puesto">Puesto:</label>
        <input type="text" name="puesto" id="puesto" maxlength="50"
            value="{{ old('puesto', $empleado->puesto) }}"
            class="form-control @error('puesto') is-invalid @enderror" required>
        @error('puesto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" maxlength="15"
            value="{{ old('telefono', $empleado->telefono) }}"
            class="form-control @error('telefono') is-invalid @enderror" required>
        @error('telefono')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" maxlength="50"
            value="{{ old('email', $empleado->email) }}"
            class="form-control @error('email') is-invalid @enderror" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
</form>

@endsection
