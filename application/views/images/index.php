<div class="well" style="padding: 8px 0;">
<ul class="nav nav-list">
<?php if ($folder_id != 0): ?>
	<li class="nav-header"><?= $current['name'] ?></li>
	<li class="browseup"><?= anchor('images/index/' . $parent_folder_id, '<i class="icon-backward"></i> Parent folder') ?></li>
<?php endif; ?>
<?php foreach ($folders as $folder): ?>
	<li><?= anchor('images/index/' . $folder['id'], '<i class="icon-folder-close"></i>' . $folder['name']) ?></li>
<?php endforeach; ?>
<?php if (count($images) > 0): ?>
	<li class="nav-header">Images</li>	
<?php endif; ?>
<?php foreach ($images as $image): ?>
	<li><img src="<?= base_url() ?>/images/<?= $image['path'] ?>" alt="<?= $image['label'] ?>" title="<?= $image['label'] ?>" /> <?= $image['label'] ?></li>
<?php endforeach; ?>
</ul>
</div>