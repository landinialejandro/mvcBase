<?php
// Cargar constantes globales
require_once dirname(__FILE__) . '/config/config.php';

// Auto-cargar librerías
function auto($class_name) {
    try {
        if (!class_exists($class_name)) {
            $file_path = APP_ROOT . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
            require_file($file_path);
        }
    } catch (Exception $e) {
        log_error("Clase no encontrada: " . $e->getMessage());
        throw $e; // Re-lanzar la excepción
    }
}

// Cargar todos los archivos de un directorio
function load_files($dirName, $fileType = "*.php") {
    if (!file_exists($dirName)) {
        throw new DirectoryNotFoundException("Directorio no encontrado: $dirName");
    }
    $files = glob($dirName . DIRECTORY_SEPARATOR . $fileType);
    foreach ($files as $file) {
        require_file($file);
    }
}

// Requerir un archivo
function require_file($file_path) {
    if (!file_exists($file_path)) {
        throw new FileNotFoundException("Archivo no encontrado: $file_path");
    }
    require_once $file_path;
}

// Registrar errores en un archivo
function log_error($message) {
    error_log("[" . date('Y-m-d H:i:s') . "] $message" . PHP_EOL, 3, APP_ROOT . '/logs/errors.log');
}

// Excepciones personalizadas
class FileNotFoundException extends Exception {}
class DirectoryNotFoundException extends Exception {}

// Registrar la función de autoload
spl_autoload_register('auto');

// Cargar configuraciones y helpers
load_files(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config');
load_files(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helpers');
