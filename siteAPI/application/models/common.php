<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(base_url() . 'application/libraries/uni.php');

include (base_url() . "classes.php");

class Common extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

	function chash($str) 
	{
		return hash('sha512', $str);
	}
	
	function uid($len = 10) 
	{
		return $this->Basic->secure_random_bytes($len);
	}
	
	function is_logged_in()
	{
		if(!$this->confirm_login())
		{
	        redirect('welcome');
		}
	}
	
	function confirm_login()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
	        return false;
		}
		return true;
	}
	
	function type_table($id)
	{
		if(!isset($id))
			return "cat";
			
		switch ($id)
		{
			case 1:
				return "uni";
			case 2:
				return "experience";
			case 3:
				return "skill_header";
			case 4:
				return "honors";
			case 5:
				return "additional";
		}
		
		return FALSE;
	}
	
	//returns -1 if nothing found
	function user_id($email = NULL)
	{
		if(isset($email))
		{
			$this->db->select('id');
			$this->db->where('email', $email);
            $query = $this->db->get('users');
            if($query->num_rows == 1) 
            {
				foreach ($query->result() as $user) {
					return $user->id;
				}
            }
		}
		else if($this->session->userdata('user_id') > -1) 
		{
			return $this->session->userdata('user_id');
		}
		return -1;
	}
	
	function check_pass($pass, $user_id = NULL) 
	{
		if(!isset($user_id)) $user_id = $this->Common->user_id();
		
		$this->db->select('password');
		$this->db->where('id', $user_id);
		$query = $this->db->get('users');
		foreach($query->result() as $user) 
		{
			$salt = substr($user->password, 0, 40);
        	$conf = substr($salt . $this->Common->chash($salt . $pass), 0, 512);
        	if($conf == $user->password)
        		return TRUE;
        }
        return false;
	}
	
	function user_info()
    {
		$this->db->where('id', $this->user_id()); 
		$this->db->select('id, name, email');
		$query = $this->db->get('users');  
	
		return reset($query->result());
	}
	
	function logout()
	{
		$this->output->set_header('cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header("cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	function next_order_id($table_name, $where = FALSE) 
	{
		$this->db->select('IFNULL( MAX(order_id), 0 )+1 AS order_id', FALSE);
		if(!$where) 
			$this->db->where('user_id', $this->user_id());
		else
			$this->db->where($where);
		$query = $this->db->get($table_name);
		return reset($query->result())->order_id;
	}
	
    function delete($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->where('user_id', $this->Common->user_id());
		$this->db->delete($table); 
    }
}

