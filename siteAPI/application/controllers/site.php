<?php

class Site extends CI_Controller 
{ 
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Resume_model');
		$this->load->model('Cover_model');
		$this->Common->is_logged_in();
	}
	
	function index()
	{
		$data['categories'] = $this->Resume_model->cat_info();
		$data['covers'] = $this->Cover_model->get_covers(5);
		$this->load->model('Ref_model');
		$data['references'] = $this->Ref_model->get_refs(5);
		$this->load->model('Documents');
		$data['documents'] = $this->Documents->get_resumes(5);
		
		$data['context'] = 'homepage';
		$this->load->view('template/main', $data);
	}
	
	function members_area()
	{
		$this->Common->is_logged_in();
		$data['context'] = "test";
		$this->load->view("template/main", $data);
	}
	
	function save() 
	{
		$type = $this->uri->segment(2);
		switch($type)
		{
			case("cover"):
				$this->Cover_model->save_title($this->input->post('cover_id'), $this->input->post('title'));
				break;
			case("resume"):
				$this->Resume_model->save_title($title->input->post('cat_id'), $this->input->post('title'));
				break;
		}
		$this->index();
	}
	
	function mod_cat()
	{
		$info['user_id'] = $this->Common->user_id();
		$info['type_id'] = $this->input->post('type_id');
		$info['title'] = $this->input->post('title');
		$info['order_id'] = $this->input->post('order_id');
		
    	$this->db->insert('cat', $info);
    	redirect('site');
	}
	
}
