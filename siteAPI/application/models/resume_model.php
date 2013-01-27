<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume_model extends CI_Model
{

	function cat_info()
	{
		$user_id = $this->Common->user_id();
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
			
			$cat_info[] = (object)array("count"=>$cat_count, "cat_id" =>$info->id, "type_id"=>$info->type_id, "title"=>$info->title, "order_id"=>$info->order_id);
		}
		return $cat_info;
	}
	
	function type_count($cat_id, $type_id, $req_data = FALSE)
	{
		$table_name = $this->Common->type_table($type_id);

		if($table_name==FALSE)
			return FALSE;

		$this->db->where('cat_id', $cat_id);		
		$query = $this->db->get($table_name);
		
		if ($req_data==FALSE)
			return $query->num_rows;
			
		return $query->result();
	}
	
	function save_title($title, $cat_id = FALSE)
    {
    	$data = array('title' => $title);
		$this->db->where('id', $cat_id);
		$this->db->update('cat', $data); 
    }
    
    function type_info($item_id = FALSE) {
		if ( $item_id != FALSE )
			$this->db->where('id', $item_id);
		else if(!$this->session->userdata('resume_item'))
			$this->db->order_by('order_id', 'desc');
		else
			$this->db->where('id', $this->session->userdata('resume_item'));
		
		$this->db->where('cat_id', $this->session->userdata('cat_id'));
		$table_name = $this->Common->type_table($this->session->userdata('type_id'));

		$query = $this->db->get($table_name,1);
		$item = reset($query -> result());

		//redundancy to assure that correct data is stored
		if($query->num_rows() == 0)
			$this->session->set_userdata('resume_item', false);
		else
			$this->session->set_userdata('resume_item', $item->id);

		return $item;
    }
    
    function delete($id, $type_id = FALSE)
    {
    	if(!$type_id)
    		$type_id = $this->session->userdata('type_id');
    	
    	return $this->Common->delete($id, $this->Common->type_table($type_id));
    }
    
    function deleteitem ($id, $order_id = false) {
    	$table_name = $this->Common->type_table($this->session->userdata('type_id'));
    	if($order_id === false)
    		$order_id = $this->Common->get_order_id($id, $table_name);
    	
    	if($this->Common->delete($id, $table_name, $this->session->userdata('cat_id'))) {
			$where = "cat_id = '" . $this->session->userdata('cat_id') . "'";
			$this->Common->fix_order_id($order_id, $table_name, $where);
		} else
			return FALSE;
		return TRUE;
    }
    
    function add($object, $type_id = FALSE)
    {
    	if(!$type_id)
    		$type_id = $this->session->userdata('type_id');
    	
    	$object->cat_id = $this->session->userdata('cat_id');
    	$table_name = $this->Common->type_table($type_id);
    	$object->order_id = $this->Common->next_order_id($table_name, array("cat_id" => $object->cat_id) );
    	$this->db->insert($table_name, $object);
    	$this->session->set_userdata('resume_item', $this->db->insert_id());
    }
    
    function update($object, $id, $type_id)
    {
    	$table_name = $this->Common->type_table($type_id);
    	$this->db->where('id', $id);
    	$this->db->update($table_name, $object);
    }
    
    
    //functions for specific database calls
    function get_courses($uni_id = FALSE) {
    	if(!$uni_id)
    		$uni_id = $this->session->userdata("resume_item");
    	
    	$this->db->where('uni_id', $uni_id);
    	$this->db->order_by('order_id', 'desc');
    	$query = $this->db->get('courses');
    	return $query->result(); 
    }
    
    function add_course($title) {
    	$object->uni_id = $this->session->userdata('resume_item');
    	$object->course = $title;
    	$object->order_id = $this->Common->next_order_id("courses", array("uni_id" => $object->uni_id));
    	$this->db->insert("courses", $object);
    }
    
    function delete_course($id) {
    	$order_id = $this->Common->get_order_id($id, "courses");
    	$this->db->where("uni_id", $this->session->userdata("resume_item"));
    	$this->db->where("id", $id);
    	$this->db->delete("courses");
    	if($this->db->affected_rows() > 0 )	 {
    		$where = "uni_id='" . $this->session->userdata("resume_item") . "'";
    		$this->Common->fix_order_id($order_id, "courses", $where );
    		return TRUE;
    	}
		return FALSE;
    }
    function get_phrases($exp_id = FALSE) {
    	if(!$exp_id)
    		$exp_id = $this->session->userdata("resume_item");
    	
    	$this->db->where('exp_id', $exp_id);
    	$this->db->order_by('order_id', 'desc');
    	$query = $this->db->get('descript');
    	return $query->result(); 
    }
    
    function add_phrase($title) {
    	$object->exp_id = $this->session->userdata('resume_item');
    	$object->phrase = $title;
    	$object->order_id = $this->Common->next_order_id("descript", array("exp_id" => $object->exp_id));
    	$this->db->insert("descript", $object);
    }
    
    function delete_phrase($id) {
    	$order_id = $this->Common->get_order_id($id, "descript");
    	$this->db->where("exp_id", $this->session->userdata("resume_item"));
    	$this->db->where("id", $id);
    	$this->db->delete("descript");
    	if($this->db->affected_rows() > 0 )	 {
    		$where = "exp_id='" . $this->session->userdata("resume_item") . "'";
    		$this->Common->fix_order_id($order_id, "descript", $where );
    		return TRUE;
    	}
		return FALSE;
    }
}


