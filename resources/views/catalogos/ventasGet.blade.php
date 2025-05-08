@extends("components.layout")
@section("content")

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Ventas</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/ventas/agregar') }}">Agregar</a>
    </div>
</div>
<table class="table" id="maintable">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th> 
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->id_venta }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</td> <!-- Acceso a la relación cliente -->
            <td>${{ number_format($venta->total, 2) }}</td>
            <td> 
                <a href="{{ url('/catalogo/ventas/' . $venta->id_venta . '/detalle') }}" class="btn btn-info btn-sm">Detalle</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection



