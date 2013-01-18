<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->helper('directory');
		include('./classes.php');
	}
	
	function index()
	{
		$cat_name = $this->uri->segment(2);
		$this->load->model('Resume_model');
		$cat_id = $this->input->post('cat_id');
		$type_id = $this->input->post('type_id');
		$data['type'] = $this->Common->type_table($type_id);
		$data['type_id'] = $type_id;
		$data['cat_id'] = $cat_id;
		$data['title'] = $this->input->post('title');
		$data['info'] = $this->Resume_model->type_count($cat_id, $type_id, TRUE);
		
		if ($data['type'] != FALSE)
			$data['context'] = 'resume_page';
		else
			redirect('site');
						
		$this->load->view('template/main', $data);
	}
	
	function modify()
	{
		$this->load->model('Resume_model');
		$type_id = $this->input->post('type_id');
		if($this->input->post('action')=='Delete')
			$this->Resume_model->delete($this->input->post('id'), $type_id);
		else 
		{
			switch($type_id)
			{
				case 1:
					$object = new uni($_POST);
					break;
				case 1.1: 
					$object = new courses($_POST);
					break;
				case 2:
					$object = new experience($_POST);
					break;
				case 2.1:
					$object = new descript($_POST);
					break;
				case 3:
					$object = new skill_header($_POST);
					break;
				case 3.1:
					$object = new skills($_POST);
					break;
				case 3.2:
					$object = new skill_list($_POST);
					break;
				case 3.3:
					$object = new skill_queue($_POST);
					break;
				case 4:
					$object = new honors($_POST);
					break;
				case 5:
					$object = new additional($_POST);
					break;
			}
			if($this->input->post('action') == 'Add')
				$this->Resume_model->add($object, $type_id);
			else
				$this->Resume_model->update($object, $this->input->post('id'), $type_id);
		}
		$this->index();
	}
	
	function modify_cats()
	{
		$this->load->model('Resume_model');
		$type_id = $this->input->post('type_id');
		$table_name = $this->Common->type_table($type_id);
		if(!$table_name)
			redirect('site');
		if($this->input->post('action')=='Delete')
		{
			$this->Resume_model->delete($this->input->post('id'), $type_id);
		}
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
}
