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
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-start">Nombre</th>
            <th scope="col" class="text-start">Descripción</th>
            <th scope="col" class="text-center">Cantidad</th>
            <th scope="col" class="text-center">Precio Unitario</th>
            <th scope="col" class="text-center">Precio Venta</th>
            <th scope="col" class="text-start">Categoría</th>
            <th scope="col" class="text-start">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td class="text-center">{{ $producto->id_producto }}</td>
            <td class="text-start">{{ $producto->nombre }}</td>
            <td class="text-start">{{ $producto->descripción }}</td>
            <td class="text-center">{{ $producto->cantidad }}</td>
            <td class="text-center">${{ number_format($producto->precio_unitario, 2) }}</td>
            <td class="text-center">${{ number_format($producto->precio_venta, 2) }}</td>
            <td class="text-start">{{ $producto->nombre_categoria }}</td>
                        <td class="text-center">
                <a href="{{ url('/catalogo/productos/editar/' . $producto->id_producto) }}" class="btn btn-sm btn-warning">
                    Editar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', {
        paging: true,
        searching: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
</script>

@endsection
