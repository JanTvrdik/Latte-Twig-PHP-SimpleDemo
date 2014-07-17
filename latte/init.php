<?php
require_once __DIR__ . '/vendor/autoload.php';

function renderTemplate($file, array $params = array())
{
	$latte = new Latte\Engine();
	$latte->setTempDirectory(__DIR__ . '/cache');
	$latte->render(__DIR__ . '/templates/' . $file . '.latte', $params);
}
