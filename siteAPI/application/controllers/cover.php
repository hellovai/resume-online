<?php

class Cover extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->model('Cover_model');	
	}
	
	function index()
	{
		$data['titles'] = $this->Cover_model->get_covers();
		
		$data['cover'] = $this->Cover_model->get_info($this->input->post('cover_id'));
		
		$data['context'] = 'cover_page';
		$this->load->view('template/main', $data);
	}

	function save()
	{
		$this->Cover_model->save_text($this->input->post('id'),$this->input->post('info'));
		$this->Cover_model->save_title($this->input->post('id'),$this->input->post('title'));
		$data['success'] = "Your cover letter was saved!";
		redirect('/cover/');
	}
	
	function delete()
	{
		$cover_id = $this->uri->segment(3, "");
		$this->Cover_model->delete($cover_id);
		$data['success'] = "Your cover letter was deleted!";
		redirect('/cover/');
	}

	
	function create()
	{
		$this->Cover_model->create($this->input->post('title'));
		redirect('/cover/');
	}


}
