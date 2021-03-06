<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		if($this->input->post('cover_id'))
			$this->session->set_userdata('cover_item', $this->input->post('cover_id'));
		
		$data['cover'] = $this->Cover_model->get_info($this->session->userdata('cover_item'));
		$data['context'] = 'cover_page';
		$this->load->view('template/main', $data);
	}

	function save()
	{
		$this->Cover_model->save_text($this->input->post('id'),$this->input->post('info'));
		$this->Cover_model->save_title($this->input->post('id'),$this->input->post('title'));
		$data['success'] = "Your cover letter was saved!";
		redirect('cover');
	}
	
	function delete()
	{
		$redirect = $this->uri->segment(4, "cover"); 
		$cover_id = $this->uri->segment(3);
		if($this->Common->delete($cover_id, 'cover_letter')) {
			if($this->session->userdata('cover_item') === $cover_id)
				$this->session->unset_userdata('cover_item');
			$data['success'] = "Your cover letter was deleted!";
		}
		redirect($redirect);
	}
	
	function create()
	{
		$this->Cover_model->create($this->input->post('title'));
		redirect('cover');
	}

}
