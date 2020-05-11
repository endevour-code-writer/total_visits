<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'settings.php';

$host = $settings['db']['host'];
$dbName = $settings['db']['database'];
$username = $settings['db']['username'];
$password = $settings['db']['password'];
$flags = $settings['db']['flags'];
$charset = $settings['db']['charset'];
$dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";;

try {
    $connection = new PDO($dsn, $username, $password, $flags);
} catch (Exception $exception) {
    echo "The connection to database was crashed";
    echo PHP_EOL;
    echo "The reason is {$exception->getMessage()}";
    echo PHP_EOL;
    echo "If it is correct, please, check settings, permissions";
    echo PHP_EOL;
    return null;
}

$tableCreationCommand = 'CREATE TABLE IF NOT EXISTS total_visits (
                        id TINYINT PRIMARY KEY AUTOINCREMENT NOT NULL,
                        visits BIGINT NOT NULL
                                              )';
try {
    $connection->exec($tableCreationCommand);
} catch (Exception $exception) {
    echo "The table total_visits was not crashed";
    echo PHP_EOL;
    echo "The reason is {$exception->getMessage()}";
    return null;
}

