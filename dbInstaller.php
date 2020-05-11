<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'settings.php';



$host = $settings['db']['host'];
$dbName = $settings['db']['database'];
$username = $settings['db']['username'];
$password = $settings['db']['password'];
$flags = $settings['db']['flags'];

echo 'DB settings were included';
echo PHP_EOL;
echo PHP_EOL;

if (! is_dir($host)) {
    try {
        mkdir($host);
    } catch (Exception $exception) {
        echo "The dir for SQLite database was not created.";
        echo PHP_EOL;
        echo "The reason is {$exception->getMessage()}";
        echo PHP_EOL;
        echo "Please, do it manually with {$host} path and execute script again to database creation";
        echo PHP_EOL;


        echo "Please, do it manually with {$host} path";
        return null;
    }

    echo "{$host} dir for SQLite DB has been just created";
    echo PHP_EOL;
    echo PHP_EOL;
} else {
    echo "{$host} dir for SQLite DB already exists";
    echo PHP_EOL;
    echo PHP_EOL;
}


$pathToSQLiteDb = $host . DIRECTORY_SEPARATOR . $dbName;

if (! is_file($pathToSQLiteDb)) {
    try {
        touch($host);
    } catch (Exception $exception) {
        echo "The SQLite database was not created.";
        echo PHP_EOL;
        echo "The reason is {$exception->getMessage()}";
        echo PHP_EOL;
        echo "Please, do it manually with {$pathToSQLiteDb} path and execute script again to table creation";
        echo PHP_EOL;

        return null;
    }

    echo "SQLite DB {$dbName} has been just created.";
    echo PHP_EOL;
    echo PHP_EOL;
} else {
    echo "SQLite DB {$dbName} already exists";
    echo PHP_EOL;
    echo PHP_EOL;
}

$dsn = 'sqlite:' . $host . DIRECTORY_SEPARATOR . $dbName;

try {
    $connection = new PDO($dsn, $username, $password, $flags);
} catch (Exception $exception) {
    echo "The connection to database was crashed";
    echo PHP_EOL;
    echo "The reason is {$exception->getMessage()}";
    echo PHP_EOL;
    echo "Please, check the to database. It should be {$pathToSQLiteDb}";
    echo PHP_EOL;
    echo "If it is correct, please, check file permissions";
    echo PHP_EOL;
    return null;
}

$tableCreationCommand = 'CREATE TABLE IF NOT EXISTS total_visits (
                        id BIGINT PRIMARY KEY,
                        visits BIGINT DEFAULT "0"
                                              )';
try {
    $connection->exec($tableCreationCommand);
} catch (Exception $exception) {
    echo "The table total_visits was not crashed";
    echo PHP_EOL;
    echo "The reason is {$exception->getMessage()}";
    return null;
}

