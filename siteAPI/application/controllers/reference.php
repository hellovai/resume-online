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
		$this->load->view('template/main', $data);
	}

	function modify()
	{

		$this->Ref_model->update(
							$this->input->post('id'),
							$this->input->post('name'),
							$this->input->post('email'),
							$this->input->post('phone'),
							$this->input->post('address'),
							$this->input->post('company')
							);
		$data['success'] = "Your reference was saved!";
		redirect('/reference/');
	}
	
	function delete()
	{
	
		$this->Common->delete($this->uri->segment(3),'reference');
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


}
