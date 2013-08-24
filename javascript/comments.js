var comments_loaded = {};

$(function() {
	$('.comments').each(function(c, com) {		
		var type = $(this).data('type');
		var object_id = $(this).data('object-id');
		var page_size = $(this).data('page-size');
		var comments = this;
		$('#' + this.id + '_more').click(function() {
			$.ajax({ 
				url: site_url + '/comments/index/' + type + '/' + object_id, 
				method: 'POST',
				async: true,
				data: {'start': comments_loaded[type + '_' + object_id], 'limit': page_size},
				success: $.proxy(populateComments, comments), 
				dataType: "json"
			});			
		});		
		
		$.ajax({ 
			url: site_url + '/comments/index/' + type + '/' + object_id, 
			method: 'POST',
			async: true,
			data: {'start': 0, 'limit': page_size},
			success: $.proxy(populateComments, this), 
			dataType: "json"
		});
	});
	
	$('.comment-submit').on('click', function(e) {
		e.stopPropagation();
		e.preventDefault();
		var post = $(this).closest('form').find(':input').serialize()
		$(this).closest('form').find('input[name="text"]').val('');
		$.ajax({
			url: site_url + '/comments/create', 
			method: 'POST',
			async: true,
			data: post,
			success: $.proxy(populateNewComments, $('#' + $(this).data('target'))), 
			dataType: "json"			
		});
		$(this).closest('form').find('input[name="text"]').focus();
	});
});

function populateNewComments(data)
{
	var type = $(this).data('type');
	var object_id = $(this).data('object-id');

	if (type + '_' + object_id in comments_loaded)
	{
		comments_loaded[type + '_' + object_id] += data.length;
	}
	else
	{
		comments_loaded[type + '_' + object_id] = data.length;
	}

	var latest = $('#latest_' + type + '_' + object_id);
	var latestid = latest.val()

	for (var c = 0; c < data.length; c++)
	{
		if (latestid < data[c]['id'])
		{
			latestid = data[c]['id'];
		}

		$(this).prepend('<div class="comment"><div class="muted"><small>' + data[c]['authorName'] + ' - ' + data[c]['posted'] + '</small></div><p>' + data[c]['text'] + '</p></div>');		
	}
	latest.val(latestid);
}
function populateComments(data)
{
	var type = $(this).data('type');
	var object_id = $(this).data('object-id');
	
	if (type + '_' + object_id in comments_loaded)
	{
		comments_loaded[type + '_' + object_id] += data.comments.length;
	}
	else
	{
		comments_loaded[type + '_' + object_id] = data.comments.length;
	}

	var latest = $('#latest_' + type + '_' + object_id);
	var latestid = latest.val();
	
	for (var c = 0; c < data.comments.length; c++)
	{
		if (latestid < parseInt(data.comments[c]['id']))
		{
			latestid = data.comments[c]['id'];
		}
		$(this).append('<div class="comment"><div class="muted"><small>' + data.comments[c]['authorName'] + ' - ' + data.comments[c]['posted'] + '</small></div><p>' + data.comments[c]['text'] + '</p></div>');		
	}
	latest.val(latestid);
	
	if (comments_loaded[type + '_' + object_id] >= data.total)
	{
		$('#' + this.id + '_more').fadeOut();
	}
}