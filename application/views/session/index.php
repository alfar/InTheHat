<ul class="itemlist">
<?php foreach ($sessions as $session): ?>
	<li><?= anchor('/sessions/show/' . $session['id'], $session['name']) ?></li>
<?php endforeach; ?>
</ul>
