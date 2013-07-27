<?= validation_errors(); ?>
<?= form_open('rides/signoff/' . $ride['id']); ?>
	<?= form_fieldset('Sign off on ride') ?>
		<div><label for="user">User:</label><?= user_select2('user', set_value('user', '')) ?></div>
		<div><label for="scorebuttons">Score:</label><input type="hidden" name="score" id="score" /><div id="scorebuttons" class="btn-group" data-toggle="buttons-radio">
				<button type="button" class="btn btn-danger" data-value="1">Low</button>
				<button type="button" class="btn btn-warning" data-value="2">Medium</button>
				<button type="button" class="btn btn-success" data-value="3">High</button>
		</div></div>
		<p><label for="comment">Comment:</label><?= tiny_editor(array('name' => 'comment', 'class' => 'tiny input-block-level'), set_value('comment', '')) ?></p>
		<div class="form-actions"><button type="submit" name="btnSubmit" class="btn btn-primary">Sign off</button> <?= anchor('/rides/show/' . $ride['id'], 'Cancel', 'class="btn"') ?></div>
	</fieldset>
</form>
<?= tiny_mce() ?>
<script type="text/javascript">
	$(function() {
		$('#scorebuttons button').on('click', function(e) {
			$('#score').val($(e.target).data('value'));
		});
	});
</script>

