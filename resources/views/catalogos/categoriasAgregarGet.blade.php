@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Categoría</h1>
    </div>
</div>

<form method="post" action="{{ url('catalogo/categorias/agregar') }}">
    @csrf

    <div class="row my-2">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50"
                name="nombre"
                id="nombre"
                placeholder="Ingrese el nombre de la categoría"
                class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre') }}"
                required autofocus>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-2">
        <div class="form-group">
            <label for="descripción">Descripción:</label>
            <textarea name="descripción"
                id="descripción"
                placeholder="Ingrese una descripción de la categoría"
                class="form-control @error('descripción') is-invalid @enderror"
                required>{{ old('descripción') }}</textarea>
            @error('descripción')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
