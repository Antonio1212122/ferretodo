@extends("components.layout")
@section("content")
<h1 class="my-4">Clientes Recurrentes</h1>

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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th class="text-end">Total de Ventas</th>
        </tr>
    </thead>
    <tbody>
        @forelse($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->email }}</td>
            <td class="text-end">{{ $cliente->total_ventas }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No hay clientes recurrentes en el periodo seleccionado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
