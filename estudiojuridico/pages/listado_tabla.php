<?php
include "../includes/db_connection.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Estudio Jurídico Barreyro & Gondallier</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS UNIFICADO -->
    <link rel="stylesheet" href="../css/styles.css">
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
            <h1 class="page-title">Servicios Jurídicos</h1>
            <p class="page-subtitle">Consulte nuestros servicios y áreas de especialización</p>
        </div>

        <div class="view-toggle">
            <a href="listado_tabla.html" class="toggle-btn active">Vista Tabla</a>
            <a href="listado_box.html" class="toggle-btn">Vista Boxes</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Área</th>
                        <th>Descripción</th>
                        <th>Tarifa Consulta</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="service-name">Asesoramiento en Derecho Civil</td>
                        <td class="service-area">Derecho Civil</td>
                        <td>Contratos, obligaciones, responsabilidad civil, derechos reales</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=civil" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Divorcios y Separaciones</td>
                        <td class="service-area">Derecho de Familia</td>
                        <td>Divorcios consensuados, contenciosos, convenio regulador</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=divorcio" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Régimen de Visitas</td>
                        <td class="service-area">Derecho de Familia</td>
                        <td>Regulación de visitas, tenencia de hijos menores</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=visitas" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Cuotas Alimentarias</td>
                        <td class="service-area">Derecho de Familia</td>
                        <td>Fijación, aumento y ejecución de cuotas alimentarias</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=alimentarias" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Despidos Laborales</td>
                        <td class="service-area">Derecho Laboral</td>
                        <td>Reclamos por despido, indemnizaciones, liquidaciones</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=despidos" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Accidentes Laborales</td>
                        <td class="service-area">Derecho Laboral</td>
                        <td>Reclamos ART, enfermedades profesionales, incapacidades</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=accidentes" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Constitución de Sociedades</td>
                        <td class="service-area">Derecho Comercial</td>
                        <td>SRL, SA, Sociedades por acciones simplificadas</td>
                        <td class="price">$20.000</td>
                        <td><a href="producto.html?id=sociedades" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Contratos Comerciales</td>
                        <td class="service-area">Derecho Comercial</td>
                        <td>Redacción y revisión de contratos empresariales</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=contratos" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Sucesiones</td>
                        <td class="service-area">Derecho Sucesorio</td>
                        <td>Declaratoria de herederos, testamentos, particiones</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=sucesiones" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Defensa Penal</td>
                        <td class="service-area">Derecho Penal</td>
                        <td>Defensa en causas penales, querellas, denuncias</td>
                        <td class="price">$22.000</td>
                        <td><a href="producto.html?id=penal" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Asesoramiento Internacional</td>
                        <td class="service-area">Derecho Internacional</td>
                        <td>Tratados, convenios, operaciones transfronterizas</td>
                        <td class="price">$25.000</td>
                        <td><a href="producto.html?id=internacional" class="action-btn">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td class="service-name">Violencia de Género</td>
                        <td class="service-area">Derecho de Familia</td>
                        <td>Medidas de protección, denuncias, asesoramiento integral</td>
                        <td class="price">$15.000</td>
                        <td><a href="producto.html?id=violencia" class="action-btn">Ver Detalles</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript -->
<script src="../js/listado_box.js"></script></body>
</html>