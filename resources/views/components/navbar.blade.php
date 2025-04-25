<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="btn btn-outline-light me-3" href="#" id="menuToggle">Menú</a>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/catalogo/categorias') }}" class="nav-link text-white">Categorías</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/clientes') }}" class="nav-link text-white">Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/compra') }}" class="nav-link text-white">Compra</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/empleados') }}" class="nav-link text-white">Empleados</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/productos') }}" class="nav-link text-white">Productos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/proveedores') }}" class="nav-link text-white">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/catalogo/ventas') }}" class="nav-link text-white">Ventas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/reportes') }}" class="nav-link text-white">Reportes</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white">Salir</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){
        $('#menuToggle').on('mouseover', function() {
            $('#navbarMenu').collapse('show');
        });
        $('#navbarMenu').on('mouseleave', function() {
            $('#navbarMenu').collapse('hide');
        });
    });
</script>
