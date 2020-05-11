<?php

use Actions\IndexAction;
use Slim\App;

function routesRegister(App $app) {
    $app->get('/', IndexAction::class);
}