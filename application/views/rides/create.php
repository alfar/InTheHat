<?= validation_errors(); ?>
<?= form_open('rides/create'); ?>
	<?= form_fieldset('Create ride') ?>
		<p><label for="name">Name:</label><input type="text" id="name" name="name" value="<?php echo set_value('name', ''); ?>" class="input-block-level" /></p>
		<p><label for="description">Description:</label><?= tiny_editor(array('name' => 'description', 'class' => 'tiny input-block-level'), set_value('description', '')) ?></p>
		<div><label for="language">Language:</label><?= language_select2('language', set_value('language', NULL)) ?></div>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Create</button> <?= anchor('/rides', 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>
<?= tiny_mce() ?>