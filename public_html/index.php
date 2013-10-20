<?php

$container = include __DIR__ . '/../src/bootstrap.php';

use \Slim\Slim;

構築: {
    $app = new Slim();
    $app->view($container['twig']($app->router(), $app->request()));
}

コントローラーの読み込み: {
    require __DIR__ . '/../src/app/top.php';
}

実行: {
    $app->run();
}
