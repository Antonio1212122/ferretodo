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
            <th scope="col" class="text-start">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td class="text-center">{{$empleado->id_empleado}}</td>
            <td class="text-start">{{$empleado->nombre}}</td>
            <td class="text-start">{{$empleado->puesto}}</td> 
            <td class="text-center">{{$empleado->telefono_formateado}}</td>
            <td class="text-start">{{$empleado->email}}</td>
             <td class="text-center">
                <a href="{{ url('/catalogo/empleados/editar/' . $empleado->id_empleado) }}" class="btn btn-sm btn-warning">
                    Editar
                </a>
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
