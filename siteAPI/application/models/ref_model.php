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
    	$data = array('name' => $name, 'user_id' => $this->Common->user_id(), 'order_id' => $this->Common->next_order_id('reference',false));
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
    	$data = array('name' => $name, 'user_id' => $this->Common->user_id());
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
    
    $this->db->query("UPDATE reference SET order_id = order_id - 1 WHERE order_id > '".$order_id."' AND user_id = '".$this->Common->user_id()."'");
    $this->Common->delete($id,'reference');  
    }
    
    function swap($order_id1, $order_id2)
    {
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->where('order_id', $order_id1);
		$this->db->select('id');
		$query = $this->db->get('reference');
		$query=reset($query->result());
    	$this->db->where('user_id', $this->Common->user_id());
		$this->db->where('order_id', $order_id2);
		$this->db->select('id');
		$query2 = $this->db->get('reference');
		$query2 = reset($query2->result());
		
		$data = array('order_id' => $order_id2);
		$this->db->where('id', $query->id);
    	$this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
        $this->db->update('reference', $data); 
        
		$data = array('order_id' => $order_id1);
		$this->db->where('id', $query2->id);
    	$this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
        $this->db->update('reference', $data); 
    }

}

