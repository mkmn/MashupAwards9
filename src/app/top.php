<?php

TOP: {
    $app->get('/', function() use ($app) {
        $app->render('index.html.twig');
    })
    ->name('top');
    
    // testのために記述
    $app->post('/', function() use ($app, $container) {
        $input = $app->request()->post();
	// postされたデータから、geoコードを受け取る
	// geoコードから酒造のデータを取得
	$makers = '{"makers":[{"maker_name":"ＥＨ酒造",
	  "maker_postcode":"399-8204",
	  "maker_address":"長野県安曇野市豊科高家1090-1",
	  "maker_url":"http://www.eh-shuzo.com/"}]
	  }';
	print $makers;
    })
    ->name('geoset');
}
