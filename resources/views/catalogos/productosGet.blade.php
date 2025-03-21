@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Empleados</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/empleados/agregar') }}">Agregar</a>
    </div>
</div>

<h1>Lista de Productos</h1>

<table class="table" id="maintable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Venta</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id_producto }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>${{ number_format($producto->precio_unitario, 2) }}</td>
            <td>${{ number_format($producto->precio_venta, 2) }}</td>
            <td>{{ $producto->fk_id_categoria }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
