@extends("components.layout")
@section("content")
<h1 class="my-4">Productos más vendidos</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th class="text-end">Cantidad Vendida</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td class="text-end">{{ $producto->total_vendido }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
