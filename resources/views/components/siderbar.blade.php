<nav class="sidebar nav flex-column pt-5 bg-primary vh-100">
    <a href="{{ url('/catalogo/categorias') }}" class="nav-link text-white">Categorías</a>
    <a href="{{ url('/catalogo/clientes') }}" class="nav-link text-white">Clientes</a>
    <a href="{{ url('/catalogo/compra') }}" class="nav-link text-white">Compra</a>
    <a href="{{ url('/catalogo/empleados') }}" class="nav-link text-white">Empleados</a>
    <a href="{{ url('/catalogo/productos') }}" class="nav-link text-white">Productos</a>
    <a href="{{ url('/catalogo/proveedores') }}" class="nav-link text-white">Proveedores</a>
    <a href="{{ url('/catalogo/ventas') }}" class="nav-link text-white">Ventas</a>
    <a href="{{ url('/reportes') }}" class="nav-link text-white">Reportes</a>
    
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button class="nav-link text-white btn btn-link" type="submit">Salir</button>
    </form>
</nav>
