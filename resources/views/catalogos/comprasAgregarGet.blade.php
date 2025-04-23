@extends("components.layout")

@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]) @endcomponent

<div class="row">
    <div class="form-group my-3">
        <h1>Agregar Compra</h1>
    </div>
</div>

<form method="POST" action="{{ url('/catalogos/compras') }}">
    @csrf

    <div class="row my-4">
        <div class="form-group mb-3 col-md-4">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ date('Y-m-d') }}">
        </div>
        <div class="form-group mb-3 col-md-4">
            <label for="fk_id_proveedor">Proveedor</label>
            <select name="fk_id_proveedor" class="form-control" required>
                <option value="">Seleccionar Proveedor</option>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->id_proveedor }}">{{ $prov->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group mb-3 col-md-4">
        <label for="categoria">Categoría</label>
        <select id="categoria" class="form-control">
            <option value="">Todas</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div id="compras-container"></div>
    <button type="button" class="btn btn-secondary my-3" id="add-line">+ Agregar Producto</button>

    <div class="row my-3">
        <div class="form-group mb-3 col-md-6">
            <label for="importeTotal">Total de la Compra</label>
            <input type="number" step="0.01" class="form-control" name="importeTotal" id="importeTotal" value="0.00" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Guardar Compra</button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const comprasContainer = document.getElementById('compras-container');
    const addLineBtn = document.getElementById('add-line');
    const inputImporteTotal = document.getElementById('importeTotal');
    const selectCategoria = document.getElementById('categoria');
    const productos = @json($productos);

    let lineaIndex = 0;

    function crearLineaCompra(index, productosFiltrados = productos) {
        const div = document.createElement('div');
        div.classList.add('row', 'my-2', 'linea-compra');
        div.dataset.index = index;

        div.innerHTML = `
            <div class="form-group mb-3 col-md-4">
                <label>Producto</label>
                <select name="compras[${index}][fk_id_producto]" class="form-control producto-select" required>
                    <option value="">Seleccionar Producto</option>
                    ${productosFiltrados.map(p => 
                        `<option value="${p.id_producto}" data-precio="${p.precio_unitario}" data-categoria="${p.fk_id_categoria}">${p.nombre}</option>`
                    ).join('')}
                </select>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Cantidad</label>
                <input type="number" name="compras[${index}][cantidad]" class="form-control cantidad-input" value="1" min="1" required>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Precio Unitario</label>
                <input type="number" name="compras[${index}][precio_unitario]" class="form-control precio-input" step="0.01" readonly required>
            </div>
            <div class="form-group mb-3 col-md-2">
                <label>Importe</label>
                <input type="number" name="compras[${index}][importe]" class="form-control subtotal-input" step="0.01" readonly>
            </div>
            <div class="form-group mb-3 col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm eliminar-linea">X</button>
            </div>
        `;

        comprasContainer.appendChild(div);
        agregarEventosLinea(div);
    }

    function agregarEventosLinea(linea) {
        const select = linea.querySelector('.producto-select');
        const cantidad = linea.querySelector('.cantidad-input');
        const precio = linea.querySelector('.precio-input');
        const subtotal = linea.querySelector('.subtotal-input');
        const eliminarBtn = linea.querySelector('.eliminar-linea');

        select.addEventListener('change', () => {
            const selected = select.options[select.selectedIndex];
            const precioVal = parseFloat(selected.dataset.precio) || 0;
            precio.value = precioVal.toFixed(2);
            actualizarSubtotal();
        });

        cantidad.addEventListener('input', actualizarSubtotal);

        eliminarBtn.addEventListener('click', () => {
            linea.remove();
            actualizarTotalGeneral();
        });

        function actualizarSubtotal() {
            const cantidadVal = parseFloat(cantidad.value) || 0;
            const precioVal = parseFloat(precio.value) || 0;
            subtotal.value = (cantidadVal * precioVal).toFixed(2);
            actualizarTotalGeneral();
        }
    }

    function actualizarTotalGeneral() {
        let total = 0;
        document.querySelectorAll('.subtotal-input').forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        inputImporteTotal.value = total.toFixed(2);
    }

    function filtrarProductosPorCategoria(idCategoria) {
        if (!idCategoria) return productos;
        return productos.filter(p => p.fk_id_categoria == idCategoria);
    }

    addLineBtn.addEventListener('click', () => {
        const categoriaSeleccionada = selectCategoria.value;
        crearLineaCompra(lineaIndex++, filtrarProductosPorCategoria(categoriaSeleccionada));
    });

    selectCategoria.addEventListener('change', () => {
        comprasContainer.innerHTML = '';
        lineaIndex = 0;
    });

    crearLineaCompra(lineaIndex++);
});
</script>
@endsection