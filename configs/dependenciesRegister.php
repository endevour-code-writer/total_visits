<?php

use Psr\Container\ContainerInterface;
use Selective\Config\Configuration;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;

return [
    Configuration::class => function (ContainerInterface $container) {
        return new Configuration(require __DIR__ . DIRECTORY_SEPARATOR . 'settings.php');
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get(Configuration::class)->getArray('error_handler_middleware');

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details']
        );
    },

    PDO::class => function (ContainerInterface $container) {
        $settings = $container->get(Configuration::class)->getArray('db');
        $host = $settings['host'];
        $dbName = $settings['database'];
        $username = $settings['username'];
        $password = $settings['password'];
        $flags = $settings['flags'];
        $dsn = 'sqlite:' . $host . DIRECTORY_SEPARATOR . $dbName;

        return new PDO($dsn, $username, $password, $flags);
    },
];
