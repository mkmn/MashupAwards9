<?php

TOP: {
    $app->get('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('top');
    
    // testのために記述
    $app->post('/', function() use ($app, $container) {
        $input = $app->request()->post();

        if($input['department'] < 1 && $input['department'] > 47) {
            $input['department'] = 13;
        }

        $makers = $container['repository.maker']->findByPrefecture($input['department']);
        print json_encode($makers);
    })
    ->name('geoset');

    $app->post('/address', function() use ($app, $container) {
        $input = $app->request()->post();

        $geocodes = $container['repository.geocode']->findByAddress($input['address']);

        print json_encode($geocodes);
    })
    ->name('address');
}
