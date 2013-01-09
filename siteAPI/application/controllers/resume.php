<?php

class Resume extends CI_Controller
{
	/*function __construct()
	{
	}*/
	
	function index()
	{
		$cat_name = $this->uri->segment(2);
		$this->load->model('resume_model');
		$cat_id = $this->input->post('cat_id');
		$type_id = $this->input->post('type_id');
		
		$data['info'] = $this->Resume_model->type_count($cat_id, $type_id, TRUE);
		$data['context'] = 'resume_page';
		
		$this->load->view('template/main', $data);
	}
	
	function modify()
	{
		$this->load->model('resume_model');
		$type_id = $this->input->post('type_id')
		if($this->input->post('action')=='delete')
		{
			$this->Resume_model->delete($this->input->post('id'), $type_id);
		}
		else
		{
			switch($type_id)
			{
				case 1:
					$object = new uni($_POST);
					break;
				case 2:
					$object = new courses($_POST);
					break;
				case 3:
					$object = new experience($_POST);
					break;
				case 4:
					$object = new descript($_POST);
					break;
				case 5:
					$object = new skill_header($_POST);
					break;
				case 6:
					$object = new skills($_POST);
					break;
				case 7:
					$object = new skill_list($_POST);
					break;
				case 8:
					$object = new skill_queue($_POST);
					break;
				case 9:
					$object = new honors($_POST);
					break;
				case 10:
					$object = new additional($_POST);
					break;
			}
			$this->Resume_model->update($object, $this->input->post('id'), $type_id);
		}
		$this->index();
	}
}
