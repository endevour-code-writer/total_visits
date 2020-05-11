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
    'username' => '',
    'password' => '',
    'host' => $settings['root'] . DIRECTORY_SEPARATOR . 'db',
    'database' => 'visits.db',
    'flags' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    ],
];

return $settings;