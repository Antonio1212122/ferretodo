@extends("components.layout")

@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Editar Producto</h1>
    </div>
</div>

<form method="post" action="{{ url('catalogo/productos/editar/' . $producto->id_producto) }}">
    @csrf

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="nombre">Nombre:</label>
            <input type="text" maxlength="100"
                class="form-control @error('nombre') is-invalid @enderror"
                name="nombre" id="nombre"
                value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-6">
            <label for="descripción">Descripción:</label>
            <input type="text" maxlength="255"
                class="form-control @error('descripción') is-invalid @enderror"
                name="descripción" id="descripción"
                value="{{ old('descripción', $producto->descripción) }}">
            @error('descripción')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-4">
        <div class="form-group mb-3 col-4">
            <label for="cantidad">Cantidad:</label>
            <input type="number" min="0"
                class="form-control @error('cantidad') is-invalid @enderror"
                name="cantidad" id="cantidad"
                value="{{ old('cantidad', $producto->cantidad) }}" required>
            @error('cantidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-4">
            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" step="0.01" min="0"
                class="form-control @error('precio_unitario') is-invalid @enderror"
                name="precio_unitario" id="precio_unitario"
                value="{{ old('precio_unitario', $producto->precio_unitario) }}" required>
            @error('precio_unitario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3 col-4">
            <label for="precio_venta">Precio Venta:</label>
            <input type="number" step="0.01" min="0"
                class="form-control @error('precio_venta') is-invalid @enderror"
                name="precio_venta" id="precio_venta"
                value="{{ old('precio_venta', $producto->precio_venta) }}" required>
            @error('precio_venta')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row my-4">
        <div class="form-group mb-3 col-6">
            <label for="fk_id_categoria">Categoría:</label>
            <select name="fk_id_categoria" id="fk_id_categoria"
                class="form-control @error('fk_id_categoria') is-invalid @enderror" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}"
                        {{ old('fk_id_categoria', $producto->fk_id_categoria) == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('fk_id_categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endsection
