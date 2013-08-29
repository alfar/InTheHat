<?PHP
function comment_form($type, $object_id, $target)
{
	$st = form_open('comments/create', array('class' => 'form-inline'));
	$st .= '<fieldset>';
	$st .= form_hidden('type', $type);
	$st .= form_hidden('object_id', $object_id);
	$st .= '<input type="hidden" name="latest" value="0" id="latest_' . $type . '_' . $object_id . '" />';
	$st .= '<div class="controls"><div class="input-append">' . form_textarea(array('name' => 'text', 'class' => 'span8 comment-textarea', 'rows' => 1, 'placeholder' => 'Write a comment'));
	$st .= ' ' . form_submit(array('id' => 'comment', 'class' => 'btn comment-submit', 'value' => 'Comment', 'data-target' => $target)) . '</div></div>';
	$st .= '</fieldset>';
	$st .= form_close() . register_comment_script();
	
	return $st;
}

function comment_list($id, $type, $object_id, $page = 20)
{
	return '<div id="' . $id . '" class="comments" data-page-size="' . $page . '" data-type="' . $type . '" data-object-id="' . $object_id . '"></div><div id="' . $id . '_more"><a data-target="#" class="btn btn-small btn-info">Show more</a></div>' . register_comment_script();	
}

function register_comment_script()
{
	static $registered = FALSE;
	
	if ( ! $registered )
	{
		$registered = TRUE;
		return '<script type="text/javascript" src="' . base_url() . '/javascript/jquery.autosize.min.js"></script><script type="text/javascript">var site_url = "' . site_url() . '";</script><script type="text/javascript" src="' . base_url() . '/javascript/comments.js"></script>';		
	}
	
	return '';	
}