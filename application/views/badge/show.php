<h1><?= $badge['name'] ?></h1>
<?php if ($badge['description'] !== ''): ?>
	<p class="muted"><?= $badge['description'] ?></p>
<?php elseif ($badge['counter_name'] !== NULL): ?>
	<p class="muted">Awarded when <?= $badge['counter_name'] ?> reaches <?= $badge['threshold'] ?>.</p>
<?php else: ?>
	<p class="muted">Awarded by the system.</p>
<?php endif; ?>
<h4>Awarded to:</h4>
<ul class="nav nav-tabs nav-stacked">
<?php foreach ($users as $user): ?>
	<li><?= anchor('/users/profile/' . $user['id'], $user['name']) ?></li>
<?php endforeach; ?>
</ul>
