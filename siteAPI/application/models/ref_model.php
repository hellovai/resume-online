<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model
{
	
	function get_refs( $max = NULL )
	{
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->order_by('order_id', 'asc');
		$this->db->select('id, name, email, company, address, phone, order_id');
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
	
    function create($name, $email, $phone, $address, $company)
    {
    	$data = array('name' => $name, 'user_id' => $this->Common->user_id(), 'order_id' => sizeof($this->get_refs())+1);
    	if($email)
    		$data['email'] = $email;
      	if($phone) 	
    		$data['phone'] = $phone;
    	if($address)
			$data['address'] = $address;  	
    	if($company)
    		$data['company'] = $company;	
		$this->db->insert('reference', $data); 
    }
    
    function update($id,$name, $email, $phone, $address, $company)
    {
    	$data = array('name' => $name, 'user_id' => $this->Common->user_id(), 'order_id' => sizeof($this->get_refs())+1);
    	if($email)
    		$data['email'] = $email;
      	if($phone) 	
    		$data['phone'] = $phone;
    	if($address)
			$data['address'] = $address;  	
    	if($company)
    		$data['company'] = $company;	
    	$this->db->where('id', $id);
    	$this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
        $this->db->update('reference', $data); 
    }    
    function delete($id,$order_id)
    {
    	
    	// lower the order_id of all greater than by one
    	
    	//this code is broken :( replaced it with a one line query
    	//$this->db->where('user_id', $this->Common->user_id());
    	//$this->db->where('order_id >', $order_id);
    	//$this->db->set('order_id', "order_id-1"); 
		//$query = $this->db->update('reference');
		//$this->db->query("UPDATE reference SET order_id = order_id - 1");
		
		$uid = $this->Common->user_id();
		$this->db->query("UPDATE reference SET order_id = order_id - 1 WHERE user_id = '".$uid."' AND order_id > '".$order_id."'");
		
		// deleting the reference
        $this->db->where('id', $id);
        $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
		$this->db->delete('reference'); 
    }
}

