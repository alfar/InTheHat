<!DOCTYPE html>
<html>
	<head>
		<title>In The Hat</title>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />
<!--		<link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/style.css" />-->
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
							<li<?= ($nav == 'blogs' ? ' class="active"' : '') ?>><?= anchor('/blogs', 'Blogs') ?></li>	
							<li<?= ($nav == 'rides' ? ' class="active"' : '') ?>><?= anchor('/rides/index', 'Rides') ?></li>	
							<li<?= ($nav == 'paths' ? ' class="active"' : '') ?>><?= anchor('/paths/index', 'Paths'); ?></li>
							<li<?= ($nav == 'sessions' ? ' class="active"' : '') ?>><?= anchor('/sessions', 'Sessions') ?></li>
							<?php if ($userid !== FALSE) : ?>
							<li<?= ($nav == 'images' ? ' class="active"' : '') ?>><?= anchor('/images/index', 'Images'); ?></li>
							<?php endif; ?>
							<?php /* <li<?= ($nav == 'about' ? ' class="active"' : '') ?>><?= anchor('/pages/about', 'About'); ?></li> */ ?>
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
						<div class="nav-collapse collapse pull-right">
							<ul class="nav">
								<li><?= anchor('/auth/session/google', 'Google'); ?></li>
								<li><?= anchor('/auth/session/facebook', 'Facebook'); ?></li>
							</ul>
						</div>
						<p class="navbar-text pull-right">Login using: </p>
					<?php endif; ?>
				</div>			
			</div>
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