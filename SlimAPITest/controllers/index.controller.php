<?php

// GET index route
$app->get('/', function () use ($app) {
    $app->render('index.html', array('hello' => 'oi'));
});
