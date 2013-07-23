<div id="ride_list" class="container"></div>

<script type="text/javascript" src="<?= base_url() ?>javascript/jquery.simple-infinite-scroll.min.js"></script>
<script type="text/template" id="ride_template">
	<div class="pull-right">
		<p class="text-center"><a href="<?= site_url('/users/profile/{author}'); ?>"><img src="{userImage}" class="picture img-polaroid" /></a></p>
		<p class="text-center"><small><a href="<?= site_url('/users/profile/{author}'); ?>">{userName}</a></small></p>
	</div>
	<p class="lead"><a href="<?= site_url('/rides/show/{id}') ?>">{name}</a></p>
	<p><?= anchor('/languages/show/{languageId}', '{language}', 'class="badge badge-info"') ?></p>
</script>
<script type="text/javascript">	
	var ride_next_page = 0;
	var ride_template = document.getElementById('ride_template').innerHTML;
	var author_string = '<?= isset($user) ? ('/' . $user) : '' ?>';

	function populate(target, template, data) {
		for (var i = 0; i < data.length; i++) {
			var item = data[i];
			art = document.createElement('div');
			art.className = 'well clearfix';
			art.innerHTML = template.replace(/\{(.*?)\}/gi, function(ignore, m) { return item[m]; }) ;
			target.appendChild(art);
		}
		return data.length >= 10;
	}
	function populateRides(data) {
		if (populate(document.getElementById('ride_list'), ride_template, data)) {
			ride_next_page += 10;
		}
		else
		{
			ride_next_page = -1;
		}		
	}

	$(function() {		
		var rides = <?= $rides ?>;
		populateRides(rides);
	
		$(window).simpleInfiniteScroll({
			offset: 10,
			ajaxOptions: {
				url: '/rides/json_index',
				method: 'GET',
				async: true,
				dataType: 'json',
				beforeSend: function() {
					if (ride_next_page > 0) {
						$.ajax($.extend(this, {
							url: '<?= site_url('/rides/json_index'); ?>/' + ride_next_page + author_string,
							beforeSend: null
						}));
					}
					return false;					
				},
			},
			callback: populateRides
		});

	});
</script>