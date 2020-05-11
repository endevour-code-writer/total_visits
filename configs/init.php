<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'routesRegister.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'middlewareRegister.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . DIRECTORY_SEPARATOR . 'dependenciesRegister.php');
$container = $containerBuilder->build();
$app = $container->get(App::class);

routesRegister($app);
middlewareRegister($app);