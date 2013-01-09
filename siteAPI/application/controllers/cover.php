<?php

class Cover extends CI_Controller 
{
	//function __construct()
	//{
		
	//}
	
	function index()
	{
		$this->load->model('cover_model');
		$data['titles'] = $this->Cover_model->get_covers();
		
		$data['cover'] = $this->Cover_model->get_info($this->input->post('cover_id'));
		
		
		$data['context'] = 'cover_page';
		$this->load->view('template/main', $data);
	}

	function save()
	{
		$this->load->model('cover_model');

		$this->Cover_model->save_text($this->input->post('id'),$this->input->post('info'));
		$this->Cover_model->save_title($this->input->post('id'),$this->input->post('title'));
		$data['success'] = "Your cover letter was saved!";
		$this->index();
	}
	

	
	function create()
	{
		$this->load->model('cover_model');
		$this->Cover_model->create($this->input->post('title'));

		$this->index();
	}


}
