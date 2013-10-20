<?php

$container = new Pimple();

テンプレート設定: {
	$container['twig.templateDir'] = __DIR__ . '/template';
}

return $container;
