@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<h1 class="my-4">Editar Proveedor</h1>

<form method="post" action="{{ url('/catalogo/proveedores/editar/' . $proveedor->id_proveedor) }}">
    @csrf

    <div class="mb-3">
        <label for="nombre">Nombre del proveedor:</label>
        <input type="text" name="nombre" id="nombre" maxlength="100"
            value="{{ old('nombre', $proveedor->nombre) }}"
            class="form-control @error('nombre') is-invalid @enderror" required>
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
</form>

@endsection
