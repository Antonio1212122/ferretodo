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
            <th scope="col" class= "text-start">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td class="text-start">{{$categoria->id_categoria}}</td>
            <td class="text-start">{{$categoria->nombre}}</td>
            <td class="text-start">{{$categoria->descripción}}</td> 
            <td class="text-start">
                <a href="{{ url('/catalogo/categorias/editar/' . $categoria->id_categoria) }}" class="btn btn-sm btn-warning">Editar</a>
            </td>
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
