@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Editar Categoría</h1>
    </div>
</div>

<form method="post" action="{{ url('catalogo/categorias/editar/' . $categoria->id_categoria) }}">
    @csrf

    <div class="row my-2">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="50"
                name="nombre"
                id="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $categoria->nombre) }}"
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
                class="form-control @error('descripción') is-invalid @enderror"
                required>{{ old('descripción', $categoria->descripción) }}</textarea>
            @error('descripción')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>

@endsection
