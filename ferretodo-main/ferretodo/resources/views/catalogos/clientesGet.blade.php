@extends("components.layout") 
@section("content") 

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) 
@endcomponent  

<div class="row my-4">
    <div class="col">
        <h1>Clientes</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('catalogo/clientes/agregar') }}">Agregar</a>
    </div>
</div>

<table class="table" id="maintable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td class="text-center">{{$cliente->id_cliente}}</td>
            <td class="text-center">{{$cliente->nombre}}</td>
            <td class="text-center">{{$cliente->apellido}}</td> 
            <td class="text-center">{{$cliente->direccion}}</td>
            <td class="text-center">{{$cliente->telefono}}</td>
            <td class="text-center">{{$cliente->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', { paging: true, searching: true });
</script>

@endsection
