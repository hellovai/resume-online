//This model will get information from the resume stuff

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume_model extends CI_Model()
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cat_info()
	{
		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id))
		{
			return -1;
		}
		
		$this->db->where('user_id', $user_id);
		$this->db->order_by('order_id', 'asc');
		$query = $this->db->get('cat');
		$cat_info = array();
		
		foreach($query->result() as $info)
		{			
			$cat_count = $this->type_count($info->id, $info->type_id);
			
			$cat_info[] = array("count"=>$cat_count, "type_id"=>$type_id, "title"=>$info->title, "order_id"=>$info->order_id);
		}
		return $cat_info;
	}
	
	function type_count($cat_id, $type_id)
	{
		$table_name = $this->Common->type_table($type_id);
		
		$this->db->where('cat_id',$cat_id);
		$query = $this->db->get($table_name);
		
		return $query->num_rows
	}
	
	function save_title($cat_id,$title)
    {
    	$data = array('title' => $title);
		$this->db->where('id', $cat_id);
		$this->db->update('cat', $data); 
    }
}


