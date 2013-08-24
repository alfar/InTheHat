<h1><?= $counter['name'] ?></h1>
<h4>Leaderboard:</h4>
<table class="table table-bordered">
<?php foreach ($users as $user): ?>
	<tr><td><?= anchor('/users/profile/' . $user['id'], $user['name']) ?></td><td><?= $user['value'] ?></td></tr>
<?php endforeach; ?>
</table>
