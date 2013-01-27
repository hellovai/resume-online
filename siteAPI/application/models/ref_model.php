<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_model extends CI_Model
{
	
	function get_refs( $max = FALSE )
	{
		$this->db->where('user_id', $this->Common->user_id());
		$this->db->order_by('order_id', 'desc');
		$this->db->select('id, name, order_id');
		if(!$max)
			$query = $this->db->get('reference');
		else
			$query = $this->db->get('reference',$max);
		
		return $query->result();
	}
	
	function ref_info ( $item_id = FALSE ) {
		if ( $item_id != FALSE )
			$this->db->where('id', $item_id);
		else if(!$this->session->userdata('ref_item'))
			$this->db->order_by('order_id', 'desc');
		else
			$this->db->where('id', $this->session->userdata('ref_item'));

		$this->db->where('user_id', $this->Common->user_id());
		$this->db->select('id, name, email, company, address, phone, order_id');
		$query = $this->db->get('reference',1);
		$item = reset($query->result());
		
		
		//redundancy to assure that correct data is stored
		if($query->num_rows() == 0)
			$this->session->set_userdata('ref_item', false);
		else
			$this->session->set_userdata('ref_item', $item->id);
		
		return $item;
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
    	$this->session->set_userdata('ref_item', $this->db->insert_id());
    }
    
    function update($id, $name, $email, $phone, $address, $company)
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
    
    function delete($id, $order_id = FALSE)
    {
    	if($order_id === false)
    		$order_id = $this->Common->get_order_id($id, "reference");
    	
    	if($this->Common->delete($id,'reference')) {
    		$where = "user_id = " . $this->session->userdata('user_id');
    		$this->Common->fix_order_id($order_id, "reference", $where);
			if($this->session->userdata('ref_item') == $id)
				$this->session->unset_userdata('ref_item');
		} else {
			return FALSE;
		}
		return TRUE;
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

