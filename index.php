<?php
$knownTests = array('latte' => 'Latte', 'php' => 'Raw PHP', 'twig' => 'Twig');
$test = isset($_GET['test'], $knownTests[$_GET['test']]) ? $_GET['test'] : NULL;

function runTest($name)
{
	$time = -microtime(true);
	require __DIR__ . '/' . strtolower($name) . '/init.php';
	echo "<!-- Template start -->\n";
	renderTemplate('homepage', array(
		'pages' => array('About', 'Is better <strong> or <b>?'),
		'currentPage' => 'About',
	));
	echo "<!-- Template end -->\n\n";
	$time += microtime(true);

	echo "<pre class=\"results\">\n";
	printf("Memory usage:   %5.1f kB\n", memory_get_peak_usage() / 1024);
	printf("Execution time: %5.1f ms\n", $time * 1000);
	echo "</pre>\n";
}
?>

<style>
	body {
		font-family: sans-serif;
	}

	ul.tests {
		list-style-type: none;
		margin: 0;
		padding: 0;
	}

	ul.tests li {
		display: inline-block;
		background: #0080FF;
		width: 100px;
		padding: 7px 15px;
	}

	ul.tests li:hover {
		background: #004F9D;
	}

	ul.tests li a {
		color: #fff;
		text-decoration: none;
		display: block;
	}

	pre.results {
		border-top: 2px solid #004F9D;
		width: 500px;
		padding: 5px;
		margin-top: 20px;
		font-family: Consolas, monospace;
		font-size: 16px;
	}
</style>

<ul class="tests">
	<?php foreach ($knownTests as $id => $name): ?>
		<li><a href="?test=<?=$id?>"><?=$name?></a></li>
	<?php endforeach; ?>
</ul>

<?php if ($test) runTest($test); ?>
