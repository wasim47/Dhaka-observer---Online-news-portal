<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('dashboard_model');	
		
		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}
		/*elseif (!($this->session->userdata('sa') == 1))
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('base_url'), 'refresh');
		}*/ else

		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$data['onload']='admin';
            $data['users']=$this->data['users'];
            $data['message']=$this->data['message'];
            $data['data']=$this->data;
            $data['main_content']="admin/index";
			//$data['main_content']="admin/manage_user";
            $this->load->view('deshboard_templete', $data);
			//$this->load->view('admin/index', $this->data);
		}
	}
	
	function article()
	{
		$data['page_title']	="Article";
		//$data['pages']		= $this->Page_model->get_pages();
		$data['main_content']="admin/create_article";
         $this->load->view('deshboard_templete', $data);
	}
	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ 
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('email_address'), $this->input->post('password'), $remember))
			{ 
				//if the login is successful
				//redirect them back to the home page
				 $this->session->set_flashdata('message', $this->ion_auth->messages());

				//redirect($this->config->item('base_url'), 'refresh');
                                 redirect('dashboard', 'refresh');
			}
			else
			{ 
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
		$data['onload']='login';
		$data['message']=$this->data['message'];
		$data['data']=$this->data;
		$data['main_content']="admin/login";
        $this->load->view('deshboard_templete', $data);

//$this->load->view('admin/login', $data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/login', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', 'Old password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{ 
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = /*(validation_errors()) ? validation_errors() : */ $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			//$this->load->view('admin/change_password', $this->data);
						$data['onload']='password';
                        $data['message']=$this->data['message'];
                        $data['min_password_length']=$this->data['min_password_length'];
                        $data['new_password_confirm']=$this->data['new_password_confirm'];
                        $data['old_password']=$this->data['old_password'];
                        $data['new_password']=$this->data['new_password'];
                        $data['user_id']=$this->data['user_id'];
                        $data['main_content']="admin/change";
                        $this->load->view('deshboard_templete', $data);
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{ 
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('admin/forgot_password', $this->data);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten)
			{ 
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("admin/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_admin->errors());
				redirect("admin/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{  
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->load->view('admin/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) 
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error('This form post did not pass our security checks.');

				} 
				else 
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{ 
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('admin/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{ 
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("admin/forgot_password", 'refresh');
		}
	}
	
	//activate the user
	function activate($id)
	{

			$activation = $this->dashboard_model->activate($id);
		
                    redirect('admin', 'refresh');
	}
	
	
	//deactivate the user
	function deactivate($id )
	{
		$this->dashboard_model->deactivate($id);

			//redirect them back to the admin page
			redirect('admin', 'refresh');	
	}


	function user_account()
	{
		$this->data['title'] = "Create User";

		if (!$this->ion_auth->logged_in())
		{
			redirect('admin', 'refresh');
		}
            $data['main_content']="admin/create_user";
           $this->load->view('deshboard_templete', $data);
	}
	
	function create_user()
	{
		/*$this->data['title'] = "Create User";

		if (!$this->ion_auth->logged_in() || !($this->session->userdata('sa') == 1))
		{
			redirect('admin', 'refresh');
		}*/
			$additional_data = array(
				'email' => $this->input->post('email'),
				'password '  => sha1($this->input->post('password')),
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'  => $this->input->post('companyName'),
			);
			$this->ion_auth_model->createUser($additional_data);
			redirect("admin/index", 'refresh');
			//redirect("admin/login", 'refresh');
	}
	
	function edit_user($id)
	{
		$data['id']=$id;  
		$data['editUser']=$this->ion_auth_model->editUser($id);   
		$data['main_content']="admin/edit_user";
        $this->load->view('deshboard_templete', $data);
	}
	
	function update_user()
	{
		$this->data['title'] = "Edit Profile";
		if (!$this->session->userdata('identity'))
		{
			redirect('admin/login', 'refresh');
		}
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'  => $this->input->post('companyName'),
				'email'    => $this->input->post('email'),
				'password'    => $this->input->post('password')
			);
			$u_id=$this->input->post('id');
          	$this->ion_auth_model->updateUser($u_id,$data);
			redirect('admin', 'refresh');
	}

	function edit_profile()
	{
		$id=$this->session->userdata('user_id');  
		$data['editUser']=$this->ion_auth_model->editUser($id);   
		$data['main_content']="admin/edit_profile";
        $this->load->view('deshboard_templete', $data);
	}
	

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	 

}
