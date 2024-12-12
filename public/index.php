<?php
// Cargar el archivo bootstrap
include_once '../app/bootstrap.php';

use \app\libraries\Core;
use Exception;

if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

try {
    // Inicializar la aplicación
    $init = new Core();
} catch (Exception $e) {
    if (APP_ENV === 'development') {
        // Mostrar detalles en desarrollo
        die("Error: " . $e->getMessage());
    } else {
        // Redirigir a una página de error en producción
        // header('Location: /error');
        exit;
    }
}
