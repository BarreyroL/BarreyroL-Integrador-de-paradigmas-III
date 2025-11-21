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
            <li><a href="listado_tabla.php" class="nav-link">Servicios</a></li>
            <li><a href="listado_box.php" class="nav-link">Servicios</a></li>
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
        <a href="listado_tabla.php" class="toggle-btn">Vista Tabla</a>
        <a href="listado_box.php" class="toggle-btn active">Vista Boxes</a>
    </div>

    <div class="services-grid">

    <?php
    // CONSULTA A LA BASE DE DATOS
    $sql = "SELECT * FROM servicios ORDER BY area ASC";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($serv = $resultado->fetch_assoc()) {

            echo '
            <div class="service-card">
                
                <!-- ICONO POR DEFECTO -->
                <div class="service-icon">⚖️</div>

                <div class="service-area">'.$serv["area"].'</div>

                <h3 class="service-title">'.$serv["nombre"].'</h3>

                <p class="service-description">'.$serv["descripcion"].'</p>

                <div class="service-price">
                    $'.$serv["tarifa"].'
                    <span class="service-price-label">Consulta Online</span>
                </div>

                <a href="producto.php?id='.$serv["id"].'" class="service-btn">Ver Detalles</a>
            </div>
            ';
        }
    } else {
        echo "<p>No hay servicios cargados.</p>";
    }
    ?>

    </div>
</div>

</body>
</html>
