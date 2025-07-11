<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ secure_asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" />
    <script src="{{ secure_asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link href="{{ secure_asset('DataTables/datatables.min.css') }}" rel="stylesheet"/>
    <script src="{{ secure_asset('DataTables/datatables.min.js') }}"></script>

    <!-- ✅ Traducción al español para DataTables -->
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"></script>

    <link href="{{ secure_asset('assets/Style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretodo</title>
</head>
<body>
    @auth
        @component('components.navbar')
        @endcomponent
    @endauth

    <div class="container mt-5">
        @section('content')
        @show
    </div>
</body>
</html>
