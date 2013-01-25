<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reference extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->model('Ref_model');	
	}
	
	function index()
	{
		$data['refs'] = $this->Ref_model->get_refs();
		$data['context'] = 'reference_page';

		if($this->input->post('ref_id') != false)
			$this->session->set_userdata('ref_item', $this->input->post('ref_id'));
		
		$data['reference'] = $this->Ref_model->ref_info();
		$this->load->view('template/main', $data);
	}

	function modify()
	{
		$this->Ref_model->update(
							$this->session->userdata('ref_item'),
							$this->input->post('name'),
							$this->input->post('email'),
							$this->input->post('phone'),
							$this->input->post('address'),
							$this->input->post('company')
							);

		$this->index();
	}
	
	function delete()
	{
	
		//$this->Common->delete($this->uri->segment(3),'reference');
		
		$this->Ref_model->delete($this->uri->segment(3), $this->uri->segment(4));
		$data['success'] = "Your reference was deleted!";
		redirect('/reference/');
	
	}

	
	function create()
	{
		$this->Ref_model->create(
							$this->input->post('name'),
							$this->input->post('email'),
							$this->input->post('phone'),
							$this->input->post('address'),
							$this->input->post('company')
							);
		redirect('/reference/');
	}
	function swap()
	{
		$this->Ref_model->swap($this->uri->segment(3),$this->uri->segment(4));
		redirect('/reference/');	
	}


}
