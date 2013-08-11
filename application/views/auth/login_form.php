<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'input-block-level',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'input-block-level',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<p><?php echo form_label($login_label, $login['id']); ?><?php echo form_input($login); ?></p>
<?php echo form_error($login['name'], '<div class="alert alert-error">', '</div>'); ?><?php echo isset($errors[$login['name']])?'<div class="alert alert-error">'.$errors[$login['name']].'</div>':''; ?>
<p><?php echo form_label('Password', $password['id']); ?><?php echo form_password($password); ?></p>
<?php echo form_error($password['name'], '<div class="alert alert-error">', '</div>'); ?><?php echo isset($errors[$password['name']])?'<div class="alert alert-error">'.$errors[$password['name']].'</div>':''; ?>
<p><?php echo form_label(form_checkbox($remember, 'class="checkbox inline"') . ' Remember me', $remember['id']); ?></p>
<div class="form-actions"><?php echo form_submit('submit', 'Let me in', 'class="btn btn-primary"'); ?> <?php echo anchor('/auth/forgot_password/', 'Forgot password', 'class="btn btn-link"'); ?> <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register', 'class="btn btn-link"'); ?></div>
<?php echo form_close(); ?>