<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {
	var $month = array("January", "February", "March", "April", "May", "June",
	 "July", "August", "September", "October", "November",
	 "December", "Spring", "Summer", "Fall", "Winter");
	
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
			case "cat":
				return "cat";
			case "descript":
				return "descript";
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
		$this->output->set_header('cache-Control: no-store, no-cache');
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
	
    function delete($id, $table, $cat_id = FALSE)
    {
    	if($id != FALSE)
    	{
        	$this->db->where('id', $id);
        	if(!$cat_id)
        		$this->db->where('user_id', $this->Common->user_id());
			else
				$this->db->where('cat_id', $this->session->userdata('cat_id'));
			$this->db->delete($table); 
			if($this->db->affected_rows() > 0 )	
				return TRUE;
		}
		
		return FALSE;
    }
    
    function write_date($date, $month_title = "month", $year_title = "year", $span = 8, $tool_title) {
		$year_name = $date % 10000;
		$month_name = ($date - $year_name) / 10000;
    	if($year_name == 0)
    		$year_name = "";
    	echo '<div class="span' . $span . '"><select name="' . $month_title . '" class="span6" >';
			foreach($this->month as $key=>$option) {
				echo "<option value=\"$key\" ";
				if($key === $month_name) echo 'selected="selected"';
				echo ">$option</option>";
			}
		echo '</select>';
		$attributes = array(
			"name" => $year_title,
			"value" => $year_name,
			"class" => "span6",
			"placeholder" => "Year",
    		"rel" => "tooltip",
    		"data-title" => $tool_title,
			);
		echo form_input($attributes);
		echo "</div>";
    }
    
    function html_date ($date) {
    	$year = $date % 10000;
    	if($year == 0)
    		return;
    	$month = $this->month[($date - $year) / 10000];
    	return $month . " " . $year;
    }
    
    function get_order_id($id, $table) {
    	$this->db->select('order_id');
    	$this->db->where("id", $id);
    	$query = $this->db->get($table);
    	return reset($query->result())->order_id;
    }
    
    function fix_order_id ($orderid, $table, $where) {
    	$where .= " AND order_id > '$orderid'";
    	$str = "UPDATE `$table` SET `order_id` = order_id-1 WHERE " . $where;
		$this->db->query($str);
    }
}

