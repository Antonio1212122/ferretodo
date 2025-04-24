@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent
<div class="row my-4">
    <div class="col">
    <h1>Reportes</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{url("/reportes/compras")}}" class="btn-menu">Compras Realizadas</a>
        </div>
        <div class="col-md-4">
            <a href="{{url("/reportes/ventas")}}" class="btn-menu">Ventas Realizadas</a>
        </div>
        <div class="col-md-4">
            <a href="{{url("/reportes/productos_mas_vendidos")}}" class="btn-menu">Productos Estrella</a>
        </div>
    </div>
</div>
@endsection