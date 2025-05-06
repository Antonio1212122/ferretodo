@extends("components.layout")
@section("content")
<h1 class="my-4">Clientes Recurrentes</h1>

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
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->email }}</td>
            <td class="text-end">{{ $cliente->total_ventas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
