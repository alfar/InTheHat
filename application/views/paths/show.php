<h1><?= $path['name'] ?></h1>
<p class="muted"><?= anchor('languages/show/' . $path['language_id'], $path['language'], 'class="badge badge-info"') ?> - by: <?= anchor('users/profile/' . $path['owner'], $path['ownerName']) ?></p>

<ul class="nav nav-tabs nav-stacked">
<?php foreach ($rides as $ride): ?>
	<li><?= anchor('rides/show/' . $ride['id'] . '/' . $path['id'], $ride['name']) ?></li>
<?php endforeach; ?>
</ul>
