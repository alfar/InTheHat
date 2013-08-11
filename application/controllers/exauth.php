<?php
class ExAuth extends MY_Controller
{	
	public function session($providername) 
	{
		$this->load->helper('url');
		$this->load->spark('oauth2/0.4.0');
		$this->load->library('OAuth2');		
		
		if ($providername == 'google') {
			$client_id = '110806680393.apps.googleusercontent.com';
			$client_secret = 'N3xTyhxSCCzrZKPShakEBLzv';
		}
		elseif ($providername == 'facebook') {
			$client_id = '526948700700414';
			$client_secret = '5116be2d1de8a9d1cadf3c07c543f11d';
		}
		else
		{
			show_error('Unsupported oauth provider selected. You hacker! ;)');
		}
		
		$provider = $this->oauth2->provider($providername, array(
        'id' => $client_id,
        'secret' => $client_secret,
    ));		 

		if ( ! $this->input->get('code'))
    {
    	// By sending no options it'll come back here
    	$url = $provider->authorize();

			redirect($url);
    }
    else
    {
			try
			{
				// Have a go at creating an access token from the code
				$token = $provider->access($_GET['code']);

				// Use this object to try and get some user details (username, full name, etc)
        $user = $provider->get_user_info($token);

				$this->load->model('user_model');
				
				if ($providername == 'google')
				{
					$user['image'] .= '?sz=50';
				}
				elseif ($providername == 'facebook')
				{
					$user['image'] = str_replace('type=normal', 'type=square', $user['image']);
				}
				
				$existinguser = $this->user_model->update_user($providername, $user['uid'], $user['name'], $user['email'], $user['image']);
				
				if ($existinguser == FALSE)
				{
					$existinguser = $this->user_model->create_user($providername, $user['uid'], $user['name'], $user['email'], $user['image']);
				}
				
				$this->session->set_userdata(array('id' => $existinguser, 'name' => $user['name'], 'image' => $user['image']));
				
				redirect('/');
      }
      catch (OAuth2_Exception $e)
      {
      	show_error('That didnt work: '.$e);
			}
		}
	}
	
	public function logout()
	{
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('/');		
	}
}