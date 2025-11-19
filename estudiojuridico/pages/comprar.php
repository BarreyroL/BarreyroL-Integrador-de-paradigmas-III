<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Consulta - Estudio Jurídico</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    
    <style>
        /* Estilos para las notificaciones */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            border-radius: 8px;
            font-weight: 500;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .notification.success {
            background: #10b981;
            color: white;
        }
        
        .notification.error {
            background: #ef4444;
            color: white;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="logo">
                <div class="logo-icon">
                    <img src="../imgs/logo.png" alt="logo">
                </div>
                <div class="logo-text">
                    <span class="logo-title">Barreyro & Gondallier</span>
                    <span class="logo-subtitle">Estudio Jurídico</span>
                </div>
            </a>
            
            <ul class="nav-links">
                <li><a href="index.html" class="nav-link">Inicio</a></li>
                <li><a href="listado_tabla.html" class="nav-link">Servicios </a></li>
                <li><a href="listado_box.html" class="nav-link">Servicios </a></li>
                <li><a href="comprar.html" class="nav-link">Consultar</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Solicitar Consulta</h1>
            <p class="page-subtitle">Complete el formulario para agendar su consulta jurídica online</p>
        </div>

        <div class="contact-grid">
            <div class="contact-info">
                <h3 class="info-title">Información de Contacto</h3>
                
                <div class="contact-item">
                    <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div class="contact-details">
                        <h4>Dirección</h4>
                        <p>Posadas, Misiones</p>
                        <p>Argentina</p>
                    </div>
                </div>

                <div class="contact-item">
                    <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <div class="contact-details">
                        <h4>Email</h4>
                        <p>estudiojuridicogondallier@gmail.com</p>
                        <p></p>
                    </div>
                </div>

                <div class="contact-item">
                    <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <div class="contact-de-citas">
                        <h4>Teléfono</h4>
                        <p>+54 (376) 4-618398</p>
                        <p>+54 (376) 4-618398</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3 class="form-title">Formulario de Consulta</h3>
                <form id="consultaForm">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-input" id="firstName" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-input" id="lastName" placeholder="Apellido" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" id="email" placeholder="correo@ejemplo.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" class="form-input" id="phone" placeholder="+54 376 4123456" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-input" id="address" placeholder="Calle, número, ciudad, provincia" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Asunto</label>
                        <input type="text" class="form-input" id="subject" placeholder="Motivo de la consulta" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mensaje</label>
                        <textarea class="form-textarea" id="message" placeholder="Describa brevemente su consulta..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Servicios Solicitados (seleccione uno o más)</label>
                        <div class="services-checklist" id="servicesChecklist"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Método de Pago</label>
                        <select class="form-select" id="paymentMethod" required>
                            <option value="">Seleccione un método de pago</option>
                            <option value="transferencia">Transferencia Bancaria</option>
                            <option value="efectivo">Efectivo</option>
                        </select>
                    </div>

                    <div class="total-section">
                        <div class="total-label">Total a Pagar</div>
                        <div class="total-amount" id="totalAmount">$0</div>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">Enviar Consulta</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const services = [
            { id: 'civil', name: 'Derecho Civil', price: 15000 },
            { id: 'divorcio', name: 'Divorcios y Separaciones', price: 18000 },
            { id: 'visitas', name: 'Régimen de Visitas', price: 12000 },
            { id: 'alimentarias', name: 'Cuotas Alimentarias', price: 14000 },
            { id: 'despidos', name: 'Despidos Laborales', price: 16000 },
            { id: 'accidentes', name: 'Accidentes Laborales', price: 17000 },
            { id: 'sociedades', name: 'Constitución de Sociedades', price: 20000 },
            { id: 'contratos', name: 'Contratos Comerciales', price: 13000 },
            { id: 'sucesiones', name: 'Sucesiones', price: 19000 },
            { id: 'penal', name: 'Defensa Penal', price: 22000 },
            { id: 'internacional', name: 'Asesoramiento Internacional', price: 25000 },
            { id: 'violencia', name: 'Violencia de Género', price: 10000 }
        ];

        function loadServices() {
            const checklist = document.getElementById('servicesChecklist');
            const urlParams = new URLSearchParams(window.location.search);
            const preselectedService = urlParams.get('servicio');

            services.forEach(service => {
                const div = document.createElement('div');
                div.className = 'service-checkbox';
                
                const isChecked = service.id === preselectedService ? 'checked' : '';
                
                div.innerHTML = `
                    <input type="checkbox" id="service_${service.id}" value="${service.id}" ${isChecked} data-price="${service.price}" data-name="${service.name}">
                    <label for="service_${service.id}">
                        <span>${service.name}</span>
                        <span class="service-price">$${service.price.toLocaleString('es-AR')}</span>
                    </label>
                `;
                
                checklist.appendChild(div);
            });

            document.querySelectorAll('.services-checklist input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotal);
            });

            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('.services-checklist input[type="checkbox"]:checked').forEach(checkbox => {
                total += parseInt(checkbox.dataset.price);
            });

            document.getElementById('totalAmount').textContent = `$${total.toLocaleString('es-AR')}`;
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 5000);
        }

        document.getElementById('consultaForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Enviando consulta...';
            submitBtn.disabled = true;

            // Recolectar datos del formulario
            const formData = new FormData();
            formData.append('firstName', document.getElementById('firstName').value);
            formData.append('lastName', document.getElementById('lastName').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('subject', document.getElementById('subject').value);
            formData.append('message', document.getElementById('message').value);
            formData.append('paymentMethod', document.getElementById('paymentMethod').value);

            // Recolectar servicios seleccionados
            const selectedServices = [];
            let total = 0;
            document.querySelectorAll('.services-checklist input[type="checkbox"]:checked').forEach(checkbox => {
                selectedServices.push(checkbox.dataset.name);
                total += parseInt(checkbox.dataset.price);
            });

            // Validaciones
            if (selectedServices.length === 0) {
                showNotification('Debe seleccionar al menos un servicio', 'error');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                return;
            }

            if (!document.getElementById('paymentMethod').value) {
                showNotification('Debe seleccionar un método de pago', 'error');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                return;
            }

            // Agregar servicios y total
            selectedServices.forEach(service => {
                formData.append('services[]', service);
            });
            formData.append('total', total);

            try {
                // Enviar formulario al PHP
                const response = await fetch('enviar-formulario.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showNotification(result.message, 'success');
                    document.getElementById('consultaForm').reset();
                    calculateTotal();
                } else {
                    showNotification(result.message, 'error');
                }
            } catch (error) {
                showNotification('Error al enviar la consulta. Por favor intente nuevamente.', 'error');
                console.error('Error:', error);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });

        // Cargar servicios al iniciar
        window.addEventListener('DOMContentLoaded', loadServices);
    </script>

    <script src="../js/listado_box.js"></script>
</body>
</html>