<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FacturaSmart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background: #fff;
            font-family: 'Segoe UI', sans-serif;
            padding: 24px 32px;
            font-size: 14px;
        }

        .page-title {
            color: #5b9bd5;
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
        }

        .btn-add {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: #1a6eb5;
            border: none;
            color: #fff;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(26, 110, 181, .3);
        }

        .btn-add:hover {
            background: #155a9a;
        }

        #panel-form {
            display: none;
            border-left: 4px solid #5b9bd5;
            padding: 20px 16px 4px 24px;
            margin-bottom: 28px;
        }

        .form-open {
            animation: slideDown .3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .f-label {
            color: #5b9bd5;
            font-size: .78rem;
            font-weight: 500;
            margin-bottom: 3px;
            display: block;
        }

        .f-ctrl {
            width: 100%;
            padding: 7px 10px;
            border: 1px solid #d0d9e8;
            border-radius: 5px;
            font-size: .84rem;
            color: #333;
            background: #fff;
            outline: none;
            transition: border .2s;
        }

        .f-ctrl:focus {
            border-color: #5b9bd5;
            box-shadow: 0 0 0 3px rgba(91, 155, 213, .12);
        }

        .f-ctrl:disabled {
            background: #f4f6f9;
            color: #aaa;
        }

        .btn-agregar {
            background: #27ae60;
            border: none;
            color: #fff;
            padding: 8px 22px;
            border-radius: 6px;
            font-weight: 600;
            font-size: .875rem;
            cursor: pointer;
        }

        .btn-agregar:hover {
            background: #219150;
        }

        .btn-modificar {
            background: #e8a020;
            border: none;
            color: #fff;
            padding: 8px 22px;
            border-radius: 6px;
            font-weight: 600;
            font-size: .875rem;
            cursor: pointer;
        }

        .btn-modificar:hover {
            background: #c98a1a;
        }

        table.dataTable thead th {
            background: #f7faff;
            color: #3a5a8a;
            font-size: .8rem;
            font-weight: 600;
            border-bottom: 2px solid #d0d9e8 !important;
        }

        table.dataTable tbody td {
            font-size: .84rem;
            vertical-align: middle;
            border-top: 1px solid #f0f2f5 !important;
        }

        table.dataTable tbody tr:hover td {
            background: #f5f9ff;
        }

        .td-blue {
            color: #1a6eb5;
        }

        .td-orange {
            color: #e67e22;
            font-weight: 500;
        }

        .btn-edit {
            background: none;
            border: none;
            color: #1a6eb5;
            cursor: pointer;
            font-size: 1rem;
            padding: 2px 4px;
        }

        .btn-edit:hover {
            color: #0d4f8a;
        }

        .btn-del {
            background: none;
            border: none;
            color: #c0392b;
            cursor: pointer;
            font-size: .9rem;
            padding: 2px 4px;
        }

        .btn-del:hover {
            color: #922b21;
        }

        .notificacion {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 260px;
            max-width: 320px;
            font-size: .85rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .12);
            border-radius: 8px;
        }
    </style>
</head>

<body>

    {{-- Notificación flash --}}
    @if(session('msg'))
    @php
    $map = [
    'creado' => ['success', 'bi-check-circle-fill', 'Cliente registrado correctamente.'],
    'actualizado' => ['warning', 'bi-pencil-fill', 'Cliente actualizado correctamente.'],
    'eliminado' => ['danger', 'bi-trash-fill', 'Cliente eliminado correctamente.'],
    ];
    [$color, $icono, $texto] = $map[session('msg')] ?? ['secondary','bi-info-circle-fill','Operación realizada.'];
    @endphp
    <div class="notificacion alert alert-{{ $color }} alert-dismissible d-flex align-items-center gap-2" id="alerta-flash">
        <i class="bi {{ $icono }}"></i> {{ $texto }}
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center pb-3 mb-3 border-bottom">
        <h1 class="page-title">Clientes</h1>
        <button class="btn-add" onclick="toggleForm()" title="Nuevo cliente">
            <i class="bi bi-plus" id="icono-toggle"></i>
        </button>
    </div>

    {{-- Panel formulario (crear / editar inline) --}}
    <div id="panel-form">
        <form id="form-cliente" method="POST" action="{{ route('clientes.store') }}">
            @csrf
            @method('POST')

            {{-- Tipo de cliente --}}
            <div class="mb-3">
                <label class="f-label">Tipo de cliente</label>
                <select name="tipo_cliente" id="tipo_cliente" class="f-ctrl" onchange="ajustarCampos()">
                    <option value="">*** Seleccione una opción ***</option>
                    <option value="1">Consumidor final</option>
                    <option value="2">Empresa</option>
                    <option value="3">Extranjero</option>
                    <option value="4">Proveedor</option>
                </select>
            </div>

            {{-- Bloque principal (oculto hasta elegir tipo) --}}
            <div id="bloque-main" class="d-none">

                {{-- Documento / N° Documento / NRC --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="f-label">Documento</label>
                        <select name="cod_tipo_documento" id="cod_tipo_documento" class="f-ctrl" onchange="actualizarNumDoc()">
                            <option value="">---</option>
                            @foreach($catalogos['tipos_documento'] as $td)
                            <option value="{{ $td->id_tipo_documento }}">{{ $td->tipo_documento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="f-label">N° Documento</label>
                        <input type="text" name="dui_nit" id="dui_nit" class="f-ctrl" disabled>
                    </div>
                    <div class="col-md-4 d-none" id="col-nrc">
                        <label class="f-label">NRC / IVA</label>
                        <input type="text" name="nrc" id="nrc" class="f-ctrl">
                    </div>
                </div>

                {{-- Razón social / Nombre comercial / Teléfono --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="f-label">Razón social / Nombre del cliente</label>
                        <input type="text" name="nombre" id="nombre" class="f-ctrl">
                    </div>
                    <div class="col-md-4">
                        <label class="f-label">Nombre comercial</label>
                        <input type="text" name="nombre_comercial" id="nombre_comercial" class="f-ctrl">
                    </div>
                    <div class="col-md-4 d-none" id="col-telefono">
                        <label class="f-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="f-ctrl" placeholder="0000-0000">
                    </div>
                </div>

                {{-- Correo --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="f-label">Correo</label>
                        <input type="email" name="correo" id="correo" class="f-ctrl">
                    </div>
                </div>

                {{-- Bloque empresa: Giro / Tipo contribuyente / Tipo persona --}}
                <div class="row g-3 mb-3 d-none" id="bloque-empresa">
                    <div class="col-md-4">
                        <label class="f-label">Giro</label>
                        <select name="cod_actividad_economica" id="cod_actividad_economica" class="f-ctrl">
                            <option value="">---</option>
                            @foreach($catalogos['actividades'] as $ae)
                            <option value="{{ $ae->id_actividad_economica }}">{{ $ae->actividad_economica }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="f-label">Tipo contribuyente</label>
                        <select name="fk_id_tipo_contribuyente" id="fk_id_tipo_contribuyente" class="f-ctrl">
                            <option value="">---</option>
                            @foreach($catalogos['tipos_contribuyente'] as $tc)
                            <option value="{{ $tc->id_tipo_contribuyente }}">{{ $tc->tipo_contribuyente }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="f-label">Tipo de persona</label>
                        <select name="tipo_persona" id="tipo_persona" class="f-ctrl">
                            <option value="">---</option>
                            <option value="1">Natural</option>
                            <option value="2">Juridico</option>
                        </select>
                    </div>
                </div>

                {{-- Departamento / Municipio --}}
                <div class="row g-3 mb-3 d-none" id="bloque-ubicacion">
                    <div class="col-md-4">
                        <label class="f-label">Departamento</label>
                        <select name="cod_departamento" id="cod_departamento" class="f-ctrl">
                            <option value="">---</option>
                            @foreach($catalogos['departamentos'] as $dep)
                            <option value="{{ $dep->id_departamento }}">{{ $dep->departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="f-label">Municipio</label>
                        <select name="cod_municipio" id="cod_municipio" class="f-ctrl">
                            <option value="">--</option>
                        </select>
                    </div>
                </div>

                {{-- País (solo extranjero) --}}
                <div class="row g-3 mb-3 d-none" id="bloque-pais">
                    <div class="col-md-4">
                        <label class="f-label">País</label>
                        <select name="fk_id_pais" id="fk_id_pais" class="f-ctrl">
                            <option value="">--- Seleccionar ---</option>
                            @foreach($catalogos['paises'] as $pais)
                            <option value="{{ $pais->id_pais }}">{{ $pais->nombre_pais }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Dirección / Ciudad --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="f-label">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="f-ctrl">
                    </div>
                    <div class="col-md-6 d-none" id="col-ciudad">
                        <label class="f-label">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="f-ctrl">
                    </div>
                </div>

                {{-- Descripción adicional --}}
                <div class="mb-3">
                    <label class="f-label">Descripción adicional</label>
                    <input type="text" name="descripcion_adicional" id="descripcion_adicional" class="f-ctrl">
                </div>

                {{-- Botón submit --}}
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" id="btn-submit" class="btn-agregar">
                        <i class="bi bi-plus-lg me-1" id="submit-icon"></i>
                        <span id="submit-label"> Agregar</span>
                    </button>
                </div>

            </div>{{-- fin bloque-main --}}
        </form>
    </div>

    {{-- Tabla de clientes --}}
    <table id="tabla-clientes" class="table w-100">
        <thead>
            <tr>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>Dirección</th>
                <th>N° Documento</th>
                <th>NRC</th>
                <th>Correo</th>
                <th class="text-end">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td class="td-blue">{{ $cliente->nombre ?? '—' }}</td>
                <td class="td-blue">{{ $cliente->nombre_comercial ?? '—' }}</td>
                <td class="td-blue">{{ $cliente->direccion ?? '—' }}</td>
                <td class="td-orange">{{ $cliente->dui_nit ?: 'N/A' }}</td>
                <td>{{ $cliente->nrc ?: 'N/A' }}</td>
                <td>{{ $cliente->correo ?? '—' }}</td>
                <td class="text-end" style="white-space:nowrap">
                    <button class="btn-edit"
                        onclick="cargarEdicion({{ json_encode($cliente) }})"
                        title="Editar">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST"
                        action="{{ route('clientes.destroy', $cliente->id_catalogo_cliente) }}"
                        class="d-inline"
                        onsubmit="return confirm('¿Eliminar a {{ addslashes($cliente->nombre ?? 'este cliente') }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-del" title="Eliminar">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Municipios pre-cargados desde el controlador (igual que el PHP original)
        const municipiosPorDep = @json($municipiosPorDep);

        // ── DataTables ───────────────────────────────────────────
        $('#tabla-clientes').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            order: [],
            pageLength: 10,
        });

        // ── Toggle panel form ────────────────────────────────────
        function toggleForm(forzarAbrir = null) {
            const panel = document.getElementById('panel-form');
            const icono = document.getElementById('icono-toggle');
            const abrir = forzarAbrir !== null ? forzarAbrir : panel.style.display !== 'block';
            if (abrir) {
                panel.style.display = 'block';
                panel.classList.add('form-open');
                icono.className = 'bi bi-x';
            } else {
                panel.style.display = 'none';
                icono.className = 'bi bi-plus';
                resetForm();
            }
        }

        function resetForm() {
            const f = document.getElementById('form-cliente');
            f.reset();
            f.action = '{{ route("clientes.store") }}';
            f.querySelector('input[name="_method"]')?.remove();
            document.getElementById('submit-label').textContent = 'Agregar';
            document.getElementById('btn-submit').className = 'btn-agregar';
            document.getElementById('submit-icon').className = 'bi bi-plus-lg me-1';
            document.getElementById('cod_municipio').innerHTML = '<option value="">--</option>';
            ajustarCampos();
        }

        function resetForm() {
            const f = document.getElementById('form-cliente');
            f.reset();
            f.action = '{{ route("clientes.store") }}';
            f.querySelector('input[name="_method"]')?.remove();
            document.getElementById('submit-label').textContent = 'Agregar';
            document.getElementById('btn-submit').className = 'btn-agregar';
            document.getElementById('submit-icon').className = 'bi bi-plus-lg me-1';
            document.getElementById('cod_municipio').innerHTML = '<option value="">--</option>';
            ajustarCampos();
        }

        // ── Cargar datos para edición ────────────────────────────
        function cargarEdicion(c) {
            toggleForm(true);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            const f = document.getElementById('form-cliente');

            // Cambiar acción a ACTUALIZAR usando POST + @method('PUT') simulado
            f.action = '/actualizar/' + c.id_catalogo_cliente;

            // Asegurarse de tener el campo _method con POST para el update
            let mInput = f.querySelector('input[name="_method"]');
            if (!mInput) {
                mInput = document.createElement('input');
                mInput.type = 'hidden';
                mInput.name = '_method';
                f.appendChild(mInput);
            }
            mInput.value = 'POST';

            document.getElementById('submit-label').textContent = 'Modificar';
            document.getElementById('btn-submit').className = 'btn-modificar';
            document.getElementById('submit-icon').className = 'bi bi-arrow-clockwise me-1';

            sv('tipo_cliente', c.tipo_cliente);
            ajustarCampos();

            sv('cod_tipo_documento', c.cod_tipo_documento);
            sv('dui_nit', c.dui_nit);
            sv('nrc', c.nrc);
            sv('nombre', c.nombre);
            sv('nombre_comercial', c.nombre_comercial);
            sv('telefono', c.telefono);
            sv('correo', c.correo);
            sv('cod_actividad_economica', c.cod_actividad_economica);
            sv('fk_id_tipo_contribuyente', c.fk_id_tipo_contribuyente);
            sv('tipo_persona', c.tipo_persona);
            sv('fk_id_pais', c.fk_id_pais);
            sv('descripcion_adicional', c.descripcion_adicional);
            sv('direccion', c.direccion);
            sv('ciudad', c.ciudad);
            actualizarNumDoc();

            if (c.cod_departamento) {
                sv('cod_departamento', c.cod_departamento);
                cargarMunicipios(c.cod_departamento, c.cod_municipio);
            }
        }

        function sv(id, val) {
            const el = document.getElementById(id);
            if (el && val !== null && val !== undefined) el.value = val;
        }

        // ── Lógica dinámica de campos ────────────────────────────
        function ajustarCampos() {
            const tipo = parseInt(document.getElementById('tipo_cliente').value) || 0;

            hide('bloque-main');
            hide('col-nrc');
            hide('col-telefono');
            hide('bloque-empresa');
            hide('bloque-ubicacion');
            hide('bloque-pais');
            hide('col-ciudad');

            if (!tipo) return;

            show('bloque-main');
            if (tipo !== 1) show('col-telefono');
            if (tipo === 1) show('col-ciudad');
            if (tipo === 2) {
                show('col-nrc');
                show('bloque-empresa');
                show('bloque-ubicacion');
                show('col-ciudad');
            }
            if (tipo === 3) show('bloque-pais');
            if (tipo === 4) {
                show('bloque-ubicacion');
                show('col-ciudad');
            }

            actualizarNumDoc();
        }

        function actualizarNumDoc() {
            const tipoDoc = document.getElementById('cod_tipo_documento').value;
            const numDoc = document.getElementById('dui_nit');
            tipoDoc ? numDoc.removeAttribute('disabled') : numDoc.setAttribute('disabled', true);
        }

        function cargarMunicipios(depId, seleccionado = null) {
            const sel = document.getElementById('cod_municipio');
            const data = municipiosPorDep[depId] || [];
            sel.innerHTML = '<option value="">--</option>';
            data.forEach(m => {
                const o = document.createElement('option');
                o.value = m.id_municipio;
                o.textContent = m.municipio;
                if (seleccionado && m.id_municipio == seleccionado) o.selected = true;
                sel.appendChild(o);
            });
        }

        function show(id) {
            document.getElementById(id)?.classList.remove('d-none');
        }

        function hide(id) {
            document.getElementById(id)?.classList.add('d-none');
        }

        document.getElementById('cod_departamento')?.addEventListener('change', function() {
            cargarMunicipios(this.value);
        });

        // Auto-ocultar notificación
        setTimeout(() => document.getElementById('alerta-flash')?.remove(), 4000);
    </script>
</body>

</html>