<?php

class Site extends CI_Controller 
{
	//function __construct()
	//{
	//	$this->Common->is_logged_in();
	//}

	function members_area()
	{
		$this->Common->is_logged_in();
		$data['context'] = "test";
		$this->load->view("template/main", $data);
	}
	
	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}

}
