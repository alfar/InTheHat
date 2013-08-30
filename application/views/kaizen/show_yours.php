<h1><?= $title ?></h1>
<table class="table table-bordered">
	<thead>
		<tr><th>Comment</th><th>State</th></tr>
	</thead>
	<tbody>
	<?php foreach ($kaizen as $comment): ?>
		<tr><td><p class="muted"><small><?= anchor('/rides/kaizen/' . $comment['ride'], $comment['ride_name']) ?></small></p>
			<?= $comment['comment'] ?></td><td><?= kaizen_state_name($comment['state']) ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
