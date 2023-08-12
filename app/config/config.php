<?php
//App root
define('APP_ROOT', dirname(dirname(dirname(__FILE__))));

load_files(dirname(__FILE__));

if (defined('DEV_MODE') && DEV_MODE) return;

//production configs
//URL root
define('URL_ROOT', '_YOUR_URL_');
//Site Name
define('SITE_NAME', 'Modelo MVC');
//Site version
define('APP_VERSION', '0.1b');
