<?php

require __DIR__ . '/vendor/autoload.php';

//database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'sales2');
define('DB_USER', 'vagrant');
define('DB_PASS', 'vagrant');

//directories and paths
define('DIR_SEPARATOR', '/');
define('THEME_DIR', __DIR__ . '/Theme');
define('THEME_INCLUDES_DIR', THEME_DIR . '/templates/includes/');
define('THEME_BASE_PATH', '/www/Theme');

//some formatting
define('MONEY_SYMBOL', '€');
define('DATE_FORMAT', 'Y-m-d');