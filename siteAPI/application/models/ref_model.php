<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model
{
	
	function get_refs( $max = NULL )
	{
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->order_by('order_id', 'asc');
		$this->db->select('id, name, email');
		if(!isset($max))
		{
			$query = $this->db->get('reference');
		}
		else
		{
			$query = $this->db->get('reference',$max);
		}
		
		return $query->result();
	}
}

