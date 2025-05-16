@extends("components.layout")

@section("content")
    @component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
    @endcomponent

    <div class="row">
        <div class="form-group my-3">
            <h1>Agregar Proveedor</h1>
        </div>
    </div>

    <form method="post" action="{{ url('/catalogos/proveedores/agregar') }}">
        @csrf {{-- NECESARIO para evitar errores 419 --}}
        
        <div class="row my-4">
            <div class="form-group mb-3 col-6">
                <label for="nombre">Nombre:</label>
                <input 
                    type="text" 
                    maxlength="50" 
                    class="form-control @error('nombre') is-invalid @enderror" 
                    name="nombre" 
                    placeholder="Ingrese el nombre del proveedor" 
                    id="nombre" 
                    value="{{ old('nombre') }}"
                    required 
                    autofocus
                >
                
                {{-- Mostrar error si el nombre no es válido --}}
                @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
@endsection
