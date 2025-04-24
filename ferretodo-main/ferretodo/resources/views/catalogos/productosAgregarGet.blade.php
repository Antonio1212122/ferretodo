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
                <input type="text" maxlength="50" name="nombre" id="nombre" 
                    placeholder="Ingrese el nombre del producto" class="form-control" required autofocus>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="descripcion">Descripción:</label>
                <input type="text" maxlength="255" name="descripcion" id="descripcion" 
                    placeholder="Ingrese la descripción del producto" class="form-control" required>
            </div>
        </div>

        <div class="row my-3">
            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" 
                    placeholder="Ingrese la cantidad" class="form-control" required>
            </div>
            
            <div class="form-group col-md-6">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" 
                    placeholder="Ingrese el precio unitario" class="form-control" required>
            </div>
        </div>

        <div class="row my-3">
            <div class="form-group col-md-6">
                <label for="precio_venta">Precio de Venta:</label>
                <input type="number" step="0.01" name="precio_venta" id="precio_venta" 
                    placeholder="Ingrese el precio de venta" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="categoria">Categoría:</label>
                <select name="fk_id_categoria" id="categoria" class="form-control" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
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

