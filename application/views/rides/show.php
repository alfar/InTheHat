<h1><?= $ride['name'] ?></h1>
<div class="row">
	<div class="span9">
		<?= $ride['description'] ?>	
	</div>
	<div class="span3">
		<div class="well">
			<p class="muted">By: <?= anchor('users/profile/' . $ride['author'], $ride['ownerName']) ?></p>
			<p><?= anchor('/languages/show/' . $ride['language_id'], $ride['language'], 'class="badge badge-info"') ?></p>
		</div>
	</div>				
</div>

<?php if ($path !== FALSE): ?>
	<ul class="pager">
	<?php if ($previous_ride !== FALSE): ?>
		<li class="previous"><?= anchor('rides/show/' . $previous_ride['id'] . '/' . $path, '&laquo; ' . $previous_ride['name']) ?></li>
	<?php else: ?>
		<li class="previous disabled"><a>&laquo; Start of the path</a></li>	
	<?php endif; ?>
	
	<li><?= anchor('paths/show/' . $path, $path_name) ?></li>
	
	<?php if ($next_ride !== FALSE): ?>
		<li class="next"><?= anchor('rides/show/' . $next_ride['id'] . '/' . $path, $next_ride['name'] . ' &raquo;') ?></li>
	<?php else: ?>
		<li class="next disabled"><a>End of the path &raquo;</a></li>	
	<?php endif; ?>
<?php endif; ?>
