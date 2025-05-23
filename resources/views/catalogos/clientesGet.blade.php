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
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-start">Nombre</th>
            <th scope="col" class="text-start">Apellido</th>
            <th scope="col" class="text-start">Dirección</th>
            <th scope="col" class="text-center">Teléfono</th>
            <th scope="col" class="text-start">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td class="text-center">{{$cliente->id_cliente}}</td>
            <td class="text-start">{{$cliente->nombre}}</td>
            <td class="text-start">{{$cliente->apellido}}</td> 
            <td class="text-start">{{$cliente->direccion}}</td>
            <td class="text-center">{{$cliente->telefono}}</td>
            <td class="text-start">{{$cliente->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', {
        paging: true,
        searching: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
</script>

@endsection
