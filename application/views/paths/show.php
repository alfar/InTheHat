<h1><?= $path['name'] ?></h1>
<div class="meta"><?= $path['language'] ?> - <?= $path['ownerName'] ?></div>

<ul class="itemlist">
<?php foreach ($rides as $ride): ?>
	<li><?= anchor('rides/show/' . $ride['id'] . '/' . $path['id'], $ride['name']) ?></li>
<?php endforeach; ?>
</ul>
