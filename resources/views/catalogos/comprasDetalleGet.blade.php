@extends("components.layout")

@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) @endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Detalle de Compra #{{ $compra->id_compra }}</h1>
    </div>
</div>

<div class="card p-4 mb-4">
    <h5>Proveedor: {{ $compra->proveedor->nombre }}</h5>
    <h5>Fecha: {{ $compra->fecha }}</h5>
    <h5>Total: ${{ number_format($compra->total, 2) }}</h5>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        @foreach($compra->detalles as $detalle)
        <tr>
            <td>{{ $detalle->producto->nombre }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
            <td>${{ number_format($detalle->importe, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row my-4">
    <div class="col">
        <a href="{{ url('/catalogo/compra') }}" class="btn btn-secondary">← Volver a Compras</a>
    </div>
</div>
@endsection
