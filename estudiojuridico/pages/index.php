<?php
include "../includes/db_connection.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio Jurídico Barreyro & Gondallier</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS UNIFICADO -->
    <link rel="stylesheet" href="../css/styles.css">

<a href="crud.html" style="position: fixed; bottom: 20px; right: 20px; background: #d4af37; color: #1a2332; padding: 1rem; border-radius: 50%; text-decoration: none; font-size: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
    ⚙️
</head>
<body>
    
    <!-- Background Effects -->
    <div class="bg-effects">
        <div class="bg-grid"></div>
    </div>
 
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
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
                <li><a href="index.html" class="nav-link active">Inicio</a></li>
                <li><a href="listado_tabla.html" class="nav-link">Servicios </a></li>
                <li><a href="listado_box.html" class="nav-link">Servicios </a></li>
                <li><a href="comprar.html" class="nav-link">Consultar</a></li>
            </ul>
    
            </div>

            <div class="mobile-menu-btn" id="mobileMenuBtn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="mobile-menu" id="mobileMenu">
            <ul class="mobile-nav-links">
                <li><a href="index.html" class="nav-link">Inicio</a></li>
                <li><a href="listado_tabla.html" class="nav-link">Servicios (Tabla)</a></li>
                <li><a href="listado_box.html" class="nav-link">Servicios (Boxes)</a></li>
                <li><a href="comprar.html" class="nav-link">Consultar</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="hero-title">Estudio Jurídico Barreyro & Gondallier</h1>
            <p class="hero-subtitle">Asesoramiento legal especializado en Argentina </p>
            <div class="hero-buttons">
                <a href="listado_box.html" class="btn-secondary">Ver Servicios</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section" id="equipo">
        <div class="section-header">
            <div class="section-subtitle">Nuestro Equipo</div>
            <h2 class="section-title">Profesionales</h2>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-photo">MB</div>
                <h3 class="team-name"> Matías Barreyro</h3>
                <p class="team-title">Procurador</p>
                <p class="team-university">Universidad de la Cuenca del Plata<br>Posadas, Misiones</p>
                <div class="team-specialties">
                    <h4 class="specialty-title">Conocimiento en:</h4>
                    <ul class="specialty-list">
                        <li>Derecho de Familia</li>
                        <li>Derecho Laboral</li>
                        <li>Derecho en Familia</li>
                        <li>Contratos Comerciales</li>
                        <li>Asesoramiento contratos de alquiler</li>
                    </ul>
                </div>
            </div>

            <div class="team-card">
                <div class="team-photo">EG</div>
                <h3 class="team-name">Dra. Erika Gondallier</h3>
                <p class="team-title">Abogada</p>
                <p class="team-university">Universidad de la Cuenca del Plata<br>Posadas, Misiones</p>
                <div class="team-specialties">
                    <h4 class="specialty-title">Especialidades y Conocimiento:</h4>
                    <ul class="specialty-list">
                        Derecho Civil y Comercial
                        <li>diplomatura en transformación digital</li>
                        <li>Diplomatura en Federalismo</li>
                        <li>Derecho Público Provincial</li>
                        <li>curso de posgrado de nuevos modelos de negocios digitales</li>
                        <li>Mediación y Conciliación</li>
                        <li>Violencia de Género</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="section" id="servicios">
        <div class="section-header">
            <div class="section-subtitle">Nuestros Servicios</div>
            <h2 class="section-title">Áreas de Práctica</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">⚖️</div>
                <h3 class="service-title">Derecho Civil</h3>
                <p class="service-description">Asesoramiento en contratos, obligaciones, responsabilidad civil y derechos reales.</p>
                <a href="producto.html?id=civil" class="service-link">Ver más →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">👨‍👩‍👧‍👦</div>
                <h3 class="service-title">Derecho de Familia</h3>
                <p class="service-description">Divorcios, régimen de visitas, cuotas alimentarias y adopciones.</p>
                <a href="producto.html?id=divorcio" class="service-link">Ver más →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">💼</div>
                <h3 class="service-title">Derecho Laboral</h3>
                <p class="service-description">Despidos, accidentes laborales, conflictos sindicales y asesoramiento empresarial.</p>
                <a href="producto.html?id=despidos" class="service-link">Ver más →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3 class="service-title">Derecho Comercial</h3>
                <p class="service-description">Constitución de sociedades, contratos comerciales y derecho societario.</p>
                <a href="producto.html?id=sociedades" class="service-link">Ver más →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🌎</div>
                <h3 class="service-title">Derecho Internacional</h3>
                <p class="service-description">Tratados, convenios internacionales y asesoramiento transfronterizo.</p>
                <a href="producto.html?id=internacional" class="service-link">Ver más →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🏛️</div>
                <h3 class="service-title">Derecho Penal</h3>
                <p class="service-description">Defensa penal, querellas y asesoramiento en procesos penales.</p>
                <a href="producto.html?id=penal" class="service-link">Ver más →</a>
            </div>
        </div>
    </section>

</a>
 
</a>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Estudio Jurídico</h4>
                <ul class="footer-links">
                    <li><a href="index.html" class="footer-link">Inicio</a></li>
                    <li><a href="#equipo" class="footer-link">Nuestro Equipo</a></li>
                    <li><a href="listado_box.html" class="footer-link">Servicios</a></li>
                    <li><a href="comprar.html" class="footer-link">Contacto</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Servicios</h4>
                <ul class="footer-links">
                    <li><a href="producto.html?id=civil" class="footer-link">Derecho Civil</a></li>
                    <li><a href="producto.html?id=divorcio" class="footer-link">Derecho de Familia</a></li>
                    <li><a href="producto.html?id=despidos" class="footer-link">Derecho Laboral</a></li>
                    <li><a href="producto.html?id=sociedades" class="footer-link">Derecho Comercial</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contacto</h4>
                <ul class="footer-links">
                    <li style="color: var(--text-secondary);">Posadas, Misiones, Argentina</li>
                    <li><a href="mailto:Barreyroluciano@gmail.com" class="footer-link">Barreyroluciano@gmail.com</a></li>
                    <li><a href="tel:+543764123456" class="footer-link">+54 (376) 4-618398</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&&copy;studio Jurídico Barreyro & Gondallier. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript -->
<script src="../js/listado_box.js"></script></body>
</html>