
// ==================== VARIABLES GLOBALES ====================
let isLoggedIn = false;
let currentUser = null;

// ==================== DATOS DE SERVICIOS ====================
const servicesData = {
    civil: {
        icon: "⚖️",
        category: "Derecho Civil",
        name: "Asesoramiento en Derecho Civil",
        price: "$15.000",
        description: "Ofrecemos asesoramiento legal integral en todas las ramas del derecho civil, tanto para personas físicas como jurídicas.",
        fullDescription: "Nuestro servicio de derecho civil abarca todo lo relacionado con las relaciones jurídicas entre particulares. Contamos con amplia experiencia en la resolución de conflictos civiles mediante negociación, mediación o litigio cuando sea necesario.",
        features: [
            "Redacción y revisión de contratos civiles",
            "Asesoramiento en obligaciones y responsabilidad civil",
            "Gestión de derechos reales (propiedad, usufructo, servidumbres)",
            "Reclamos por daños y perjuicios",
            "Prescripción adquisitiva y acciones posesorias",
            "Mediación prejudicial y resolución de conflictos"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "10 años de experiencia en derecho civil y comercial. Universidad de la Cuenca del Plata, Posadas, Misiones."
    },
    divorcio: {
        icon: "💔",
        category: "Derecho de Familia",
        name: "Divorcios y Separaciones",
        price: "$18.000",
        description: "Asesoramiento legal en procesos de divorcio, tanto consensuado como contencioso, con enfoque en la protección de sus derechos.",
        fullDescription: "Entendemos que el divorcio es un proceso difícil. Nuestro objetivo es guiarlo de manera profesional y empática, buscando siempre la mejor solución para usted y su familia.",
        features: [
            "Divorcios de mutuo acuerdo",
            "Divorcios contenciosos",
            "Redacción de convenios reguladores",
            "Liquidación de bienes gananciales",
            "Compensación económica",
            "Modificación de acuerdos post-divorcio"
        ],
        professional: "Dra. Erika Gondallier",
        experience: "8 años especializándose en derecho de familia. Universidad de la Cuenca del Plata, Posadas, Misiones."
    },
    visitas: {
        icon: "👨‍👩‍👧",
        category: "Derecho de Familia",
        name: "Régimen de Visitas",
        price: "$12.000",
        description: "Regulación del régimen de comunicación y visitas entre padres e hijos, priorizando el interés superior del menor.",
        fullDescription: "Trabajamos para establecer o modificar regímenes de visitas que permitan mantener vínculos saludables entre padres e hijos, siempre velando por el bienestar de los menores.",
        features: [
            "Establecimiento de régimen de visitas",
            "Modificación de regímenes existentes",
            "Régimen amplio o restringido según el caso",
            "Visitas supervisadas cuando sea necesario",
            "Reintegro familiar gradual",
            "Incumplimiento de régimen de visitas"
        ],
        professional: "Dra. Erika Gondallier",
        experience: "Especialista en derecho de familia con enfoque en niñez y adolescencia."
    },
    alimentarias: {
        icon: "💰",
        category: "Derecho de Familia",
        name: "Cuotas Alimentarias",
        price: "$14.000",
        description: "Fijación, aumento, disminución y ejecución de cuotas alimentarias para garantizar el bienestar de los menores.",
        fullDescription: "Nos encargamos de todos los aspectos relacionados con las obligaciones alimentarias, ya sea que necesite iniciar un reclamo o defenderse de uno.",
        features: [
            "Fijación de cuota alimentaria inicial",
            "Aumento de cuota por cambio de circunstancias",
            "Disminución de cuota alimentaria",
            "Ejecución de cuotas impagas",
            "Cese de la obligación alimentaria",
            "Alimentos para hijos mayores de edad"
        ],
        professional: "Dra. Erika Gondallier",
        experience: "Amplia trayectoria en reclamos alimentarios y protección de derechos de niños y adolescentes."
    },
    despidos: {
        icon: "👔",
        category: "Derecho Laboral",
        name: "Despidos Laborales",
        price: "$16.000",
        description: "Defensa de sus derechos laborales ante despidos injustificados o discriminatorios.",
        fullDescription: "Si ha sido despedido injustamente, podemos ayudarlo a obtener la indemnización que le corresponde según la legislación laboral argentina.",
        features: [
            "Análisis de la causa del despido",
            "Cálculo de indemnizaciones y conceptos adeudados",
            "Intimaciones telegráficas",
            "Negociación extrajudicial",
            "Demandas laborales",
            "Despidos discriminatorios o durante embarazo"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Especialista en conflictos laborales individuales y colectivos."
    },
    accidentes: {
        icon: "🏥",
        category: "Derecho Laboral",
        name: "Accidentes Laborales",
        price: "$17.000",
        description: "Reclamos contra ART por accidentes de trabajo y enfermedades profesionales.",
        fullDescription: "Lo asesoramos en todo el proceso de reclamo ante la ART, desde la denuncia inicial hasta la obtención de la compensación por incapacidad.",
        features: [
            "Denuncia de accidentes de trabajo",
            "Reclamos por enfermedades profesionales",
            "Determinación del porcentaje de incapacidad",
            "Reclamos por incapacidad laboral",
            "Indemnizaciones por gran invalidez",
            "Reclamos por fallecimiento"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Experto en derecho del trabajo y seguridad social."
    },
    sociedades: {
        icon: "🏢",
        category: "Derecho Comercial",
        name: "Constitución de Sociedades",
        price: "$20.000",
        description: "Constitución, modificación y disolución de sociedades comerciales.",
        fullDescription: "Asesoramos integralmente en la creación de sociedades, seleccionando el tipo societario más conveniente para su emprendimiento.",
        features: [
            "Constitución de SRL y SA",
            "Sociedades por Acciones Simplificadas (SAS)",
            "Modificación de estatutos sociales",
            "Aumento y reducción de capital",
            "Transformación y fusión de sociedades",
            "Disolución y liquidación societaria"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Asesor de empresas con formación en derecho societario y comercial."
    },
    contratos: {
        icon: "📄",
        category: "Derecho Comercial",
        name: "Contratos Comerciales",
        price: "$13.000",
        description: "Redacción, revisión y negociación de contratos empresariales.",
        fullDescription: "Proteja su negocio con contratos bien redactados que prevengan futuros conflictos y aseguren sus intereses comerciales.",
        features: [
            "Contratos de compraventa comercial",
            "Contratos de distribución y franquicia",
            "Contratos de prestación de servicios",
            "Contratos de locación comercial",
            "Acuerdos de confidencialidad (NDA)",
            "Revisión y análisis de contratos"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Especialista en negociaciones comerciales y contratos empresariales."
    },
    sucesiones: {
        icon: "🏛️",
        category: "Derecho Sucesorio",
        name: "Sucesiones",
        price: "$19.000",
        description: "Tramitación de sucesiones, testamentos y particiones hereditarias.",
        fullDescription: "Gestionamos todos los aspectos del derecho sucesorio, desde la declaratoria de herederos hasta la adjudicación final de bienes.",
        features: [
            "Declaratoria de herederos",
            "Redacción de testamentos",
            "Inventario y avalúo de bienes",
            "Partición de herencia",
            "Sucesiones internacionales",
            "Impuesto a la transmisión gratuita de bienes"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Amplia experiencia en derecho sucesorio y planificación patrimonial."
    },
    penal: {
        icon: "⚖️",
        category: "Derecho Penal",
        name: "Defensa Penal",
        price: "$22.000",
        description: "Defensa penal en todas las instancias del proceso penal.",
        fullDescription: "Defendemos sus derechos ante acusaciones penales, garantizando un proceso justo y el respeto de todas las garantías constitucionales.",
        features: [
            "Defensa en causas penales",
            "Querella y constitución en parte querellante",
            "Denuncias penales",
            "Excarcelaciones y eximiciones de prisión",
            "Recursos de apelación y casación",
            "Defensa en juicio oral"
        ],
        professional: "Dra. Erika Gondallier",
        experience: "Especialista en derecho penal y procesal penal."
    },
    internacional: {
        icon: "🌎",
        category: "Derecho Internacional",
        name: "Asesoramiento Internacional",
        price: "$25.000",
        description: "Asesoramiento en derecho internacional público y privado.",
        fullDescription: "Brindamos asesoramiento en operaciones transfronterizas, aplicación de tratados internacionales y resolución de conflictos con elemento extranjero.",
        features: [
            "Contratos internacionales",
            "Aplicación de tratados y convenios",
            "Derecho de integración (MERCOSUR)",
            "Reconocimiento de sentencias extranjeras",
            "Arbitraje comercial internacional",
            "Extradiciones y cooperación internacional"
        ],
        professional: "Dr. Matías Barreyro",
        experience: "Formación en derecho comparado y derecho internacional."
    },
    violencia: {
        icon: "🛡️",
        category: "Derecho de Familia",
        name: "Violencia de Género",
        price: "$10.000",
        description: "Asistencia integral a víctimas de violencia de género.",
        fullDescription: "Brindamos apoyo legal inmediato y seguimiento del caso, trabajando en conjunto con organismos especializados para su protección.",
        features: [
            "Medidas de protección urgentes",
            "Denuncias por violencia de género",
            "Exclusión del hogar del agresor",
            "Prohibición de acercamiento",
            "Botón antipánico",
            "Acompañamiento durante todo el proceso"
        ],
        professional: "Dra. Erika Gondallier",
        experience: "Formación especializada en perspectiva de género y violencia familiar."
    }
};

const servicesList = [
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

// ==================== INICIALIZACIÓN ====================
document.addEventListener('DOMContentLoaded', () => {
    initializePage();
});

function initializePage() {
    const currentPage = getCurrentPage();
    
    // Funciones comunes a todas las páginas
    setupMobileMenu();
    highlightActiveNavLink();
    
    // Funciones específicas por página
    if (currentPage === 'index.html') {
        initializeIndexPage();
    } else if (currentPage === 'producto.html') {
        loadServiceDetail();
    } else if (currentPage === 'comprar.html') {
        initializeComprarPage();
    }
    
    console.log('Estudio Jurídico Barreyro & Gondallier - Sistema iniciado');
}

function getCurrentPage() {
    const path = window.location.pathname;
    const page = path.substring(path.lastIndexOf('/') + 1);
    return page || 'index.html';
}

// ==================== MOBILE MENU ====================
function setupMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
    }
}

// ==================== NAVEGACIÓN ACTIVA ====================
function highlightActiveNavLink() {
    const currentPage = getCurrentPage();
    document.querySelectorAll('.nav-link').forEach(link => {
        const linkHref = link.getAttribute('href');
        if (linkHref === currentPage || 
            (currentPage === 'index.html' && linkHref === 'index.html') ||
            link.href === window.location.href) {
            link.style.color = 'var(--accent-gold)';
            link.classList.add('active');
        }
    });
}

// ==================== INDEX PAGE ====================
function initializeIndexPage() {
    setupScrollEffects();
    setupAuthSystem();
}
const USUARIO_ADMIN = 'admin';        
const PASSWORD_ADMIN = 'admin123';    
function setupScrollEffects() {
    const navbar = document.getElementById('navbar');
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        // Efecto del navbar
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }

        // Activar link según sección visible
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (scrollY >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}` || 
                (current === '' && link.getAttribute('href').includes('index.html'))) {
                link.classList.add('active');
            }
        });
    });
}

function setupAuthSystem() {
    const registerBtn = document.getElementById('registerBtn');
    const consultaBtn = document.getElementById('consultaBtn');
    const modalClose = document.getElementById('modalClose');
    const registerForm = document.getElementById('registerForm');
    const authModal = document.getElementById('authModal');

    if (registerBtn) {
        registerBtn.addEventListener('click', () => openAuthModal());
    }

    if (consultaBtn) {
        consultaBtn.addEventListener('click', handleConsultaClick);
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeAuthModal);
    }

    if (authModal) {
        authModal.addEventListener('click', (e) => {
            if (e.target === authModal) {
                closeAuthModal();
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            handleRegister();
        });
    }

    // Smooth scroll para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                const mobileMenu = document.getElementById('mobileMenu');
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                }
            }
        });
    });

    // Validación de campos
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('blur', () => validateField(input));
    });

    // Cerrar modal con ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && authModal && authModal.classList.contains('active')) {
            closeAuthModal();
        }
    });
}

function handleConsultaClick() {
    if (isLoggedIn) {
        window.location.href = 'comprar.html';
    } else {
        showNotification('Debe registrarse primero para solicitar una consulta', 'info');
        setTimeout(() => {
            openAuthModal();
        }, 1500);
    }
}

function openAuthModal() {
    const authModal = document.getElementById('authModal');
    if (authModal) {
        authModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeAuthModal() {
    const authModal = document.getElementById('authModal');
    if (authModal) {
        authModal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

function handleRegister() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        showNotification('Las contraseñas no coinciden', 'error');
        return;
    }

    if (password.length < 6) {
        showNotification('La contraseña debe tener al menos 6 caracteres', 'error');
        return;
    }

    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Creando cuenta...';
    submitBtn.disabled = true;

    setTimeout(() => {
        currentUser = {
            firstName,
            lastName,
            email,
            phone,
            fullName: `${firstName} ${lastName}`
        };
        
        isLoggedIn = true;
        
        submitBtn.textContent = '¡Cuenta creada!';
        
        setTimeout(() => {
            closeAuthModal();
            updateAuthButtons();
            showNotification('Registro exitoso. Ya puede solicitar consultas jurídicas', 'success');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            document.getElementById('registerForm').reset();
            
            setTimeout(() => {
                if (confirm('¿Desea solicitar una consulta ahora?')) {
                    window.location.href = 'comprar.html';
                }
            }, 1500);
        }, 1000);
    }, 2000);
}

function updateAuthButtons() {
    const authButtons = document.querySelector('.auth-buttons');
    
    if (isLoggedIn && authButtons) {
        authButtons.innerHTML = `
            <span style="color: var(--text-secondary); margin-right: 1rem;">Bienvenido, ${currentUser.firstName}</span>
            <button class="register-btn" id="logoutBtn">Cerrar Sesión</button>
        `;
        
        document.getElementById('logoutBtn').addEventListener('click', handleLogout);
        
        const consultaBtn = document.getElementById('consultaBtn');
        if (consultaBtn) {
            consultaBtn.textContent = 'Solicitar Consulta';
        }
    } else if (authButtons) {
        authButtons.innerHTML = `
            <button class="register-btn" id="registerBtn">Registrarse</button>
        `;
        
        document.getElementById('registerBtn').addEventListener('click', () => {
            openAuthModal();
        });
    }
}

function handleLogout() {
    if (confirm('¿Está seguro que desea cerrar sesión?')) {
        isLoggedIn = false;
        currentUser = null;
        updateAuthButtons();
        showNotification('Sesión cerrada correctamente', 'info');
    }
}

function validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    let isValid = true;

    if (field.hasAttribute('required') && !value) {
        isValid = false;
    } else if (type === 'email' && value && !isValidEmail(value)) {
        isValid = false;
    } else if (type === 'password' && value && value.length < 6) {
        isValid = false;
    }

    if (isValid) {
        field.style.borderColor = 'rgba(34, 197, 94, 0.5)';
    } else {
        field.style.borderColor = 'rgba(239, 68, 68, 0.5)';
    }

    return isValid;
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// ==================== PRODUCTO PAGE ====================
function loadServiceDetail() {
    const serviceId = getServiceIdFromUrl();
    const service = servicesData[serviceId] || servicesData.civil;

    const detailHTML = `
        <div class="service-header">
            <div class="service-icon-large">${service.icon}</div>
            <div class="service-category">${service.category}</div>
            <h1 class="service-name">${service.name}</h1>
            <div class="service-price-large">
                ${service.price}
                <span class="price-label">Consulta Online - Pago único</span>
            </div>
        </div>

        <div class="service-content">
            <div class="content-section">
                <h2 class="content-title">📋 Descripción del Servicio</h2>
                <p class="content-text">${service.description}</p>
                <p class="content-text">${service.fullDescription}</p>
            </div>

            <div class="content-section">
                <h2 class="content-title">✓ Incluye</h2>
                <ul class="features-list">
                    ${service.features.map(feature => `<li>${feature}</li>`).join('')}
                </ul>
            </div>

            <div class="content-section">
                <h2 class="content-title">👨‍⚖️ Profesional a Cargo</h2>
                <div class="professional-info">
                    <div class="professional-name">${service.professional}</div>
                    <p class="content-text">${service.experience}</p>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="comprar.html?servicio=${serviceId}" class="btn-consult">Solicitar Consulta</a>
            <a href="listado_box.html" class="btn-back">Ver Otros Servicios</a>
        </div>
    `;

    const detailContainer = document.getElementById('serviceDetail');
    if (detailContainer) {
        detailContainer.innerHTML = detailHTML;
        document.title = `${service.name} - Estudio Jurídico`;
    }
}

function getServiceIdFromUrl() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id') || 'civil';
}

// ==================== COMPRAR PAGE ====================
function initializeComprarPage() {
    loadServices();
    setupComprarForm();
}

function loadServices() {
    const checklist = document.getElementById('servicesChecklist');
    if (!checklist) return;
    
    const urlParams = new URLSearchParams(window.location.search);
    const preselectedService = urlParams.get('servicio');

    servicesList.forEach(service => {
        const div = document.createElement('div');
        div.className = 'service-checkbox';
        
        const isChecked = service.id === preselectedService ? 'checked' : '';
        
        div.innerHTML = `
            <input type="checkbox" id="service_${service.id}" value="${service.id}" ${isChecked} data-price="${service.price}">
            <label for="service_${service.id}">
                <span>${service.name}</span>
                <span class="service-price">${service.price.toLocaleString('es-AR')}</span>
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

    const totalElement = document.getElementById('totalAmount');
    if (totalElement) {
        totalElement.textContent = `${total.toLocaleString('es-AR')}`;
    }
}

function setupComprarForm() {
    const consultaForm = document.getElementById('consultaForm');
    if (consultaForm) {
        consultaForm.addEventListener('submit', (e) => {
            e.preventDefault();
            handleComprarSubmit();
        });
    }
}

function handleComprarSubmit() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    const paymentMethod = document.getElementById('paymentMethod').value;

    const selectedServices = [];
    document.querySelectorAll('.services-checklist input[type="checkbox"]:checked').forEach(checkbox => {
        const serviceName = checkbox.parentElement.querySelector('label span').textContent;
        selectedServices.push(serviceName);
    });

    if (selectedServices.length === 0) {
        showNotification('Debe seleccionar al menos un servicio', 'error');
        return;
    }

    if (!paymentMethod) {
        showNotification('Debe seleccionar un método de pago', 'error');
        return;
    }

    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Enviando consulta...';
    submitBtn.disabled = true;

    setTimeout(() => {
        submitBtn.textContent = 'Consulta enviada!';
        
        const total = document.getElementById('totalAmount').textContent;
        const paymentMethodText = paymentMethod === 'transferencia' ? 'Transferencia Bancaria' : 'Efectivo';
        
        const confirmationMessage = `
Consulta registrada exitosamente para ${firstName} ${lastName}.

Servicios solicitados: ${selectedServices.join(', ')}
Total: ${total}
Método de pago: ${paymentMethodText}

Recibirá un email a ${email} con los detalles de pago y fecha de la consulta.
        `;
        
        setTimeout(() => {
            alert(confirmationMessage);
            showNotification('Consulta enviada correctamente. Revise su email.', 'success');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            document.getElementById('consultaForm').reset();
            calculateTotal();
            
            setTimeout(() => {
                window.location.href = 'index.html';
            }, 3000);
        }, 1000);
    }, 2500);
}

// ==================== NOTIFICACIONES ====================
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('show');
    }, 100);

    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 4000);
}