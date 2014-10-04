<!DOCTYPE html>
<html>
	<head>
		<title>In The Hat</title>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
<?php if (isset($css)):
						foreach ($css as $path):
							echo('		<link type="text/css" rel="stylesheet" href="' . base_url() . $path . "\" />\n");
						endforeach;
					endif;
?>
		<script type="text/javascript" src="<?= base_url() ?>javascript/jquery-1.10.1.js"></script>
	</head>
	<body>
    <div class="container">
			<div class="navbar">
	      <div class="navbar-inner">
	      	<a href="<?= site_url('/') ?>" class="brand">In The Hat!</a>
	        <div class="nav-collapse collapse">
	          <ul class="nav">
							<li<?= ($nav == 'blogs' ? ' class="active"' : '') ?>><?= anchor('/blogs', 'Blog') ?></li>	
							<li<?= ($nav == 'rides' ? ' class="active"' : '') ?>><?= anchor('/rides/index', 'Rides') ?></li>	
							<li<?= ($nav == 'paths' ? ' class="active"' : '') ?>><?= anchor('/paths/index', 'Paths'); ?></li>
							<li<?= ($nav == 'sessions' ? ' class="active"' : '') ?>><?= anchor('/sessions', 'Sessions') ?></li>
							<?php if ($userid !== FALSE) : ?>
							<li<?= ($nav == 'badges' ? ' class="active"' : '') ?>><?= anchor('/badges', 'Badges') ?></li>
							<li<?= ($nav == 'kaizen' ? ' class="active"' : '') ?>><?= anchor('/kaizen/incoming', 'Kaizen' . ($kaizen_count > 0 ? ' <span class="badge badge-info">' . $kaizen_count . '</span>' : '')) ?></li>
							<li<?= ($nav == 'images' ? ' class="active"' : '') ?>><?= anchor('/images/index', 'Images'); ?></li>
							<?php endif; ?>
	          </ul>
	        </div><!--/.nav-collapse -->
					<?php if ($userid !== FALSE) : ?>
						<div class="nav-collapse collapse pull-right">
							
		          <ul class="nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('name'); ?><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= anchor('/users/profile/' . $userid, 'View profile') ?></li>
										<li><?= anchor('/users/edit_profile', 'Edit profile') ?></li>
										<li><?= anchor('/auth/logout', 'Log out'); ?></li>
									</ul>
								</li>
							</ul>							
						</div>
						
					<?php else: ?>
						<div class="nav pull-right">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= anchor('/auth/login', 'E-mail'); ?></li>
										<li><?= anchor('/auth/session/google', 'Google'); ?></li>
										<li><?= anchor('/auth/session/facebook', 'Facebook'); ?></li>
									</ul>
								</li>
						</div>
					<?php endif; ?>
				</div>			
			</div>
	<?php if (isset($tabs)): ?>
			<ul class="nav nav-tabs">
			<?php foreach($tabs as $tab): ?>
					<li<?= $tab['active'] ? ' class="active"' : '' ?>><?= anchor($tab['url'], $tab['text']) ?></li>
			<?php endforeach; ?>
			</ul>
	<?php endif; ?>	
	<?php if (isset($submenu)): ?>
			<div class="navbar">
	      <div class="navbar-inner">
					<div class="nav-collapse collapse">
						<ul class="nav">
						<?php foreach($submenu as $url => $text): ?>
								<li><?= anchor($url, $text) ?></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
	<?php endif; ?>
	