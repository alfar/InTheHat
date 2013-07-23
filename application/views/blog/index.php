<div id="blog_content" class="container"></div>

<script type="text/javascript" src="<?= base_url() ?>javascript/jquery.simple-infinite-scroll.min.js"></script>
<script type="text/template" id="blog_template">
<div class="pull-right well" style="margin: 10px;">
	<p class="text-center"><img src="{image}" class="picture img-polaroid" /></p>
	<p class="text-center"><a href="<?= site_url('/users/profile/{author}'); ?>">{name}</a></p>
	<p class="text-center muted"><small>{posted}</small></p>
</div>
<h2><?= anchor('/blogs/view/{slug}', '{title}') ?></h2>
<div id="main">{text}</div>

</script>
<script type="text/javascript">	
	var blog_next_page = 0;
	var blog_template = document.getElementById('blog_template').innerHTML;
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
	function populateBlogs(data) {
		if (populate(document.getElementById('blog_content'), blog_template, data)) {
			blog_next_page += 10;
		}
		else
		{
			blog_next_page = -1;
		}
	}

	$(function() {		
		var blogs = <?= $blogs ?>;
		populateBlogs(blogs);
	
		$(window).simpleInfiniteScroll({
			offset: 10,
			ajaxOptions: {
				url: '/blogs/json_index',
				method: 'GET',
				async: true,
				dataType: 'json',
				beforeSend: function() {
					if (blog_next_page > 0) {
						$.ajax($.extend(this, {
							url: '<?= site_url('/blogs/json_index'); ?>/' + blog_next_page + author_string,
							beforeSend: null
						}));
					}
					return false;					
				},
			},
			callback: populateBlogs
		});

	});
</script>