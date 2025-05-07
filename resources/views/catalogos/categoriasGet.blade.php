@extends("components.layout") 

@section("content") 

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) 
@endcomponent  

<div class="row my-4">
    <div class="col">
        <h1>Categorías</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/categorias/agregar') }}">Agregar</a>
    </div>
</div>

<table class="table" id="maintable">
    <thead>
        <tr>
            <th scope="col" class="text-start">ID</th>
            <th scope="col" class="text-start">Nombre</th>
            <th scope="col" class="text-start">Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td class="text-start">{{$categoria->id_categoria}}</td>
            <td class="text-start">{{$categoria->nombre}}</td>
            <td class="text-start">{{$categoria->descripción}}</td> 
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', { paging: true, searching: true });
</script>

@endsection
