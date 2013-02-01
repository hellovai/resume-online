<?php 

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dragdrop extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();                 
		$this->load->model('Dragdrop_model');	

	}
	
	function index()
	{
	}

	function sort_me()
	{
		$table_name = $this->uri->segment(3);
		$this->Dragdrop_model->update(array_reverse($_GET['listItem']),$table_name);
	}
	
}
