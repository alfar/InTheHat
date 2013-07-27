<h1>Sign offs for ride <?= $ride['name'] ?></h1>
<table class="table">
	<thead>
		<tr><th>User</th><th>Score</th><th>Signee</th></tr>
	</thead>
	<tbody>
	<?php foreach ($signoffs as $signoff): ?>
		<tr><td><?= anchor('users/profile/' . $signoff['user_id'], $signoff['user_name']) ?></td><td><?= $levels[$signoff['score'] - 1] ?></td><td><?= anchor('users/profile/' . $signoff['signee_id'], $signoff['signee_name']) ?></td></tr>		
	<?php endforeach; ?>
	</tbody>
</table>