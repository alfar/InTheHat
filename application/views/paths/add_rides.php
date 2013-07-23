<h1><?= $path['name'] ?></h1>

<ul id="rides">
<?php foreach($rides as $ride): ?>
	<li id="ride<?= $ride['id'] ?>" class="ride"><?= $ride['name'] ?> <span class="commands"><span class="remove">remove</span></span></li>
<?php endforeach; ?>
	<li id="ride0"></li>
</ul>

<fieldset>
	<legend>Search for rides to add</legend>
<form class="form-search">
<div class="input-append"><input type="text" id="search" class="search-query" /> <button id="search_button" class="btn">Search</button></div>
</form>
<ul id="results"></ul>
</fieldset>
<script type="text/javascript" src="<?= base_url() ?>javascript/jquery.drags.js"></script>
<script type="text/javascript" src="<?= base_url() ?>javascript/jquery-ui-1.10.3.effects.min.js"></script>
<script type="text/javascript">
	function GetLiBelow(x, y) {
	    var $elements = $("#rides li").map(function() {
	        var $this = $(this);
	        var offset = $this.offset();
	        var l = offset.left;
	        var t = offset.top;
	        var h = $this.height();
	        var w = $this.width();
	
	        var maxx = l + w;
	        var maxy = t + h;
	
	        return (y <= maxy && y >= t) && (x <= maxx && x >= l) ? $this : null;
	    });
	
	    return $elements;
	}

	$(function() {
		$('#rides').on('click', '.commands .remove', function(e) {
			var $li = $(this).closest('li');
			$.ajax({
				url: '<?= site_url('/paths/remove_ride') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'path': <?= $path['id'] ?>, 'ride': $li.get(0).id.substr(4)},
				success: function(data) {
					$li.fadeOut(function() { $li.remove(); });
				}
			});			
		});
		$('#search_button').on('click', function(e) {
			$.ajax({
				url: "<?= site_url('/rides/search') ?>", 
				method: 'POST',
				async: true,
				data: {'language_id': <?= $path['language_id'] ?>, 'searchword': $('#search').val()},
				success: function(data){
					var $results = $('#results');
					$results.empty();
					var count = 0;
					$.each(data, function(index, item) {
						if ( $('#ride' + item['id']).length == 0 ) {
							$('<li id="ride' + item['id'] + '" class="ride">' + item['name'] + ' <span class="commands"><span class="remove">remove</span></span></li>').appendTo($results);						
							count++;
						}
					});
					if (count > 0)
					{
						$('#results li').drags();
					}
					else if (data.length > 0)
					{
						$('<li>All found rides are already in the path</li>').appendTo($results);						
					}
					else
					{
						$('<li>No rides found</li>').appendTo($results);
					}
				}
			});
			e.preventDefault();
		});
		$('#results').on('dropped', 'li', function(e) {
			var drop = $(e.target).offset();
			e.target.style.position = '';
			e.target.style.top = '';
			e.target.style.left = '';			
			var $droppedon = GetLiBelow(drop.left, drop.top + ($(e.target).outerHeight() / 2)).not($(e.target));
			
			if ($droppedon.length != 1)
			{
				return;
			}			

			$.ajax({
				url: '<?= site_url('/paths/insert_ride') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'path': <?= $path['id'] ?>, 'ride': e.target.id.substr(4), 'before': $droppedon.get(0).get(0).id.substr(4)},
				success: function(data) {
					$droppedon.get(0).effect('highlight');
					$(e.target).insertBefore($($droppedon.get(0).get(0)));
				}
			});
		});
		$('li.ride').drags();
		$('#rides').on('dropped', 'li.ride', function(e) {
			var drop = $(e.target).offset();
			e.target.style.position = '';
			e.target.style.top = '';
			e.target.style.left = '';			
			var $droppedon = GetLiBelow(drop.left, drop.top + ($(e.target).outerHeight() / 2)).not($(e.target));
			
			if ($droppedon.length != 1)
			{
				return;
			}
			
			$.ajax({
				url: '<?= site_url('/paths/move_ride') ?>',
				method: 'POST',
				dataType: 'json',
				async: true,
				data: {'path': <?= $path['id'] ?>, 'ride': e.target.id.substr(4), 'move_before': $droppedon.get(0).get(0).id.substr(4)},
				success: function(data) {
					$droppedon.get(0).effect('highlight');
					$(e.target).insertBefore($($droppedon.get(0).get(0)));
				}
			});
		});
	});
</script>