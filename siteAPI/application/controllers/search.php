<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();                 
		$this->load->model('Search_model');	
		$this->load->model('Dragdrop_model');	

	}
	
	function index()
	{
		$data['item'] = $this->Search_model->get_skill();
		$this->load->view('search', $data);
	}

	function sort_me()
	{
		//$table_name = $this->uri->segment(3);
		//foreach ($_GET['listItem'] as $position => $item)
		//{
   		// $sql[] = "UPDATE `table` SET `position` = $position WHERE `id` = $item"; 
		//}
 		echo 'im gay';
		//print_r ($sql); 
		//$this->Dragdrop_model->($_GET['listItem'],$table_name);
	}
}
