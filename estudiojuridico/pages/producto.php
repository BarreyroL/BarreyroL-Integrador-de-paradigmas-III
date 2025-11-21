<?php
include "../includes/db_connection.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Servicio - Estudio Jurídico</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS styles -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <div class="logo-icon">
                    <img src="../imgs/logo.png" alt="logo">
                     </div>
                <div class="logo-text">
                    <span class="logo-title">Barreyro & Gondallier</span>
                    <span class="logo-subtitle">Estudio Jurídico</span>
                </div>
            </a>
            <ul class="nav-links">
                <a href="index.php" class="nav-link">Inicio</a>
            <a href="listado_tabla.php" class="nav-link">Servicios</a>
            <a href="listado_box.php" class="nav-link">Servicios</a>
            <a href="comprar.php" class="nav-link">Consultar</a>

            </ul>
        </div>
    </nav>

    <div class="container">
        <a href="listado_box.html" class="back-link">← Volver a Servicios</a>

        <div class="service-detail" id="serviceDetail">
            <!-- El contenido se carga dinámicamente con JavaScript -->
        </div>
    </div>

    <!-- JavaScript -->
<script src="../js/listado_box.js"></script></body>
</html>