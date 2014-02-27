<?php
require __DIR__ . '/libs/Nette/common/exceptions.php';
require __DIR__ . '/libs/Nette/common/Object.php';
require __DIR__ . '/libs/Nette/Loaders/NetteLoader.php';

Nette\Loaders\NetteLoader::getInstance()->register();

// uncomment to enable better error visualization
// Nette\Diagnostics\Debugger::enable();
// Nette\Diagnostics\Debugger::$strictMode = TRUE;

function renderTemplate($file, array $params = array())
{
	static $cacheStorage;
	if ($cacheStorage === NULL) $cacheStorage = new Nette\Caching\Storages\PhpFileStorage(__DIR__ . '/cache');

	$template = new Nette\Templating\FileTemplate(__DIR__ . '/templates/' . $file . '.latte');
	$template->setCacheStorage($cacheStorage);
	$template->registerHelperLoader('Nette\Templating\Helpers::loader');
	$template->onPrepareFilters[] = function ($template) {
		static $latte;
		if ($latte === NULL) $latte = new Nette\Latte\Engine();
		$template->registerFilter($latte);
	};

	$template->setParameters($params);
	$template->render();
}
