<h1>Paths to fluency</h1>
<ul class="itemlist">
<?php foreach ($paths as $path): ?>
	<li><?= anchor('paths/show/' . $path['id'], $path['name']) ?> - <?= $path['language'] ?></li>
<?php endforeach; ?>
</ul>
