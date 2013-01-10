<?php

class Cover_model extends CI_Model {

        function get_covers($max = false)
        {
        	$this->db->order_by("updated", "desc");
        	$this->db->where('user_id', $this->session->userdata('user_id')); 
        	$this->db->select('id, title, updated');
        	if($max === false)
        	{
				$query = $this->db->get('cover_letter');  
			}
			else
			{
				$query = $this->db->get('cover_letter',$max);  
			}
				
			   
            return $query->result();
        }
        function get_info($cover_id = false)
        {
		
        	if(!$cover_id)
        	{
        		$this->db->order_by("updated", "desc");
        	}
        	else
        	{
        		$this->db->where('id', $cover_id); 
        	}
        	$this->db->where('user_id', $this->session->userdata('user_id'));
        	$this->db->select('id,title,updated,info');
        	$query = $this->db->get('cover_letter',1); 
        	
			return reset($query->result());
        }
        
        function save_title($cover_id,$title)
        {
        	$data = array('title' => $title);
			$this->db->where('id', $cover_id);
			$this->db->update('cover_letter', $data); 
        }
        
        function save_text($cover_id,$info)
        {
        	$data = array('info' => $info);
   			$this->db->where('id', $cover_id);
   			$this->db->set('updated', 'NOW()', FALSE);  	  
			$this->db->update('cover_letter', $data);   
        }
        
        function create($title)
        {
        	$data = array('title' => $title, 'user_id' => $this->Common->user_id());
			$this->db->set('created', 'NOW()', FALSE);
			$this->db->set('updated', 'NOW()', FALSE);
			$this->db->insert('cover_letter', $data); 
        }

}
