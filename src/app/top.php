<?php

TOP: {
    $app->get('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('top');
}
