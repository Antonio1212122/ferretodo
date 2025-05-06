@extends("components.layout")
@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Compras</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/compras/agregar') }}">Agregar</a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table" id="maintable">
    <thead>
        <tr>
            <th>ID Compra</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($compras as $compra)
    <tr>
        <td>{{ $compra->id_compra }}</td>
        <td>{{ $compra->fecha }}</td>
        <td>${{ number_format($compra->total, 2) }}</td>
        <td>{{ $compra->nombre_proveedor }}</td>
        <td>
            <a href="{{ url('/catalogo/compras/' . $compra->id_compra . '/detalle') }}" class="btn btn-info btn-sm">
                Ver Detalle
            </a>

            <form method="POST" action="{{ route('compras.eliminar', $compra->id_compra) }}" style="display:inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta compra?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
