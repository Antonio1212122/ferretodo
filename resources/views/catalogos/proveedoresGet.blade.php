@extends("components.layout") 
@section("content") 

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) 
@endcomponent  

<div class="row my-4">
    <div class="col">
        <h1>Proveedores</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/proveedores/agregar') }}">Agregar</a>
    </div>
</div>

<table class="table" id="maintable">
    <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-start">Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedores as $proveedor)
        <tr>
            <td class="text-center">{{$proveedor->id_proveedor}}</td>
            <td class="text-start">{{$proveedor->nombre}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', { paging: true, searching: true });
</script>

@endsection

