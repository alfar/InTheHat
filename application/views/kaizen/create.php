<?= validation_errors(); ?>
<?= form_open('rides/create_kaizen/' . $ride); ?>
	<?= form_fieldset('Create kaizen') ?>
		<p><label for="comment">Comment:</label><?= tiny_editor(array('name' => 'comment', 'class' => 'tiny input-block-level')) ?></p>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Create</button> <?= anchor('/rides/kaizen/' . $ride, 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>
<?= tiny_mce() ?>