<?= validation_errors(); ?>
<?= $error ?>
<?= form_open_multipart('images/upload/' . $folder_id); ?>
	<?= form_fieldset('Add image') ?>
		<p><label for="name">Label:</label><input type="text" id="label" name="label" value="" class="textbox" /></p>
		<p><label for="image">File:</label><input type="file" id="image" name="image" value="" class="textbox" /></p>
		<p><input type="submit" name="btnSubmit" value="Add" /></p>
	</fieldset>
</form>
