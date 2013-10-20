<?php

require __DIR__ . '/../vendor/autoload.php';

$container = include __DIR__ .'/config.php';

twig: {
    $container['twig'] = $container->protect(function($router, $request) use ($container) {
        $twig = new \Slim\Extras\Views\Twig();
	$twig::$twigTemplateDirs = $container['twig.templateDir'];

	$env = $twig->getEnvironment();

	$env->addFunction(new Twig_SimpleFunction('asset', function ($path) use ($request) {
	    return $request->getRootUri() . '/' . trim($path, '/');
	}));
        $env->addFunction(new Twig_SimpleFunction('urlFor', function($name, $params = array()) use ($router) {
            return $router->urlFor($name, $params);
        }));

        return $twig;
    });
}

return $container;
