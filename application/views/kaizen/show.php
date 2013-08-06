<h1>Kaizen</h1>
<table class="table table-bordered">
	<thead>
		<tr><th>Comment</th><th>State</th></tr>
	</thead>
	<tbody>
	<?php foreach ($kaizen as $comment): ?>
		<tr><td><p class="muted"><small><?= $comment['author_name'] ?>:</small></p>
			<?= $comment['comment'] ?></td><td><?php if ($ride['author'] == $userid) { echo(kaizen_state_link('kaizen' . $comment['id'], $comment['state'])); } else { echo(kaizen_state_name($comment['state'])); } ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
