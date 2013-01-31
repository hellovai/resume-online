<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();                 
		$this->load->model('Search_model');	

	}
	
	function index()
	{
		$data['item'] = $this->Search_model->get_skill();
		$this->load->view('search', $data);
	}
	
}
