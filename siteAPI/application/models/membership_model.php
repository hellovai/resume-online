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

        function update_user($name,$email,$password,$old_password)
        {
                if(!$this->Common->check_pass($old_password))
                {

                                return -1;
                        }

                $data = array('email' => $email, 'name' => $name);
                        $this->db->where('id', $this->Common->user_id());
                        $this->db->update('users', $data);
        }

        function update_address($address)
        {
                        $data = array('address' => $address->address, 'def' => $address->def);
                                $this->db->where('id', $addr->id);
                                $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
                                $this->db->update('address', $data);
        }

        function website($website)
        {
                        $data = array('url' => $website->url, 'def' => $website->def);
                                $this->db->where('id', $website->id);
                                $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
                                $this->db->update('website', $data);
        }

        function phone($phone)
        {
                        $data = array('numbers' => $phone->numbers, 'def' => $phone->def);
                                $this->db->where('id', $phone->id);
                                $this->db->where('user_id', $this->Common->user_id()); //don't actually need this line of code
                                $this->db->update('phone', $data);
        }
}


