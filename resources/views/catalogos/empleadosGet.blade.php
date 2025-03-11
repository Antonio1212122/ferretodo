@extends("components.layout") 
@section("content") 

@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) 
@endcomponent  

<div class="row my-4">
    <div class="col">
        <h1>Empleados</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ url('/catalogo/empleados/agregar') }}">Agregar</a>
    </div>
</div>

<table class="table" id="maintable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Puesto</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td class="text-center">{{$empleado->id_empleado}}</td>
            <td class="text-center">{{$empleado->nombre}}</td>
            <td class="text-center">{{$empleado->puesto}}</td> 
            <td class="text-center">{{$empleado->telefono}}</td>
            <td class="text-center">{{$empleado->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', { paging: true, searching: true });
</script>

@endsection
