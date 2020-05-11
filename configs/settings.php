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


return $settings;