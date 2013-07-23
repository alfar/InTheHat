<?= validation_errors(); ?>
<?= form_open('rides/edit/' . $ride['id'] . ($path !== FALSE ? '/' . $path : '')); ?>
	<?= form_fieldset('Edit ride') ?>
		<p><label for="name">Name:</label><input type="text" id="name" name="name" value="<?php echo set_value('name', $ride['name']); ?>" class="input-block-level" /></p>
		<p><label for="description">Description:</label><?= tiny_editor(array('name' => 'description', 'class' => 'tiny input-block-level'), set_value('description', $ride['description'])) ?></p>
		<div><label for="language">Language:</label><?= language_select2('language', set_value('language', $ride['language'])) ?></div>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Update</button> <?= anchor('/rides/show/' . $ride['id'], 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>
<?= tiny_mce() ?>

