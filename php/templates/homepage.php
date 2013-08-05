<?php
$title = 'My personal homepage';
ob_start();
?>
<h1>Homepage</h1>
<?php if ($pages): ?>
	<ul>
		<?php foreach ($pages as $page): ?>
			<li<?php if ($page == $currentPage): ?> class="current"<?php endif ?>><?=htmlspecialchars($page)?></li>
		<?php endforeach ?>
	</ul>
<?php else: ?>
	<p>empty</p>
<?php endif ?>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
