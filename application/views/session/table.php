<h1><?= $table['name'] ?></h1>
<?= $table['closed'] == 1 ? '<p class="muted">Replay</p>' : '' ?>
<?php if ($mode != 'guest' && $mode != 'replay'): ?>
<div id="bagcontainer" class="btn-group">
	<button id="bag-toggle" class="pull-right btn dropdown-toggle" data-toggle="dropdown">Bag <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<li>
			<div id="bag" style="padding: 8px;">
				<ul id="path" class="breadcrumb"><li><a href="#" id="path0">Items</a> <span class="divider">/</span></li></ul>
				<ul id="content0" class="thumbnails">
					<?php foreach ($image_folders as $folder): ?>
					<li class="folder" id="folder<?= $folder['id'] ?>"><a data-target="#" class="img-polaroid"><i class="icon-folder-close"></i> <?= $folder['name'] ?></a></li>
					<?php endforeach; ?>	
				</ul>		
			</div>
		</li>
	</ul>		
</div>
<?php endif; ?>
<div id="area">
	<div class="row">
		<div class="span1" id="trash" style="line-height: 60px; text-align: center;">
<?php if ($mode != 'guest' && $mode != 'replay'): ?>
			<i class="icon-trash"></i>
<?php endif; ?>
		</div>		
		<div class="seat horizontal span10" id="seat1">
			<ul class="inline">
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span1 seat vertical" id="seat2">
			<div style="position: relative; top: 50%;">
				<div style="position:relative; top: -50%;">
					<ul class="unstyled">
					</ul>
				</div>
			</div>
		</div>
		<div class="span10" id="table" style="height: 400px;<?= $table['background'] !== NULL ? 'background-image: url(' . base_url() .'images/' . $table['background'] . ')' : '' ?>">
		</div>
		<div class="span1 seat vertical" id="seat3">
			<div style="position: relative; top: 50%;">
				<div style="position:relative; top: -50%;">
					<ul class="unstyled">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span1" id="backslide" style="line-height: 60px; text-align: center;">
<?php if ($mode != 'guest' && $mode != 'replay'): ?>
			<i class="icon-picture"></i>
<?php endif; ?>
		</div>		
		<div class="seat horizontal span10" id="seat4">
			<ul class="inline">
			</ul>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 10px;">
	<div id="seat0" class="seat horizontal fringe well" style="position: relative; padding: 8px 0px;">
		<div style="position: absolute; top: -10px; left: 0px; padding: 3px 7px;">
			<h1 class="muted">The stands</h1>
		</div>
		<ul class="inline">
	<?php foreach ($players as $player): ?>
			<li id="player<?= $player['id'] ?>" class="player seat<?= $player['seat'] ?>"><img src="<?= $player['image'] ?>" alt="<?= $player['name'] ?>" title="<?= $player['name'] ?>" /></li>
	<?php endforeach; ?>
		</ul>
	</div>
</div>
<div id="objects" style="position: relative;">
<?php foreach ($objects as $obj): ?>
	<div id="obj<?= $obj['id'] ?>" class="object" style="left: <?= $obj['x'] ?>px; top: <?= $obj['y'] ?>px;"><img src="<?= base_url() ?>images/<?= $obj['path'] ?>" /></div>
<?php endforeach; ?>
</div>
<script type="text/javascript" src="<?= base_url() ?>javascript/jquery.drags.js"></script>
<script type="text/javascript" src="<?= base_url() ?>javascript/jquery-ui-1.10.3.effects.min.js"></script>
<script type="text/javascript">
	var last_log_id = parseInt('0<?= $last_log_id ?>', 10);
	var active_bag = '#content0';
	var bag_stack = [];
	
	$(function() {
		$('.seat1').appendTo($('#seat1 ul'));
		$('.seat2').appendTo($('#seat2 ul'));
		$('.seat3').appendTo($('#seat3 ul'));
		$('.seat4').appendTo($('#seat4 ul'));		
	<?php if ($mode != 'guest'): ?>
		$('.seat').on('click', function (e) {
			$.ajax({
				url: '<?= site_url('/sessions/take_seat') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: { 'table': <?= $table['id'] ?>, 'seat': this.id.substr(4) }
			});
		});
		$('#path').on('click', 'a', function(e) {
			var id = this.id.substr(4);
			$(active_bag).hide();
			active_bag = '#content' + id;
			$(active_bag).fadeIn();
			$(this).closest('li').nextAll().remove();
			e.preventDefault();
			e.stopPropagation();
		});
		$('#bag').on('click', 'li.folder', function (e) {
			var clicked_folder = $(this);
			var clicked_folder_id = this.id.substr(6);
			e.preventDefault();
			e.stopPropagation();
			$.ajax({
				url: '<?= site_url('/images/browse') ?>',
				data: {'id': clicked_folder_id},
				method: 'POST',
				dataType: 'json',
				async: true,
				success: function(data) {
					$(active_bag).hide();
					var $ul = $('#content' + data['folderId']);

					if ($ul.length == 0) { 
						$ul = $('<ul id="content' + data['folderId'] + '" class="thumbnails"></ul>');
						$ul.appendTo($('#bag'));
					}
					else
					{
						$ul.empty();
					}

					for (var f = 0; f < data['folders'].length; f++) {
						$ul.append('<li id="folder' + data['folders'][f]['id'] + '" class="folder"><a data-target="#" class="img-polaroid"><i class="icon-folder-close"></i> ' + data['folders'][f]['name'] + '</a></li>');
					}					
					for (var i = 0; i < data['images'].length; i++) {
						$ul.append('<li id="image' + data['images'][i]['id'] + '" class="item"><img src="<?= base_url() ?>images/' + data['images'][i]['path'] + '" style="max-height: 50px; width: auto;" class="img-polaroid" /></li>');
					}					
					$('#bag li.item').drags({ 'within': '#area' });
					$ul.fadeIn();
					$('<li><a href="#" id="path' + clicked_folder_id + '">' + clicked_folder.text() + '</a> <span class="divider">/</span></li>').appendTo($('#path'));
					active_bag = '#content' + data['folderId'];
				}
			});
		});
		$('#bag li.item').drags({ 'within': '#area' });
		$('#bag').on('dropped', 'li.item', function (e) {
			if (($(e.target).offset().left < $('#backslide').offset().left + $('#backslide').outerWidth()) && (($(e.target).offset().top + $(e.target).outerHeight()) > $('#backslide').offset().top)) 
			{
				$.ajax({
					url: '<?= site_url('/sessions/set_background') ?>',
					method: 'POST',
					dataType: 'json',
					async: true,
					data: {'table': <?= $table['id'] ?>, 'image': e.target.id.substr(5)},
				});				
			}
			else
			{
				$.ajax({
					url: '<?= site_url('/sessions/create_object') ?>',
					method: 'POST',
					dataType: 'json',
					async: true,
					data: {'table': <?= $table['id'] ?>, 'image': e.target.id.substr(5), 'x': $(e.target).offset().left - $('#objects').offset().left, 'y': ($(e.target).offset().top - $('#objects').offset().top)},
				});
			}
			$(e.target).fadeOut(function() {
				e.target.style.position = '';
				e.target.style.top = '';
				e.target.style.left = '';
			}).fadeIn();
		});
		$('.object').drags({ 'within': '#area' });
		$(document).on('dropped', '.object', function (e) {			
			var id = e.target.id.substr(3);
						
			if (($(e.target).offset().left < $('#trash').offset().left + $('#trash').outerWidth()) && ($(e.target).offset().top < $('#trash').offset().top + $('#trash').outerHeight())) 
			{
				$.ajax({
					url: '<?= site_url('/sessions/destroy_object') ?>',
					method: 'POST',
					dataType: 'json',
					async: true,
					data: {'id': id},
				});				
			}
			else 
			{
				$.ajax({
					url: '<?= site_url('/sessions/move_object') ?>',
					method: 'POST',
					dataType: 'json',
					async: true,
					data: {'id': id, 'x': $(e.target).offset().left - $('#objects').offset().left, 'y': ($(e.target).offset().top - $('#objects').offset().top)},
				});
			}
						
			e.stopPropagation();
		}).on('dblclick', '.object', function(e) {
			var id = this.id.substr(3);
			$.ajax({
				url: '<?= site_url('/sessions/activate_object') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'id': id},
			});
			e.stopPropagation();			
		});
		$(window).on('beforeunload', function() {
			$.ajax({
				url: '<?= site_url('/sessions/leave/' . $table['id']) ?>',
				method: 'GET',
				dataType: 'json',
				async: false,
			});
		});
<?php endif; ?>
		poll();
	});

	function poll() {
		$.ajax({ 
			url: "<?= site_url('/sessions/rolling_log') ?>", 
			method: 'GET',
			async: true,
			data: {'id': <?= $table['id'] ?>, 'last_log_id': last_log_id},
			success: function(data){
        for (var c = 0; c < data.length; c++)
        {
        	var action = data[c];
        	last_log_id = action['id'];
        	
        	switch(action['action'])
        	{
        		case '1':
        			$('#obj' + action['objectId']).animate({left: action['toX'] + 'px', top: action['toY'] + 'px'}).effect('highlight', {color: '#6f6'});
        			break;
        		case '2':
        			$('#obj' + action['objectId']).effect('bounce').effect('highlight', {color: '#f66', queue: false});
        			break;
        		case '3':
        			$('#obj' + action['objectId']).effect('highlight', {color: '#f66', queue: false}).fadeOut(function() { $(this).remove(); });
        			break;
        		case '4':
        			$newObj = $('<div id="obj' + action['objectId'] + '" class="object" style="left: ' + action['toX'] + 'px; top: ' + action['toY'] + 'px;"><img src="<?= base_url() ?>images/' + action['path'] + '" /></div>');
        			$('body').append($newObj);
        			$newObj.fadeIn().effect('highlight', {color: '#6f6'})
        			$newObj.drags({ 'within': '#area' });
        			break;
        		case '5':
        			// player joined
        			$('<div id="player' + action['objectId'] + '" class="player seat0"><img src="' + action['image'] + '" alt="' + action['name'] + '" title="' + action['name'] + '" /></div>').appendTo('#seat0').fadeIn();
        			break;
        		case '6':
        			// player left
        			$('#player' + action['objectId']).effect('highlight', {color: '#f66', queue: false}).fadeOut(function() { $(this).remove(); });
        			break;
        		case '7':
        			// player sat
        			$('#player' + action['objectId']).fadeOut(function () {$(this).appendTo('#seat' + action['toX'] + ' ul').fadeIn('bounce')});
        			break;
        		case '8':
        			// new background
        			$('#table').css('background-image', 'url(<?= base_url() ?>images/' + action['path'] + ')');
        			break;
        		case '9':
        			alert('The initiator of this session has ended it.');     			
        			location.reload(true);
        	}
        }
    }, dataType: "json", complete: poll, timeout: 30000 });
  }
</script>