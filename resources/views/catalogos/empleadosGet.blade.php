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
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-start">Nombre</th>
            <th scope="col" class="text-start">Puesto</th>
            <th scope="col" class="text-center">Telefono</th>
            <th scope="col" class="text-start">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td class="text-center">{{$empleado->id_empleado}}</td>
            <td class="text-start">{{$empleado->nombre}}</td>
            <td class="text-start">{{$empleado->puesto}}</td> 
            <td class="text-center">{{$empleado->telefono}}</td>
            <td class="text-start">{{$empleado->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    let table = new DataTable('#maintable', { paging: true, searching: true });
</script>

@endsection
