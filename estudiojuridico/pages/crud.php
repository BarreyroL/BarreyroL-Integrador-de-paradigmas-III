<php
 html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Servicios - Estudio Jurídico</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* ESTILOS DEL LOGIN */
        .login-overlay {               
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 35, 50, 0.95) 0%, rgba(36, 52, 71, 0.95) 100%);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        
        .login-box {
            background: rgba(36, 52, 71, 0.9);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 16px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        
        .login-title {
            color: var(--accent-gold);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }
        
        .login-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .login-form .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .login-form .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(26, 35, 50, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .login-form .form-input:focus {
            outline: none;
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        .login-btn {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--accent-gold), #b8941f);
            border: none;
            border-radius: 8px;
            color: #1a2332;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
        }
        
        .login-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .login-error {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid #ef4444;
            color: #fecaca;
            padding: 0.875rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        
        .login-hint {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            color: var(--text-secondary);
            font-size: 0.85rem;
        }
        
        .login-hint strong {
            color: var(--accent-gold);
        }
        
        .back-to-site {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .back-to-site a {
            color: var(--accent-gold);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        
        .back-to-site a:hover {
            color: var(--accent-blue);
        }
        
        /* ESTILOS DEL CRUD */
        .crud-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 8rem 2rem 2rem;
        }
        
        .crud-header {
            background: rgba(36, 52, 71, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .crud-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }
        
        .crud-card {
            background: rgba(36, 52, 71, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            padding: 2rem;
        }
        
        .crud-title {
            color: var(--accent-gold);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 0.75rem;
            background: rgba(26, 35, 50, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: inherit;
        }
        
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--accent-gold);
        }
        
        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .btn-crud {
            width: 100%;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--accent-gold), #b8941f);
            border: none;
            border-radius: 8px;
            color: #1a2332;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-crud:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
        }
        
        .btn-actualizar {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .btn-cancelar {
            background: transparent;
            border: 1px solid var(--accent-gold);
            color: var(--accent-gold);
            margin-top: 0.5rem;
        }
        
        .btn-cancelar:hover {
            background: rgba(212, 175, 55, 0.1);
        }
        
        .btn-logout {
            padding: 0.75rem 1.5rem;
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            background: #dc2626;
        }
        
        .crud-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .crud-table th,
        .crud-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .crud-table th {
            background: rgba(212, 175, 55, 0.1);
            font-weight: 600;
            color: var(--accent-gold);
        }
        
        .crud-table tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }
        
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-activo {
            background: #d1fae5;
            color: #065f46;
        }
        
        .badge-inactivo {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .btn-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-small {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s;
        }
        
        .btn-editar {
            background: #f59e0b;
            color: white;
        }
        
        .btn-editar:hover {
            background: #d97706;
        }
        
        .btn-eliminar {
            background: #ef4444;
            color: white;
        }
        
        .btn-eliminar:hover {
            background: #dc2626;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-secondary);
        }
        
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .checkbox-wrapper input[type="checkbox"] {
            width: auto;
            cursor: pointer;
        }
        
        @media (max-width: 968px) {
            .crud-grid {
                grid-template-columns: 1fr;
            }
            
            .crud-header {
                flex-direction: column;
            }
            
            .login-box {
                margin: 1rem;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-effects">
        <div class="bg-grid"></div>
    </div>

    <!-- PANTALLA DE LOGIN -->
    <div class="login-overlay" id="loginOverlay">
        <div class="login-box">
            <div class="login-header">
                <div class="login-icon">🔐</div>
                <h2 class="login-title">Panel de Administración</h2>
                <p class="login-subtitle">Gestión de Servicios Jurídicos</p>
            </div>

            <div id="loginErrorMsg"></div>

            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-input" id="loginUsuario" placeholder="Ingresa tu usuario" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-input" id="loginPassword" placeholder="Ingresa tu contraseña" required>
                </div>

                <button type="submit" class="login-btn" id="loginBtn">
                    🔓 Iniciar Sesión
                </button>

                <div class="login-hint">
                    <strong>Usuario:</strong> admin<br>
                    <strong>Contraseña:</strong> admin123
                </div>
            </form>

            <div class="back-to-site">
                <a href="index.php">← Volver al sitio</a>
            </div>
        </div>
    </div>

    <!-- PANEL CRUD (oculto hasta login) -->
    <div id="crudPanel" style="display: none;">
        <nav class="navbar">
            <div class="nav-container">
                <a href="index.php" class="logo">
                    <div class="logo-icon">
                        <img src="imgs/logo.png" alt="logo">
                    </div>
                    <div class="logo-text">
                        <span class="logo-title">Barreyro & Gondallier</span>
                        <span class="logo-subtitle">Estudio Jurídico</span>
                    </div>
                </a>
                
                <ul class="nav-links">
                    <li><a href="index.php"nav-link">Inicio</a></li>
                    <li><a href="listado_tabla.php"nav-link">Servicios</a></li>
                    <li><a href="comprar.php"nav-link">Consultar</a></li>
                </ul>
            </div>
        </nav>

        <div class="crud-container">
            <div class="crud-header">
                <div>
                    <h1 style="color: var(--accent-gold); font-size: 2rem; margin-bottom: 0.5rem;">
                        📋 Gestión de Servicios
                    </h1>
                    <p style="color: var(--text-secondary);">
                        Panel de administración de servicios jurídicos
                    </p>
                </div>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="index.html" class="btn-crud" style="width: auto; text-decoration: none;">
                        ← Volver al Inicio
                    </a>
                    <button onclick="cerrarSesion()" class="btn-logout">
                        🚪 Cerrar Sesión
                    </button>
                </div>
            </div>

            <div id="alertContainer"></div>

            <div class="crud-grid">
                <!-- FORMULARIO -->
                <div class="crud-card">
                    <h2 class="crud-title" id="formTitle">➕ Crear Servicio</h2>
                    
                    <form id="servicioForm">
                        <input type="hidden" id="servicioId">
                        
                        <div class="form-group">
                            <label class="form-label">Código *</label>
                            <input type="text" class="form-input" id="codigo" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Nombre *</label>
                            <input type="text" class="form-input" id="nombre" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Categoría *</label>
                            <select class="form-select" id="categoria" required>
                                <option value="">Seleccionar...</option>
                                <option value="Derecho Civil">Derecho Civil</option>
                                <option value="Derecho de Familia">Derecho de Familia</option>
                                <option value="Derecho Laboral">Derecho Laboral</option>
                                <option value="Derecho Comercial">Derecho Comercial</option>
                                <option value="Derecho Penal">Derecho Penal</option>
                                <option value="Derecho Sucesorio">Derecho Sucesorio</option>
                                <option value="Derecho Internacional">Derecho Internacional</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Descripción *</label>
                            <textarea class="form-textarea" id="descripcion" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Precio *</label>
                            <input type="number" class="form-input" id="precio" step="0.01" required>
                        </div>
                        
                        <div class="form-group" id="activoGroup" style="display: none;">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="activo" checked>
                                <label for="activo" class="form-label" style="margin: 0;">Servicio Activo</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-crud" id="submitBtn">
                            ➕ Crear Servicio
                        </button>
                        
                        <button type="button" class="btn-crud btn-cancelar" id="cancelBtn" style="display: none;">
                            ❌ Cancelar
                        </button>
                    </form>
                </div>

                <!-- LISTADO -->
                <div class="crud-card">
                    <h2 class="crud-title">📋 Servicios (<span id="totalServicios">0</span>)</h2>
                    
                    <div id="tablaMensaje" class="empty-state">
                        <p>Cargando servicios...</p>
                    </div>
                    
                    <table class="crud-table" id="tablaServicios" style="display: none;">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="serviciosBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // CREDENCIALES (cambiar en producción)
        const USUARIO_ADMIN = 'admin';
        const PASSWORD_ADMIN = 'admin123';

        // Base de datos simulada
        let servicios = [
            { id: 1, codigo: 'civil', nombre: 'Derecho Civil', categoria: 'Derecho Civil', descripcion: 'Asesoramiento legal integral', precio: 15000, activo: true },
            { id: 2, codigo: 'divorcio', nombre: 'Divorcios y Separaciones', categoria: 'Derecho de Familia', descripcion: 'Asesoramiento en divorcios', precio: 18000, activo: true },
            { id: 3, codigo: 'visitas', nombre: 'Régimen de Visitas', categoria: 'Derecho de Familia', descripcion: 'Regulación de visitas', precio: 12000, activo: true }
        ];
        
        let nextId = 4;
        let editandoId = null;
        let sesionActiva = false;

        // SISTEMA DE LOGIN
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const usuario = document.getElementById('loginUsuario').value;
            const password = document.getElementById('loginPassword').value;
            const btn = document.getElementById('loginBtn');
            const errorMsg = document.getElementById('loginErrorMsg');
            
            btn.disabled = true;
            btn.textContent = 'Verificando...';
            
            setTimeout(() => {
                if (usuario === USUARIO_ADMIN && password === PASSWORD_ADMIN) {
                    // Login exitoso
                    sesionActiva = true;
                    localStorage.setItem('crud_session', 'true');
                    document.getElementById('loginOverlay').style.display = 'none';
                    document.getElementById('crudPanel').style.display = 'block';
                    cargarServicios();
                } else {
                    // Login fallido
                    errorMsg.innerHTML = '<div class="login-error">❌ Usuario o contraseña incorrectos</div>';
                    btn.disabled = false;
                    btn.textContent = '🔓 Iniciar Sesión';
                    
                    // Limpiar error después de 3 segundos
                    setTimeout(() => {
                        errorMsg.innerHTML = '';
                    }, 3000);
                }
            }, 800);
        });

        // Verificar sesión al cargar
        window.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('crud_session') === 'true') {
                sesionActiva = true;
                document.getElementById('loginOverlay').style.display = 'none';
                document.getElementById('crudPanel').style.display = 'block';
                cargarServicios();
            }
        });

        // Cerrar sesión
        function cerrarSesion() {
            if (confirm('¿Seguro que deseas cerrar sesión?')) {
                sesionActiva = false;
                localStorage.removeItem('crud_session');
                document.getElementById('loginOverlay').style.display = 'flex';
                document.getElementById('crudPanel').style.display = 'none';
                document.getElementById('loginForm').reset();
                mostrarAlerta('✅ Sesión cerrada correctamente', 'success');
            }
        }

        // Mostrar alertas
        function mostrarAlerta(mensaje, tipo) {
            const alertContainer = document.getElementById('alertContainer');
            const alert = document.createElement('div');
            alert.className = `alert alert-${tipo}`;
            alert.textContent = mensaje;
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alert);
            
            setTimeout(() => {
                alert.remove();
            }, 4000);
        }

        // Cargar servicios en la tabla
        function cargarServicios() {
            const tbody = document.getElementById('serviciosBody');
            const tabla = document.getElementById('tablaServicios');
            const mensaje = document.getElementById('tablaMensaje');
            const total = document.getElementById('totalServicios');
            
            total.textContent = servicios.length;
            
            if (servicios.length === 0) {
                tabla.style.display = 'none';
                mensaje.style.display = 'block';
                mensaje.innerHTML = '<p>No hay servicios registrados. ¡Crea el primero!</p>';
                return;
            }
            
            tabla.style.display = 'table';
            mensaje.style.display = 'none';
            
            tbody.innerHTML = servicios.map(s => `
                <tr>
                    <td><code>${s.codigo}</code></td>
                    <td>${s.nombre}</td>
                    <td>${s.categoria}</td>
                    <td><strong>$${s.precio.toLocaleString('es-AR')}</strong></td>
                    <td>
                        <span class="badge ${s.activo ? 'badge-activo' : 'badge-inactivo'}">
                            ${s.activo ? '✓ Activo' : '✗ Inactivo'}
                        </span>
                    </td>
                    <td>
                        <div class="btn-actions">
                            <button onclick="editarServicio(${s.id})" class="btn-small btn-editar">
                                ✏️ Editar
                            </button>
                            <button onclick="eliminarServicio(${s.id})" class="btn-small btn-eliminar">
                                🗑️ Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Manejar envío del formulario
        document.getElementById('servicioForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const codigo = document.getElementById('codigo').value.trim();
            const nombre = document.getElementById('nombre').value.trim();
            const categoria = document.getElementById('categoria').value;
            const descripcion = document.getElementById('descripcion').value.trim();
            const precio = parseFloat(document.getElementById('precio').value);
            const activo = document.getElementById('activo').checked;
            
            if (editandoId) {
                // ACTUALIZAR
                const index = servicios.findIndex(s => s.id === editandoId);
                if (index !== -1) {
                    servicios[index] = {
                        id: editandoId,
                        codigo,
                        nombre,
                        categoria,
                        descripcion,
                        precio,
                        activo
                    };
                    mostrarAlerta('✅ Servicio actualizado correctamente', 'success');
                }
            } else {
                // CREAR
                servicios.push({
                    id: nextId++,
                    codigo,
                    nombre,
                    categoria,
                    descripcion,
                    precio,
                    activo: true
                });
                mostrarAlerta('✅ Servicio creado correctamente', 'success');
            }
            
            limpiarFormulario();
            cargarServicios();
        });

        // Editar servicio
        function editarServicio(id) {
            const servicio = servicios.find(s => s.id === id);
            if (!servicio) return;
            
            editandoId = id;
            
            document.getElementById('servicioId').value = servicio.id;
            document.getElementById('codigo').value = servicio.codigo;
            document.getElementById('nombre').value = servicio.nombre;
            document.getElementById('categoria').value = servicio.categoria;
            document.getElementById('descripcion').value = servicio.descripcion;
            document.getElementById('precio').value = servicio.precio;
            document.getElementById('activo').checked = servicio.activo;
            
            document.getElementById('formTitle').textContent = '✏️ Editar Servicio';
            document.getElementById('submitBtn').textContent = '💾 Actualizar Servicio';
            document.getElementById('submitBtn').classList.add('btn-actualizar');
            document.getElementById('activoGroup').style.display = 'block';
            document.getElementById('cancelBtn').style.display = 'block';
            
            document.querySelector('.crud-card').scrollIntoView({ behavior: 'smooth' });
        }

        // Eliminar servicio
        function eliminarServicio(id) {
            if (confirm('¿Seguro que deseas eliminar este servicio?')) {
                servicios = servicios.filter(s => s.id !== id);
                mostrarAlerta('✅ Servicio eliminado correctamente', 'success');
                cargarServicios();
            }
        }

        // Cancelar edición
        document.getElementById('cancelBtn').addEventListener('click', () => {
            limpiarFormulario();
        });

        // Limpiar formulario
        function limpiarFormulario() {
            editandoId = null;
            document.getElementById('servicioForm').reset();
            document.getElementById('servicioId').value = '';
            document.getElementById('formTitle').textContent = '➕ Crear Servicio';
            document.getElementById('submitBtn').textContent = '➕ Crear Servicio';
            document.getElementById('submitBtn').classList.remove('btn-actualizar');
            document.getElementById('activoGroup').style.display = 'none';
            document.getElementById('cancelBtn').style.display = 'none';
        }
    </script>
</body>
</html>