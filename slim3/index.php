<?php

require __DIR__. '/vendor/autoload.php';
session_start();
use App\Controllers\PagesController;

$app = new \Slim\App([
    'settings'=>['displayErrorDetails' => true]
]);
// on lance l'application

require __DIR__. '/app/container.php';


//container

$container = $app->getContainer();
//Middleware

$app->add(new \App\Middleswares\FlashMiddleware($container->view->getEnvironnement()));

$app->get('/', App\Controllers\PagesController::class . ':home');

$app->get('/contact', PagesController::class . ':getContact')->setName('contact');
$app->post('/contact', PagesController::class . ':postContact');

$app->run();
