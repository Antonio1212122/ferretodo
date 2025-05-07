@extends("components.layout")
@section("content")
<h1 class="my-4">Productos más vendidos</h1>

<form method="GET" class="mb-4">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="fecha_inicio" class="col-form-label">Desde:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="col-auto">
            <label for="fecha_fin" class="col-form-label">Hasta:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
        </div>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th class="text-end">Cantidad Vendida</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td class="text-end">{{ $producto->total_vendido }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center">No se encontraron productos vendidos en el periodo seleccionado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
