@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-4">
    <div class="form-group my-3">
        <h1 class="mb-4">Agregar Producto</h1>
    </div>

    <form method="post" action="{{ url('catalogos/productos/agregar') }}">
        @csrf <!-- Token para evitar error 419 -->

        <div class="row my-4">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" maxlength="50"
                    name="nombre" id="nombre"
                    value="{{ old('nombre') }}"
                    placeholder="Ingrese el nombre del producto"
                    class="form-control @error('nombre') is-invalid @enderror"
                    required autofocus>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="descripción">Descripción:</label>
                <input type="text" maxlength="255"
                    name="descripción" id="descripción"
                    value="{{ old('descripción') }}"
                    placeholder="Ingrese la descripción del producto"
                    class="form-control @error('descripción') is-invalid @enderror"
                    required>
                @error('descripción')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row my-3">
            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="number" min="0"
                    name="cantidad" id="cantidad"
                    value="{{ old('cantidad') }}"
                    placeholder="Ingrese la cantidad"
                    class="form-control @error('cantidad') is-invalid @enderror"
                    required>
                @error('cantidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="number" step="0.01" min="0"
                    name="precio_unitario" id="precio_unitario"
                    value="{{ old('precio_unitario') }}"
                    placeholder="Ingrese el precio unitario"
                    class="form-control @error('precio_unitario') is-invalid @enderror"
                    required>
                @error('precio_unitario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row my-3">
            <div class="form-group col-md-6">
                <label for="precio_venta">Precio de Venta:</label>
                <input type="number" step="0.01" min="0"
                    name="precio_venta" id="precio_venta"
                    value="{{ old('precio_venta') }}"
                    placeholder="Ingrese el precio de venta"
                    class="form-control @error('precio_venta') is-invalid @enderror"
                    required>
                @error('precio_venta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="categoria">Categoría:</label>
                <select name="fk_id_categoria" id="categoria"
                    class="form-control @error('fk_id_categoria') is-invalid @enderror"
                    required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}"
                            {{ old('fk_id_categoria') == $categoria->id_categoria ? 'selected' : '' }}>
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
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

@endsection
