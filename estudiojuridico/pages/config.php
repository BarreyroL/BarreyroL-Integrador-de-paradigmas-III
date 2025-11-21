<?php
/**
 * CONFIGURACIÓN DE BASE DE DATOS
 * Archivo principal de configuración del sistema
 */

// ============================================
// CONFIGURACIÓN DE CONEXIÓN
// ============================================

// Para LOCALHOST (XAMPP)
define('DB_HOST', 'localhost');
define('DB_NAME', 'estudio_juridico');
define('DB_USER', 'root');
define('DB_PASS', '');           // Sin contraseña en XAMPP
define('DB_CHARSET', 'utf8mb4');


// ============================================
// CLASE DE CONEXIÓN (PATRÓN SINGLETON)
// ============================================

class Database {
    private static $instance = null;
    private $conn;

    /**
     * Constructor privado - Patrón Singleton
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ];
            
            $this->conn = new PDO($dsn, DB_USER, DB_PASS, $options);
            
        } catch(PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            die("Error de conexión a la base de datos. Por favor contacte al administrador.");
        }
    }

    /**
     * Obtener instancia única de la base de datos
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Obtener conexión PDO
     */
    public function getConnection() {
        return $this->conn;
    }

    // Evitar clonación
    private function __clone() {}
    
    // Evitar deserialización
    public function __wakeup() {
        throw new Exception("No se puede deserializar singleton");
    }
}

// ============================================
// FUNCIÓN HELPER PRINCIPAL
// ============================================

/**
 * Obtener conexión a la base de datos
 * Esta es la función que usarás en todos tus archivos
 */
function getDB() {
    return Database::getInstance()->getConnection();
}

// ============================================
// FUNCIONES DE SEGURIDAD
// ============================================

/**
 * Limpiar y sanitizar datos de entrada
 */
function limpiarDato($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
    return $dato;
}

/**
 * Validar formato de email
 */
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Validar teléfono (formato básico)
 */
function validarTelefono($telefono) {
    // Acepta números, espacios, guiones y paréntesis
    return preg_match('/^[\d\s\-\(\)]+$/', $telefono);
}

// ============================================
// FUNCIONES DE LOGGING
// ============================================

/**
 * Registrar errores en archivo
 */
function logError($mensaje, $datos = []) {
    $fecha = date('Y-m-d H:i:s');
    $log = "[$fecha] ERROR: $mensaje";
    
    if (!empty($datos)) {
        $log .= " | Datos: " . json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
    
    error_log($log . "\n", 3, __DIR__ . '/errores.log');
}

/**
 * Registrar actividad del sistema
 */
function logActividad($tipo, $descripcion, $datos = []) {
    $fecha = date('Y-m-d H:i:s');
    $log = "[$fecha] [$tipo] $descripcion";
    
    if (!empty($datos)) {
        $log .= " | " . json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
    
    error_log($log . "\n", 3, __DIR__ . '/actividad.log');
}

// ============================================
// FUNCIONES DE UTILIDAD
// ============================================

/**
 * Formatear precio en pesos argentinos
 */
function formatearPrecio($precio) {
    return '$' . number_format($precio, 0, ',', '.');
}

/**
 * Formatear fecha en español
 */
function formatearFecha($fecha, $formato = 'd/m/Y H:i') {
    return date($formato, strtotime($fecha));
}

/**
 * Generar token seguro
 */
function generarToken($longitud = 32) {
    return bin2hex(random_bytes($longitud));
}

/**
 * Verificar si tabla existe en la BD
 */
function tablaExiste($nombreTabla) {
    try {
        $db = getDB();
        $stmt = $db->prepare("SHOW TABLES LIKE ?");
        $stmt->execute([$nombreTabla]);
        return $stmt->rowCount() > 0;
    } catch (Exception $e) {
        logError("Error verificando tabla", ['tabla' => $nombreTabla, 'error' => $e->getMessage()]);
        return false;
    }
}

// ============================================
// VERIFICACIÓN DE CONEXIÓN (OPCIONAL)
// ============================================

/**
 * Probar conexión a la base de datos
 * Descomentar para testing
 */
/*
try {
    $db = getDB();
    echo "✅ Conexión exitosa a la base de datos<br>";
    echo "Base de datos: " . DB_NAME . "<br>";
    echo "Usuario: " . DB_USER . "<br>";
} catch (Exception $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
*/

// ============================================
// CONFIGURACIÓN DE ZONA HORARIA
// ============================================

date_default_timezone_set('America/Argentina/Buenos_Aires');

// ============================================
// CONFIGURACIÓN DE ERRORES
// ============================================

// En desarrollo (localhost)
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    // En producción
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// ============================================
// INFORMACIÓN DEL SISTEMA
// ============================================

define('SYSTEM_NAME', 'Estudio Jurídico Barreyro & Gondallier');
define('SYSTEM_VERSION', '1.0.0');
define('SYSTEM_EMAIL', 'estudiojuridicogondallier@gmail.com');

// ============================================
// NOTAS DE USO
// ============================================

/*
CÓMO USAR ESTE ARCHIVO:

1. En cualquier archivo PHP, incluir al inicio:
   require_once 'config.php';

2. Para obtener conexión:
   $db = getDB();

3. Ejemplo de consulta:
   $db = getDB();
   $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
   $stmt->execute([$email]);
   $usuario = $stmt->fetch();

4. Limpiar datos de usuario:
   $nombre = limpiarDato($_POST['nombre']);

5. Validar email:
   if (validarEmail($email)) {
       // Email válido
   }

6. Registrar error:
   logError('Error al guardar', ['usuario_id' => 10]);

7. Registrar actividad:
   logActividad('LOGIN', 'Usuario ingresó', ['email' => $email]);
*/
?>