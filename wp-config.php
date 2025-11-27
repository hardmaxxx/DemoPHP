<?php

// Leer las vars que ECS inyecta
$db_host = getenv('DB_HOST')     ?: '127.0.0.1';
$db_name = getenv('DB_DATABASE') ?: 'demo';
$db_user = getenv('DB_USERNAME') ?: 'laravel';
$db_pass = getenv('DB_PASSWORD') ?: '';
$db_port = getenv('DB_PORT')     ?: '3306';

// Config WordPress
define('DB_NAME',     $db_name);
define('DB_USER',     $db_user);
define('DB_PASSWORD', $db_pass);
// MySQL usa 3306 por defecto, así que podemos no poner el puerto:
define('DB_HOST',     $db_host); // o "$db_host:$db_port" si querés ser explícito

define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

$table_prefix = 'wp_';

// Logs/errores
define('WP_DEBUG', false);

// Clave única/salts (podés generar nuevas en https://api.wordpress.org/secret-key/1.1/salt/)
define('AUTH_KEY',         'poné algo fuerte acá');
define('SECURE_AUTH_KEY',  'poné algo fuerte acá');
define('LOGGED_IN_KEY',    'poné algo fuerte acá');
define('NONCE_KEY',        'poné algo fuerte acá');
define('AUTH_SALT',        'poné algo fuerte acá');
define('SECURE_AUTH_SALT', 'poné algo fuerte acá');
define('LOGGED_IN_SALT',   'poné algo fuerte acá');
define('NONCE_SALT',       'poné algo fuerte acá');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
