<?php

function middlewareRegister (\Slim\App $app) {
    $app->add(\Slim\Middleware\ErrorMiddleware::class);
};