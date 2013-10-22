<?php

TOP: {
    $app->get('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('top');
    
    // testのために記述
    $app->post('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('geoset');
}
