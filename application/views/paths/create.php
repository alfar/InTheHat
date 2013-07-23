<?= validation_errors(); ?>
<?= form_open('paths/create'); ?>
	<?= form_fieldset('Create path') ?>
		<p><label for="name">Name:</label><input type="text" id="name" name="name" value="" class="input-block-level" /></p>
		<div><label for="language">Language:</label><?= language_select2('language', set_value('language', NULL)) ?></div>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Create</button> <?= anchor('/paths', 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>