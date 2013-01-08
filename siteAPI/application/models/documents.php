//This model will deal with everything to do with documents

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents extends CI_Model()
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_resumes($user_id, $max = NULL)
	{
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->order_by('created', 'desc');
		$this->db->select('id, filename, created, ispublic, ext');
		if(!isset($max))
		{
			$query = $this->db->get('document');
		}
		else
		{
			$query = $this->db->get('document',$max);
		}
		
		return $query->result();
	}
}

