<h1><?= $language['name'] ?></h1>
<div class="row">
	<div class="span6">		
		<h4>Offered by:</h4>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($offering as $user): ?>
			<li><?= anchor('/users/profile/' . $user['user'], $user['name']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	<div class="span6">
		<h4>Sought by:</h4>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($seeking as $user): ?>
			<li><?= anchor('/users/profile/' . $user['user'], $user['name']) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span6">
		<h4>Paths:</h4>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($paths as $path): ?>
			<li><?= anchor('/paths/show/' . $path['id'], $path['name']) ?></li>
		<?php endforeach; ?>
		</ul>		
	</div>	
	<div class="span6">
		<h4>Rides:</h4>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($rides as $ride): ?>
			<li><?= anchor('/rides/show/' . $ride['id'], $ride['name']) ?></li>
		<?php endforeach; ?>
		</ul>		
	</div>
</div>