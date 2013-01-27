<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->model('Resume_model');
	}
	
	function index()
	{
		$data['categories'] = $this->Resume_model->cat_info();
		
		if($this->input->post('cat_id') !== false)
			$this->session->set_userdata('cat_id', $this->input->post('cat_id'));
		if($this->input->post('type_id') !== false)
			$this->session->set_userdata('type_id', $this->input->post('type_id'));
		if($this->input->post('resume_id') !== false)
			$this->session->set_userdata('resume_item', $this->input->post('resume_id'));
		
		if($this->session->userdata('cat_id') == false) {
			$item = reset($this->Resume_model->cat_info());
			if(isset($item->cat_id)) {
				$this->session->set_userdata('type_id', $item->type_id);
				$this->session->set_userdata('cat_id', $item->cat_id);
			} else {
				redirect('site');
			}
		}
		
		$data['type'] = $this->Common->type_table($this->session->userdata('type_id'));
		
		$data['info'] = $this->Resume_model->type_count($this->session->userdata('cat_id'), $this->session->userdata('type_id'), TRUE);
		
		if ($data['type'] != FALSE || $data['type'] != "cat")
			$data['context'] = 'resume_page';
		else
			redirect('site');
		
		$this->load->view('template/main', $data);
	}
	
	function modify()
	{
		$type_id = $this->session->userdata('type_id');
		
		$this->load->model('Table_model');
		switch($type_id)
		{
			case 1:
				$object = $this->Table_model->uni($_POST);
				break;
			case 2:
				$object = $this->Table_model->experience($_POST);
				break;
			case 3:
				$object = $this->Table_model->skill_header($_POST);
				break;
			case 4:
				$object = $this->Table_model->honors($_POST);
				break;
			case 5:
				$object = $this->Table_model->additional($_POST);
				break;
		}
		
		if($this->input->post('action') == 'Add')
			$this->Resume_model->add($object, $type_id);
		else
			$this->Resume_model->update($object, $this->session->userdata('resume_item'), $type_id);
		
		redirect('resume');
	}
	
	function modify_cats()
	{
		$type_id = $this->input->post('type_id');
		$table_name = $this->Common->type_table($type_id);
		if(!$table_name)
			redirect('site');
		if($this->input->post('action')=='Delete')
			$this->Resume_model->delete($this->input->post('id'), $type_id);
		else if ($this->input->post('action')=='Add Category');
		{
			$info['user_id'] = $this->Common->user_id();
			$info['type_id'] = $this->input->post('type_id');
			$info['title'] = $this->input->post('title');			
			$info['order_id'] = $this->Common->next_order_id("cat");
    		$this->db->insert('cat', $info);
    		redirect('site');
    	}
	}
	
	function delete()
	{
		$redirect = $this->uri->segment(4,"resume");
		if($this->session->userdata('cat_id') == $this->uri->segment(3)) {
			$this->session->unset_userdata('cat_id');
			$this->session->unset_userdata('type_id');
			$this->session->unset_userdata('resume_item');
		}
		$this->Resume_model->delete($this->uri->segment(3), "cat");
		$data['success'] = "Your category was deleted!";
		redirect($redirect);
	}
	
	function deleteitem() {
		if($this->uri->segment(3) == "course")
			$this->Resume_model->delete_course($this->uri->segment(4));
		else if($this->uri->segment(3) == "phrase")
			$this->Resume_model->delete_phrase($this->uri->segment(4));
		else
			$this->Resume_model->deleteitem($this->uri->segment(3));
		redirect('resume');
	}
	
	function view()
	{
		$this->session->set_userdata('cat_id', $this->uri->segment(3));
		$this->session->set_userdata('type_id', $this->uri->segment(4));
		redirect('resume');
	}
	
	//functions meant for specific calls
	function add_course() {
		if($this->session->userdata('type_id') == 1) // 1 is uni
			$this->Resume_model->add_course($this->input->post('title'));
		redirect('resume');
	}
	function add_phrase() {
		if($this->session->userdata('type_id') == 2 ) // 2 is experience
			$this->Resume_model->add_phrase($this->input->post('phrase'));
		redirect('resume');
	}
}
