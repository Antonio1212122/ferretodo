@extends("components.layout")

@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Productos</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/productos/agregar') }}">Agregar</a>
    </div>
</div>
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
            <td>{{ $producto->descripción }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>${{ number_format($producto->precio_unitario, 2) }}</td>
            <td>${{ number_format($producto->precio_venta, 2) }}</td>
            <td>{{ $producto->nombre_categoria }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
