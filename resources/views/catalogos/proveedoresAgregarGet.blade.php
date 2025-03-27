@extends("components.layout")

@section("content")
    @component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
    @endcomponent

    <h1>Agregar Proveedor</h1>

    <form action="{{ url('/catalogos/proveedores/agregar') }}" method="POST">
        @csrf  {{-- NECESARIO para evitar errores 419 --}}

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
