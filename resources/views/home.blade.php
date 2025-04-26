@extends("components.layout")

@section("content")

    <div class="hero-section text-white py-5">
        <div class="container text-center">
            <h1 class="display-4">Bienvenido a Ferretodo</h1>
            <p class="lead mb-4">Tu sistema de gestión de ferretería en línea</p>
            <div>
                @if(Auth::check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-lg me-2">Salir</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg me-2">Iniciar Sesión</a>
                    <a href="{{ url('/register') }}" class="btn btn-success btn-lg">Crear Cuenta</a>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-5">
                    <h3>Acerca de Ferretodo</h3>
                    <p>
                        Ferretodo es un sistema de gestión integral diseñado para optimizar las operaciones de tu ferretería.
                        Desde el control de inventario hasta la administración de ventas y clientes, nuestra plataforma te proporciona
                        las herramientas necesarias para mejorar la gestión y el rendimiento general de tu negocio.
                    </p>
                </div>

                <div class="accordion" id="detailsAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingDetails">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails">
                                <i class="bi bi-info-circle-fill me-2"></i> Detalles del Desarrollo
                            </button>
                        </h2>
                        <div id="collapseDetails" class="accordion-collapse collapse" aria-labelledby="headingDetails" data-bs-parent="#detailsAccordion">
                            <div class="accordion-body">
                                <p>
                                    Este sistema fue desarrollado como parte de la materia
                                    <strong>Desarrollo e Implementación de Sistemas de Información</strong> en el
                                    <strong>Tecnológico Nacional de México, campus Colima</strong>.
                                </p>
                                <h6 class="mt-3">Información del Estudiante:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-person-fill me-2"></i> Jose Antonio Casillas Guerra</li>
                                    <li><i class="bi bi-person-fill me-2"></i> Mario Angel Padilla González</li>
                                    <li><i class="bi bi-person-fill me-2"></i> Andrea Guadalupe Juarez Nava</li>
                                </ul>
                                <p>
                                    Carrera: Ingeniería Informática <br>
                                    Semestre: 6°
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-center">
                <p class="text-muted"><i class="bi bi-exclamation-triangle-fill me-2"></i> Debes iniciar sesión para ver los datos guardados.</p>
            </div>
        </div>
    </div>

    <style>
        .hero-section {
            background-image: url('{{ asset('https://www.ferreteriapanchito.com/wp-content/uploads/2020/12/fondo-ferreteria2-1.jpg') }}'); /* Ruta a tu imagen */
            background-size: cover; /* Cubre todo el contenedor */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            color: white; /* Asegura que el texto sea visible sobre la imagen */
            padding: 150px 0; /* Ajusta el padding para el espacio vertical */
            margin-bottom: 20px;
            /* Opcional: Puedes agregar una capa oscura para mejorar la legibilidad del texto */
            background-color: rgba(0, 0, 0, 0.5); /* Negro semitransparente */
            background-blend-mode: overlay; /* Combina el color de fondo con la imagen */
        }
</style>

@endsection