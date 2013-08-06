<h1><img src="<?= $user['image'] ?>" style="vertical-align: top; margin: 5px;" /><?= $user['name'] ?></=?></h1>
<div><?= $user['bio'] ?></div>
<div class="row">
	<div class="span6">
		<h2>Offering:</h2>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($offering as $lang): ?>
			<li><?= anchor('languages/show/' . $lang['id'], $lang['name'] . ' <small class="muted">(' . language_level_name($lang['level']) . ')</small>') ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	<div class="span6">
		<h2>Looking for:</h2>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($looking_for as $lang): ?>
			<li><?= anchor('languages/show/' . $lang['id'], $lang['name'] . ' <small class="muted">(' . language_level_name($lang['level']) . ')</small>') ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
<div class="row">
	<div class="span6">		
		<h2>Rides taken</h2>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($signoffs as $ride): ?>
			<li><?= anchor('rides/show/' . $ride['id'], $ride['name'] . ' <span class="badge badge-info">' . $ride['language'] . '</span>') ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	<div class="span6">
		<h2>Rides authored</h2>
		<ul class="nav nav-tabs nav-stacked">
		<?php foreach ($rides as $ride): ?>
			<li><?= anchor('rides/show/' . $ride['id'], $ride['name'] . ' <span class="badge badge-info">' . $ride['language'] . '</span>') ?></li>
		<?php endforeach; ?>
		</ul>
<?php
/*<h2>Achievements:</h2>
<ul class="itemlist">
<?php foreach ($achievements as $award): ?>
	<li><img src="<?= base_url() ?>achievements/<?= $award['achievement_id'] ?>.png" alt="Award" /></li>
<?php endforeach; ?>	
</ul>
*/
?>
	</div>
</div>
