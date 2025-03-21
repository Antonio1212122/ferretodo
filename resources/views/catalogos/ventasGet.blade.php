@extends("components.layout")
@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Empleados</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/ventas/agregar') }}">Agregar</a>
    </div>
</div>

<h1>Lista de Productos</h1>

<table class="table" id="maintable">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Empleado</th>
            <th>Cliente</th>
            <th>Producto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->id_venta }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->nombre_empleado }}</td>
            <td>{{ $venta->nombre_cliente }}</td>
            <td>{{ $venta->nombre_producto }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

