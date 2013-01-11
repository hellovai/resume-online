<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model
{
	
	function get_refs( $max = NULL )
	{
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->order_by('order_id', 'asc');
		$this->db->select('id, name, email, company, address, phone');
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

}

