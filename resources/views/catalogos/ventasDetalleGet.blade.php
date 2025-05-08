@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) @endcomponent

<div class="container">
    <h2>Detalle de Venta #{{ $venta->id_venta }}</h2>

    <div class="mb-4">
        <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
        <p><strong>Empleado:</strong> {{ $venta->empleado->nombre }}</p>
        <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</p>
        <p><strong>Total:</strong> ${{ number_format($venta->total, 2) }}</p>
    </div>

    <h4>Productos Vendidos</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalleventa as $detalle)
            <tr>
                <td>{{ $detalle->producto->nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>${{ number_format($detalle->precio_venta, 2) }}</td>
                <td>${{ number_format($detalle->importe, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection