<h1>Kaizen</h1>
<table class="table table-bordered">
	<thead>
		<tr><th>Suggestion</th><th>State</th></tr>
	</thead>
	<tbody>
	<?php foreach ($kaizen as $comment): ?>
		<tr>
			<td><div class="muted"><small><?= $comment['author_name'] ?>:</small></div>
			<?= $comment['comment'] ?>
			<?= comment_form(2, $comment['id'], 'comments_' . $comment['id']) ?>
			<?= comment_list('comments_' . $comment['id'], 2, $comment['id'], 10) ?>		
			</td>
			<td><?php if ($ride['author'] == $userid) { echo(kaizen_state_link('kaizen' . $comment['id'], $comment['state'])); } else { echo(kaizen_state_name($comment['state'])); } ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
