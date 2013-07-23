<?= validation_errors(); ?>
<?= form_open('images/create_folder/' . $folder_id); ?>
	<?= form_fieldset('Create folder') ?>
		<p><label for="name">Name:</label><input type="text" id="name" name="name" value="" class="textbox" /></p>
		<p><input type="submit" name="btnSubmit" value="Create" /></p>
	</fieldset>
</form>
