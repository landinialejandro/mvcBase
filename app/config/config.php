<?php
// Raíz de la aplicación
define('APP_ROOT', dirname(dirname(dirname(__FILE__))));

// Verificar si la constante APP_ENV está definida
if (!defined('APP_ENV')) {
    define('APP_ENV', 'production'); // Valor predeterminado si no está definido
}

// Configuraciones por entorno
if (APP_ENV === 'development') {
    // Configuración de desarrollo
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'mysql');
    define('DB_NAME', 'employees');

    // URL base para desarrollo
    define('URL_ROOT', 'http://localhost/clientes/mios/mvcModelo');
} else {
    // Configuración de producción
    define('DB_HOST', 'prod-db-server');
    define('DB_USER', 'prod-user');
    define('DB_PASS', 'prod-pass');
    define('DB_NAME', 'prod-db');

    // URL base para producción
    define('URL_ROOT', 'https://www.tusitio.com');
}

// Nombre del sitio
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Modelo MVC');
}

// Versión de la aplicación
if (!defined('APP_VERSION')) {
    define('APP_VERSION', '0.1b');
}
