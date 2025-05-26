<nav class="sidebar nav flex-column pt-5 bg-primary vh-100">
    <a href="{{ url('/catalogo/categorias') }}" class="nav-link text-white">
        <i class="bi bi-tags me-2"></i> Categorías
    </a>
    <a href="{{ url('/catalogo/clientes') }}" class="nav-link text-white">
        <i class="bi bi-people me-2"></i> Clientes
    </a>
    <a href="{{ url('/catalogo/compra') }}" class="nav-link text-white">
        <i class="bi bi-cart-plus me-2"></i> Compra
    </a>
    <a href="{{ url('/catalogo/empleados') }}" class="nav-link text-white">
        <i class="bi bi-person-badge me-2"></i> Empleados
    </a>
    <a href="{{ url('/catalogo/productos') }}" class="nav-link text-white">
        <i class="bi bi-box-seam me-2"></i> Productos
    </a>
    <a href="{{ url('/catalogo/proveedores') }}" class="nav-link text-white">
        <i class="bi bi-truck me-2"></i> Proveedores
    </a>
    <a href="{{ url('/catalogo/ventas') }}" class="nav-link text-white">
        <i class="bi bi-cash-coin me-2"></i> Ventas
    </a>
    <a href="{{ url('/reportes') }}" class="nav-link text-white">
        <i class="bi bi-bar-chart-line me-2"></i> Reportes
    </a>
    
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button class="nav-link text-white btn btn-link" type="submit">
            <i class="bi bi-box-arrow-right me-2"></i> Salir
        </button>
    </form>
</nav>
