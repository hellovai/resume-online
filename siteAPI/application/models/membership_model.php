<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

        function validate()
        {
        	$user_id = $this->Common->user_id($this->input->post('email'));
            
            if($this->Common->check_pass($this->input->post('password'), $user_id)) {
            	return array(true, $user_id);
            }
            
            return array(false, NULL);
        }

        function create_member()
        {
            $salt = $this->Common->uid(40);
            $salt = substr($this->Common->chash($salt), 0, 40);

            $new_member_insert_data = array(
                    'name' => $this->input->post('first_name') . ' ' . $this->input->post('last_name') ,
                    'email' => $this->input->post('email_address'),
                    'password' => $salt . $this->Common->chash($salt . $this->input->post('password'))
            );

            $insert = $this->db->insert('users', $new_member_insert_data);
            return $insert;
        }

		function get_info()
        {
        	return $this->Common->user_info();
        }
        
        function get_address()
        {
        	$this->db->where('user_id', $this->Common->user_id()); 
        	$this->db->select('id,address,def');
			$query = $this->db->get('address');  
			
            return $query->result();
        }
        
        function get_website()
        {
        	$this->db->where('user_id', $this->Common->user_id()); 
        	$this->db->select('id,url,def');
			$query = $this->db->get('website');  
			
            return $query->result();
        }
        
        function get_phone()
        {
         	$this->db->where('user_id', $this->Common->user_id()); 
        	$this->db->select('id,numbers,def');
			$query = $this->db->get('phone');  
			
            return $query->result();
        }

        function update_user($name,$email,$password = false)
        {
        	if(!$password)
            	$data = array('email' => $email, 'name' => $name);
            else
            {
                $salt = $this->Common->uid(40);
            	$salt = substr($this->Common->chash($salt), 0, 40);
                $data = array('email' => $email, 'name' => $name,'password' => $salt . $this->Common->chash($salt . $password));
            }
            $this->db->where('id', $this->Common->user_id());
            $this->db->update('users', $data);
        }

        function update($info, $id, $name)
        {
            $this->db->where('id', $id);
            $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
            $this->db->update($name, $info);
        }
        
        function delete($id,$name)
        {
            $this->db->where('id', $id);
            $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
			$this->db->delete($name); 
        }

        function add($info,$name)
        {
			$this->db->insert($name, $info); 
        }


}


