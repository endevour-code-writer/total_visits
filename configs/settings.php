<?php

define('TEMPORARY_DIR', 'tmp');
define('PUBLIC_DIR', 'web');

$settings = [];
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . DIRECTORY_SEPARATOR . TEMPORARY_DIR;
$settings['public'] = $settings['root'] . DIRECTORY_SEPARATOR . PUBLIC_DIR;
$settings['error_handler_middleware'] = [
    'display_error_details' => true,
    'log_errors' => true,
    'log_error_details' => true,
];
$settings['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'username' => 'test',
    'database' => 'total_visits',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'flags' => [
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ],
];

return $settings;