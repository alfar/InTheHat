<h1>Session tables</h1>
<table class="table table-bordered">
	<thead>
		<tr><th>Title</th><th>Language</th></tr>
	</thead>
	<tbody>
	<?php foreach ($sessions as $session): ?>
		<tr><td><?= anchor('/sessions/show/' . $session['id'], $session['name']) ?></td><td><?= anchor('languages/show/' . $session['language_id'], $session['language'], 'class="badge badge-info"') ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
