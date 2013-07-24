<?PHP
function tiny_editor($name, $value = '') 
{
	if ( ! is_array($name) ) 
	{
		$name = array('name' => $name, 'class' => 'tiny');
	}
	
	if ( ! isset($name['class']) )
	{
		$name['class'] = 'tiny';
	}
	
	$editor = '<textarea';
	
	foreach ($name as $k=>$v)
	{
		$editor .= " $k=\"$v\"";		
	}

	$editor .= '>' . $value . '</textarea>';	
	
	return $editor;
}

function tiny_mce() 
{
	$result = '<script type="text/javascript" src="' . base_url() . '/javascript/tiny_mce/jquery.tinymce.js"></script>' .
						'<script type="text/javascript">' .
						'$(function() {$(\'textarea.tiny\').tinymce({script_url : \'' . base_url() . '/javascript/tiny_mce/tiny_mce.js\'});	});' .
						'</script>';
	return $result;
}

function register_autocomplete() 
{
	static $registered = FALSE;
	
	if ( ! $registered )
	{
		$registered = TRUE;
		return '<script type="text/javascript" src="' . base_url() . '/javascript/jquery.autocomplete.min.js"></script>';
	}
	
	return '';
}

function autocomplete($id, $lookup)
{
	$result = register_autocomplete() . '<script type="text/javascript">$(function() { $(\'' . $id . '\').autocomplete({ serviceUrl: \'' . site_url($lookup) . '\' }); });</script>';
	return $result;
}

function register_magicsuggest()
{
	static $registered = FALSE;
	
	if ( ! $registered )
	{
		$registered = TRUE;
		return '<script type="text/javascript" src="' . base_url() . '/javascript/magicsuggest-1.3.0.js"></script>';		
	}
	
	return '';
}

function magicsuggest($id, $lookup, $value, $settings = NULL)
{
	if ($settings === NULL)
	{
		$settings = array();
	}
	$settings['data'] = site_url($lookup);
	$result = register_magicsuggest() . '<script type="text/javascript">$(function() { var ms = $(\'' . $id . '\').magicSuggest(' . json_encode($settings) . '); $(ms).on(\'load\', function() { if (this._dataset === undefined) { this._dataset = true; ms.setValue(' . json_encode(array($value)) . '); }}); });</script>';
	return $result;
}

function register_flexbox()
{
	static $registered = FALSE;
	
	if ( ! $registered )
	{
		$registered = TRUE;
		return '<script type="text/javascript" src="' . base_url() . '/javascript/jquery.flexbox.min.js"></script>';		
	}
	
	return '';
}

function flexbox($id, $lookup, $settings = NULL)
{
	$result = register_flexbox() . '<script type="text/javascript">$(function() { $(\'' . $id . '\').flexbox("' . site_url($lookup) . '", ' . json_encode($settings) . ' ); });</script>';
	return $result;
}

function register_select2()
{
	static $registered = FALSE;
	
	if ( ! $registered )
	{
		$registered = TRUE;
		return '<script type="text/javascript" src="' . base_url() . '/javascript/select2.min.js"></script>';		
	}
	
	return '';
}

function language_select2($id, $value, $class = 'input-block-level', $allow_create = TRUE, $settings = NULL)
{
	if ($settings === NULL)
	{
		$settings = array();
	}
	$settings['ajax'] = array('url' => site_url('languages/flexbox'));
		
	$result = register_select2() . '<input type="hidden" name="' . $id . '" id="' . $id . '" class="' . $class . '" value="' . $value . '" /><script type="text/javascript">$(function() { var cfg = ' . json_encode($settings) . '; cfg.ajax.data = function(term, page) { return { "q": term, "p": page }; }; cfg.ajax.results = function(data, page) { return {"more" : data.more, "results" : $.map(data.results, function(itm) { return {"id": itm.name, "text" : itm.name}; }) };}; cfg.formatResult = function(object, container, query) { return (object["new"] !== undefined ? "<small class=\"muted\">New language: </small>" : "") + object.text; }; ' . ($allow_create ? 'cfg.createSearchChoice = function(term) { return {\'id\': term, \'new\': true, \'text\': term }; }; ' : '') . 'cfg.placeholder = \'Pick a language\'; cfg.initSelection = function(element, callback) {callback({\'id\' : element.val(), \'text\' : element.val()})}; $(\'#' . $id . '\').select2(cfg); });</script>';
	return $result;
}

function language_id_select2($id, $value, $class = 'input-block-level', $allow_create = TRUE, $settings = NULL)
{
	if ($settings === NULL)
	{
		$settings = array();
	}
	$settings['ajax'] = array('url' => site_url('languages/flexbox'));
		
	$result = register_select2() . '<input type="hidden" name="' . $id . '" id="' . $id . '" class="' . $class . '" value="' . $value . '" /><script type="text/javascript">$(function() { var cfg = ' . json_encode($settings) . '; cfg.ajax.data = function(term, page) { return { "q": term, "p": page }; }; cfg.ajax.results = function(data, page) { return {"more" : data.more, "results" : $.map(data.results, function(itm) { return {"id": itm.id, "text" : itm.name}; }) };}; cfg.formatResult = function(object, container, query) { return (object["new"] !== undefined ? "<small class=\"muted\">New language: </small>" : "") + object.text; }; ' . ($allow_create ? 'cfg.createSearchChoice = function(term) { return {\'id\': 0, \'new\': true, \'text\': term }; }; ' : '') . 'cfg.placeholder = \'Pick a language\'; cfg.initSelection = function(element, callback) {callback({\'id\' : -1, \'text\' : element.val()})}; $(\'#' . $id . '\').select2(cfg); });</script>';
	return $result;
}

function language_levels()
{
	static $data = array(
		'1' => 'Tarzan at a party',
		'2' => 'Getting to the party',
		'3' => 'What happened at the party?',
		'4' => 'What if parties were illegal?'
	);
	
	return $data;
}

function language_level_name($level)
{
	$data = language_levels();
	return $data[$level];
}

function language_level_link($id, $level)
{
	$data = language_levels();
	return language_level_link_handler() . '<a href="#" id="' . $id . '" data-value="' . $level . '" class="language_level_link">' . $data[$level] . '</a>';
}

function language_level_picker($id, $class, $level)
{
	$data = language_levels();
	return register_select2() . form_dropdown($id, $data, $level, 'id="' . $id . '" class="' . $class . '"');
}

function language_level_link_handler()
{
	static $registered = FALSE;
	
	if ($registered == FALSE)
	{
		$registered = TRUE;
		
		return '<script type="text/javascript" src="' . base_url() . 'javascript/language_level_link.js"></script>';
	}
	
	return '';
}