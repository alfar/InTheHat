<?= validation_errors(); ?>
<?= form_open('blogs/create'); ?>
	<?= form_fieldset('Create post') ?>
		<p><label for="title">Title:</label><input type="text" id="title" name="title" value="" class="input-block-level" /></p>
		<p><label for="text">Content:</label><?= tiny_editor(array('name' => 'text', 'class' => 'tiny input-block-level')) ?></p>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Create</button> <?= anchor('/blogs', 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>
<?= tiny_mce() ?>