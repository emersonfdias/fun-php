<?php

require '../vendor/autoload.php';
require '../config.php';

// Setup custom Twig view
$twigView = new \Slim\Views\Twig();

$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView,
    'templates.path' => '../views/',
));

// Automatically load controller files
$controllers = glob('../controllers/*.controller.php');
foreach ($controllers as $controller) {
    require $controller;
}

$app->run();
