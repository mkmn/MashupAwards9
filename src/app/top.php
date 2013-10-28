<?php

TOP: {
    $app->get('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('top');
    
    // testのために記述
    $app->post('/', function() use ($app, $container) {
        $input = $app->request()->post();

        if($input['prefecture'] < 1 && $input['prefecture'] > 47) {
            $input['prefecture'] = 13;
        }

        $makers = $container['repository.maker']->findByPrefecture($input['prefecture']);

        print json_encode($makers);
    })
    ->name('geoset');

    $app->post('/address', function() use ($app, $container) {
        $input = $app->request()->post();

        $geocodes = $container['repository.geocode']->findByAddress($input['address']);

        if($geocodes) {
            print json_encode($geocodes);
        } else {
            print 'null';
        }
    })
    ->name('address');
}
