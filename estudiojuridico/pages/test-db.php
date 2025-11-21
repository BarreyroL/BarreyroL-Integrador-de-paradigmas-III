<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

try {
    $db = getDB();
    echo "✅ Conexión exitosa<br>";
    
    // Ver si la tabla existe
    $stmt = $db->query("SHOW TABLES LIKE 'servicios_disponibles'");
    if ($stmt->rowCount() > 0) {
        echo "✅ Tabla servicios_disponibles existe<br>";
        
        // Contar registros
        $count = $db->query("SELECT COUNT(*) FROM servicios_disponibles")->fetchColumn();
        echo "✅ Hay $count servicios en la tabla<br>";
    } else {
        echo "❌ La tabla servicios_disponibles NO existe<br>";
        echo "👉 Ejecuta el SQL del PASO 2<br>";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>