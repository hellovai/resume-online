<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Common->is_logged_in();
		$this->load->model('Resume_model');        
		$this->load->model('Membership_model');	
	}
	
	function index()
	{
		$data['info'] = $this->Membership_model->get_info();
		$data['address'] = $this->Membership_model->get_address();
		$data['website'] = $this->Membership_model->get_website();		
		$data['phone'] = $this->Membership_model->get_phone();
		
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
	
	function preview() {
		$category = $this->Resume_model->cat_info(true);
		foreach ($_POST as $key => $value) {
			$id = substr($key, 9);
			if (substr($key, 0, 9) == "category_" ) {
				$data['category'][$id]['content'] = $value;
				$data['category'][$id]['type'] = $category[$id]->type_id;
				$check_key = "course_" . $id;
				switch($category[$id]->type_id) {
					case 1:
						if(array_key_exists($check_key, $_POST))
							$data['category'][$id]['extra'] = $_POST[$check_key];
						break;
					case 2:
						if(array_key_exists("phrase_" . $id, $_POST))
							$data['category'][$id]['extra'] = $_POST["course_".$id];
						break;
					case 3:
						if(array_key_exists("skill_" . $id, $_POST))
							$data['category'][$id]['extra'] = $_POST["course_".$id];
						break;
					case 4:
					case 5:
					default:
						break;
				}
			}
		}
		
		foreach($data['category'] as $key=>$item) {
			switch($item['type']) {
				case 1:
					$starter = "course_";
					break;
				case 2:
					$starter = "phrase_";
					break;
				case 3:
					$starter = "skill_";
					break;
				case 4:
				case 5:
				default:
					$starter = "";
			}
			foreach($item['content'] as $key2=>$content) {
				$key3 = $starter . $content;
				if(array_key_exists($key3 , $_POST))
					$data['category'][$key]['extra'][$content] = $_POST[$key3];
			}
		}
		
		$user_view = array();
		foreach( $data['category'] as $key=>$content ) {
			$object = (object) NULL;
			$object->key = $key;
			$object->title = $category[$key]->title;
			$object->type = $content['type'];
			$object->value = (array) $content['content'];
			$object->extra = NULL;
			if(array_key_exists("extra" , $content))
				$object->extra = $content['extra'];
			$user_view[] = $object;
		}
		
		$data['user_view'] = $user_view;
		
		$data['context'] = "preview";
		$this->load->view('template/main', $data);
	}
}
