<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_info extends CI_Model {
	
	
	function __construct()
    {
        parent::__construct();
    }


	function getEntries()
    {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result();
    }
    
    function addExp($cat_id, $positon, $company, $location, $start, $finish) 
    {
    	$sql = "INSERT INTO TABLE exper (cat_id, positon, company, location, start, finish) values (?, ?, ?, ?, ?)";

		$this->db->query($sql, array($cat_id, $positon, $company, $location, $start, $finish)); 
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
