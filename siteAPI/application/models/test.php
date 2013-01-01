<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }


	function getEntries()
    {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result();
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
