<h1><img src="<?= $user['image'] ?>" style="vertical-align: top; margin: 5px;" /><?= $user['name'] ?></=?></h1>
<div class="row">
	<div class="span6">
		<h2>Statistics:</h2>
		<table class="table">
			<?php foreach ($counters as $counter): ?>
				<tr><td><?= $counter['name'] ?></td><td><?= $counter['value'] ?></td></tr>			
			<?php endforeach; ?>
		</table>
	</div>
	<div class="span6">
		<h2>Badges:</h2>
		<ul class="nav nav-tabs nav-stacked">
			<?php foreach ($badges as $badge): ?>
				<li><?= anchor('badges/show/' . $badge['id'], $badge['name']) ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
