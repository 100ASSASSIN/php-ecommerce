<?php
require 'autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/api/data', function ($request, $response, $args) {
    $data = ['message' => 'Hello from PHP!'];
    return $response->withJson($data);
});

$app->run();
