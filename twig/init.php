<?php
require_once __DIR__ . '/libs/Twig/Autoloader.php';
Twig_Autoloader::register();

function renderTemplate($file, array $params = array())
{
	static $twig;
	if ($twig === NULL) {
		$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
		$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/cache'));
	}

	echo $twig->render($file . '.html', $params);
}
