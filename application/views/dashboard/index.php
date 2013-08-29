<div class="hero-unit">
	<div class="pull-left" style="margin-right: 20px;"><img src="<?= base_url() ?>images/inthehat.png" alt="This is where everything should go - in the hat!" /></div>
	<h1>In the hat</h1>
	<p>Online language hunting tools and resources</p>
</div>
<div class="row">
	<div class="span8">
		<h1>Feed</h1>
		<div id="feedlist">			
		<div id="feedline"></div>
			<article>
				<div><?= $userid ? anchor('/users/profile/' . $userid, 'You') : 'You' ?> are here.</div>
			</article>
			<?php foreach ($feed as $action): ?>
			<article>
				<div class="muted"><small><?=$action['time']?></small></div>
				<div><?= $action['action'] ?></di>			
			</article>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="span4">
		<h1>Random User</h1>
		<div class="well clearfix">
			<div class="clearfix">				
				<p class="lead"><a href="<?= site_url('/users/profile/' . $profile['id'] ); ?>"><img src="<?=$profile['image']?>" class="picture img-polaroid" /></a> <a href="<?= site_url('/users/profile/' . $profile['id'] ); ?>"><?=$profile['name']?></a></p>
			</div>
			<p>Offering:</p>
			<ul class="inline">
				<?php foreach ($profile_offers as $lang): ?>
					<li><?= anchor('/languages/show/' . $lang['id'], $lang['name'], 'class="badge badge-info"') ?></li>
				<?php endforeach; ?>
			</ul>
			<p>Looking for:</p>
			<ul class="inline">
				<?php foreach ($profile_seeking as $lang): ?>
					<li><?= anchor('/languages/show/' . $lang['id'], $lang['name'], 'class="badge badge-info"') ?></li>
				<?php endforeach; ?>
			</ul>
		</div>		
	</div>
</div>
