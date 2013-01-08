<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

	function chash($str) 
	{
		return hash('sha512', $str);
	}
	
	function uid($len = 10) 
	{
		return $this->Basic->secure_random_bytes($len);
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page.';
			echo anchor('login', 'Sign in here!');
			die();	
		}
	}
	
	function type_table($id)
	{
		switch ($id)
		{
			case 1:
				return "uni";
			case 2:
				return "experience";
			case 3:
				return "skill_header";
			case 4:
				return "honors";
			case 5:
				return "additional";
		}
	}
	
	function user_id()
	{
		return $this->session->userdata('user_id');
	}
	
}

