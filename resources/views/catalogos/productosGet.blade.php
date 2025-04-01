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
            <td class="text-center">{{ $producto->id_producto }}</td>
            <td class="text-center">{{ $producto->nombre }}</td>
            <td class="text-center">{{ $producto->descripcion }}</td>
            <td class="text-center">{{ $producto->cantidad }}</td>
            <td class="text-center">${{ number_format($producto->precio_unitario, 2) }}</td>
            <td class="text-center">${{ number_format($producto->precio_venta, 2) }}</td>
            <td class="text-center">{{ $producto->nombre_categoria }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Agregar DataTables -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new DataTable("#maintable", {
            paging: true,
            searching: true,
            responsive: true,
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros por página",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });
    });
</script>

@endsection
