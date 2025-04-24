@extends("components.layout")
@section("content")
<h1 class="my-4">Reporte de Ventas</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
        <tr>
            <td>{{ $detalle->fecha }}</td>
            <td>{{ $detalle->nombre }}</td>
            <td class="text-end">{{ $detalle->cantidad }}</td>
            <td class="text-end">${{ number_format($detalle->precio_venta, 2) }}</td>
            <td class="text-end">${{ number_format($detalle->importe, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
