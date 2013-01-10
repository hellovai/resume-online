<?php

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if($this->Common->confirm_login())
		{
			redirect('site');
		}
	}
	
	function index()
	{
		$data['context'] = 'login_form';
		$this->load->view('template/main', $data);		
	}
	
	function validate_credentials()
	{		
		$this->load->model('Membership_model');
		$query = $this->Membership_model->validate();
		
		if($query[0]) // if the user's credentials validated...
		{
			$data = array(
				'user_id' => $query[1],
				'is_logged_in' => true,
			);
			$this->session->set_userdata($data);
			redirect('site/members_area');
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}
	
	function signup()
	{
		$data['context'] = 'signup_form';
		$this->load->view('template/main', $data);
	}
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$data['context'] = 'signup_form';
			$this->load->view('template/main', $data);
		}
		
		else
		{			
			$this->load->model('Membership_model');
			
			if($this->Membership_model->create_member())
			{
				$data['context'] = 'signup_successful';
				$this->load->view('template/main', $data);
			}
			else
			{
				$data['context'] = 'signup_form';
				$this->load->view('includes/template', $data);			
			}
		}
		
	}

}
