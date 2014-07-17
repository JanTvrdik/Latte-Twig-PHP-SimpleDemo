<?php
require_once __DIR__ . '/vendor/autoload.php';

function renderTemplate($file, array $params = array())
{
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
	$twig = new Twig_Environment($loader, array('cache' => __DIR__ . '/cache'));
	echo $twig->render($file . '.html', $params);
}
