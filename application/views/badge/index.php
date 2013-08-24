<h1>Badges</h1>
<p>This is a list of all badges available.</p>
<ul class="nav nav-tabs nav-stacked">
	<?php foreach($badges as $badge): ?>
	<li><?= anchor('badges/show/' . $badge['id'], ($badge['has_badge'] ? '<i class="icon-ok"></i> ' : '<i class="icon-lock"></i> ') . $badge['name'], ($badge['has_badge'] ? 'class=""' : 'class="muted"')) ?></li>		
	<?php endforeach; ?>
</ul>