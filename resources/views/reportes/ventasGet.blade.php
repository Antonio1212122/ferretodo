@extends("components.layout")
@section("content")
<h1 class="my-4">Reporte de Ventas</h1>

<!-- Formulario de Filtro -->
<form method="GET" action="{{ route('ventas.get') }}" class="row g-3 mb-4">
    <div class="col-md-3">
        <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
    </div>
    <div class="col-md-3">
        <label for="fecha_fin" class="form-label">Fecha Fin</label>
        <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
    </div>
    <div class="col-md-3 align-self-end">
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th class="text-end">Cantidad</th>
            <th class="text-end">Precio Venta</th>
            <th class="text-end">Importe</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
        <tr>
            <td>{{ $detalle->fecha }}</td>
            <td>{{ $detalle->cliente }}</td>
            <td>{{ $detalle->nombre }}</td>
            <td class="text-end">{{ $detalle->cantidad }}</td>
            <td class="text-end">${{ number_format($detalle->precio_venta, 2) }}</td>
            <td class="text-end">${{ number_format($detalle->importe, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" class="text-end">Total Vendido:</th>
            <th class="text-end">${{ number_format($total, 2) }}</th>
        </tr>
    </tfoot>
</table>
@endsection
