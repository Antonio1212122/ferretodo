@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) @endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Venta</h1>
    </div>
</div>

<form method="POST" action="{{ url('/catalogos/ventas/agregar') }}">
    @csrf

    <div class="row my-4">
        <div class="form-group mb-3 col-md-4">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ date('Y-m-d') }}">
        </div>
        <div class="form-group mb-3 col-md-4">
            <label for="fk_id_empleado">Empleado</label>
            <select name="fk_id_empleado" class="form-control" required>
                <option value="">Seleccionar Empleado</option>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3 col-md-4">
            <label for="fk_id_cliente">Cliente</label>
            <select name="fk_id_cliente" class="form-control" required>
                <option value="">Seleccionar Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div id="ventas-container">
        </div>
    <button type="button" class="btn btn-secondary my-3" id="add-line">+ Agregar Producto</button>

    <div class="row my-3">
        <div class="form-group mb-3 col-md-6">
            <label for="importeTotal">Total de la Venta</label>
            <input type="number" step="0.01" class="form-control" name="importeTotal" id="importeTotal" value="0.00" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Guardar Venta</button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const ventasContainer = document.getElementById('ventas-container');
    const addLineBtn = document.getElementById('add-line');
    const inputImporteTotal = document.getElementById('importeTotal');
    const productos = @json($productos);
    let lineaIndex = 0;

    function crearLineaVenta(index) {
        const div = document.createElement('div');
        div.classList.add('row', 'my-2', 'linea-venta');
        div.dataset.index = index;

        div.innerHTML = `
            <div class="form-group mb-3 col-md-4">
                <label>Producto</label>
                <select name="productos[${index}][fk_id_producto]" class="form-control producto-select" required>
                    <option value="">Seleccionar Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" data-precio="{{ $producto->precio_venta }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Cantidad</label>
                <input type="number" name="productos[${index}][cantidad]" class="form-control cantidad-input" value="1" min="1" required>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Precio Venta</label>
                <input type="number" step="0.01" name="productos[${index}][precio_venta]" class="form-control precio-venta-input" required>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Importe</label>
                <input type="number" step="0.01" name="productos[${index}][importe]" class="form-control subtotal-input" readonly>
            </div>
            <div class="form-group mb-3 col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm eliminar-linea">X</button>
            </div>
        `;///

        ventasContainer.appendChild(div);
        agregarEventosLinea(div);
    }

    function agregarEventosLinea(linea) {
        const selectProducto = linea.querySelector('.producto-select');
        const cantidadInput = linea.querySelector('.cantidad-input');
        const precioVentaInput = linea.querySelector('.precio-venta-input');
        const subtotalInput = linea.querySelector('.subtotal-input');
        const eliminarBtn = linea.querySelector('.eliminar-linea');

        function actualizarSubtotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const precio = parseFloat(precioVentaInput.value) || 0;
            subtotalInput.value = (cantidad * precio).toFixed(2);
            actualizarTotalGeneral();
        }

        selectProducto.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const precioSugerido = parseFloat(selectedOption.dataset.precio) || 0;
            precioVentaInput.value = precioSugerido.toFixed(2);
            actualizarSubtotal();
        });

        cantidadInput.addEventListener('input', actualizarSubtotal);
        precioVentaInput.addEventListener('input', actualizarSubtotal);

        eliminarBtn.addEventListener('click', () => {
            linea.remove();
            actualizarTotalGeneral();
        });
    }

    function actualizarTotalGeneral() {
        let total = 0;
        document.querySelectorAll('.subtotal-input').forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        inputImporteTotal.value = total.toFixed(2);
    }

    addLineBtn.addEventListener('click', () => {
        crearLineaVenta(lineaIndex++);
    });

    crearLineaVenta(lineaIndex++); 
});
</script>

@endsection