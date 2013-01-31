<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->model('Resume_model');
	}
	
	function index()
	{
		$category = $this->Resume_model->cat_info();
		$data['category'] = $category;
		$data['details'] = array();
		foreach($category as $cat) {
			$item = $this->Resume_model->type_count($cat->cat_id, $cat->type_id, TRUE);
			$data['details'][$cat->cat_id] = $item;
		}
		
		$data['context'] = "generate";
		$this->load->view('template/main', $data);
	}
	
}
