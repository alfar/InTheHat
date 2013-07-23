<h1><img src="<?= $user['image'] ?>" style="vertical-align: top; margin: 5px;" /><?= $user['name'] ?></=?></h1>
<?= validation_errors(); ?>
<?= form_open('users/edit_profile'); ?>
	<?= form_fieldset('Edit profile') ?>
		<p><label for="bio">Bio:</label><?= tiny_editor(array('name' => 'bio', 'class' => 'tiny input-block-level'), set_value('bio', $user['bio'])) ?></p>
		<p><input type="submit" name="btnSubmit" value="Save" /></p>
		<div><label for="offering_new_input">Offering:</label><div class="list" id="offering">
			<table class="table">
				<thead>
					<tr><th>Language</th><th>Level</th><th></th></tr>
				</thead>
				<tbody>
				<?php foreach ($offering as $lang): ?>
					<tr id="lang_<?= $lang['language'] ?>"><td><?= $lang['name'] ?></td><td><?= language_level_link('level_' . $lang['language'], $lang['level']) ?></td><td><a href="#" class="btn btn-danger btn-mini remove">Remove</a></td></tr>
				<?php endforeach; ?>
					<tr><td><?= language_select2('offering_new', NULL) ?></td><td><?= language_level_picker('offering_level', 'input-block-level level new', 1) ?></td><td><input type="button" id="offering_add" class="btn btn-primary btn-small" value="Add" /></td></tr>
				</tbody>
			</table>
		</div></div>
		<div><label for="looking_for_new_input">Looking for:</label><div class="list" id="looking_for">
			<table class="table">
				<thead>
					<tr><th>Language</th><th>Level</th><th></th></tr>
				</thead>
				<tbody>
				<?php foreach ($looking_for as $lang): ?>
					<tr id="lang_<?= $lang['language'] ?>"><td><?= $lang['name'] ?></td><td><?= language_level_link('level_' . $lang['language'], $lang['level']) ?></td><td><a href="#" class="btn btn-danger btn-mini remove">Remove</a></td></tr>
				<?php endforeach; ?>
					<tr><td><?= language_select2('looking_for_new', NULL) ?></td><td><?= language_level_picker('looking_for_level', 'input-block-level level new', 1) ?></td><td><input type="button" id="looking_for_add" class="btn btn-primary btn-small" value="Add" /></td></tr>
				</tbody>
			</table>
		</div></div>
	</fieldset>
</form>
<?= tiny_mce() ?>
<?= flexbox('#offering_new', 'languages/flexbox', array('hiddenValue' => 'name', 'method' => 'GET', 'watermark' => 'Type to create new language', 'autoCompleteFirstMatch' => FALSE, 'selectFirstMatch' => TRUE, 'initialValue' => set_value('language', ''))) ?>
<?= flexbox('#looking_for_new', 'languages/flexbox', array('hiddenValue' => 'name', 'method' => 'GET', 'watermark' => 'Type to create new language', 'autoCompleteFirstMatch' => FALSE, 'selectFirstMatch' => TRUE, 'initialValue' => set_value('language', ''))) ?>
<script type="text/javascript" src="<?= base_url() ?>javascript/jquery-ui-1.10.3.effects.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.level.new').select2({dropdownAutoWidth: true, minimumResultsForSearch: -1});
		$('#offering_add').click(function() {
			$.ajax({
				url: '<?= site_url('/users/add_language') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'type': 1, 'language': $('input[name=\'offering_new\']').val(), 'level': $('#offering_level').val()},
				success: function(data) {
					$tr = $('<tr id="lang_' + data['language'] + '"><td>' + data['name'] + '</td><td><a href="#" class="language_level_link" data-value="' + data['level'] + '">' + data['levelname'] + '</a></td><td><a href="#" class="btn btn-danger btn-mini remove">Remove</a></td></tr>');
					$('#offering tr').last().before($tr);
					$tr.effect('highlight');
				}
			});						
		});
		$('#looking_for_add').click(function() {
			$.ajax({
				url: '<?= site_url('/users/add_language') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'type': 2, 'language': $('input[name=\'looking_for_new\']').val(), 'level': $('#looking_for_level').val()},
				success: function(data) {
					$tr = $('<tr id="lang_' + data['language'] + '"><td>' + data['name'] + '</td><td><a href="#" class="language_level_link" data-value="' + data['level'] + '">' + data['levelname'] + '</a></td><td><a href="#" class="btn btn-danger btn-mini remove">Remove</a></td></tr>');
					$('#looking_for tr').last().before($tr);
					$tr.effect('highlight');
				}
			});						
		});
		$('body').on('click', '.remove', function(e) {
			var $tr = $(this).closest('tr');
			$.ajax({
				url: '<?= site_url('/users/remove_language') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'type': ($(this).closest('div').attr('id') == 'offering' ? 1 : 2), 'language': $tr.attr('id').substr(5)},
				success: function(data) {
					$tr.fadeOut(function() {$tr.remove()});;
				}
			});
			e.preventDefault();
		});
	});		
</script>