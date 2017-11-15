<?php

require __DIR__. '/../vendor/autoload.php';
echo __DIR__. '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings'=>['displayErrorDetails' => true]
]);
// on lance l'application


$app->get('/', App\Controllers\PagesController::class . ':home');
$app->run();
