<h1>Paths to fluency</h1>
<table class="table table-bordered">
	<thead>
		<tr><th>Title</th><th>Language</th></tr>
	</thead>
	<tbody>
	<?php foreach ($paths as $path): ?>
		<tr><td><?= anchor('paths/show/' . $path['id'], $path['name']) ?></td><td><?= anchor('languages/show/' . $path['language_id'], $path['language'], 'class="badge badge-info"') ?></td></tr>
	<?php endforeach; ?>
	</tbody>
</table>
