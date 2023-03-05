<?php
// Load configs
load_files(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config');
// Load helpers
load_files(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helpers');

// Auto Load libraries
function auto($class_name) {
    try {
        if (!class_exists($class_name)) {
            $file_path = APP_ROOT . '/libraries/' . str_replace('\\', '/', $class_name) . '.php';
            require_file($file_path);
        }
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
//require files from a folder
function load_files($dirName, $fileType = "*.php") {
    if (!file_exists($dirName)) throw new Error("dir not found");
    $files = glob($dirName . DIRECTORY_SEPARATOR . $fileType);
    foreach ($files as $file) {
        require_file($file);
    }
}
function require_file($file_path) {
    if (file_exists($file_path))  require_once $file_path;
}
spl_autoload_register('auto');
