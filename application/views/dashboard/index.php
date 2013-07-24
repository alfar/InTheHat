<div class="hero-unit">
	<div class="pull-left" style="margin: 20px;"><img src="<?= base_url() ?>images/tophat.png" alt="This is where everything should go - in the hat!" /></div>
	<h1>In the hat</h1>
	<p>Online language hunting tools and resources</p>
</div>
<div class="row">
	<div class="span4">
		<h1>Blog</h1>
		<div>
			<img src="<?=$blog['userImage']?>" class="picture img-polaroid pull-left" style="margin-right: 10px;" /> 
			<p><a href="<?= site_url('/users/profile/' . $blog['author'] ); ?>"><?=$blog['name']?></a></p>
			<p class="muted"><small><?=$blog['posted']?></small></p>
			<h2><?= anchor('/blogs/view/' . $blog['id'], $blog['title']) ?></h2>
			<div><?=word_limiter($blog['text'], 100, '&hellip;<br />' . anchor('/blogs/view/' . $blog['id'], 'Read more'))?></div>
		</div>
	</div>
	<div class="span4">
		<h1>Newest ride</h1>
		<div class="well">
			<div class="pull-right">
				<p class="text-center"><a href="<?= site_url('/users/profile/' . $ride['author'] ); ?>"><img src="<?=$ride['userImage']?>" class="picture img-polaroid" /></a></p>
				<p class="text-center"><small><a href="<?= site_url('/users/profile/' . $ride['author'] ); ?>"><?=$ride['userName']?></a></small></p>
			</div>
			<p class="lead"><a href="<?= site_url('/rides/show/' . $ride['id']) ?>"><?=$ride['name'] ?></a></p>
			<p><?= anchor('/languages/show/' . $ride['language_id'], $ride['language'], 'class="badge badge-info"') ?></p>
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
