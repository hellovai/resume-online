<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

        function validate()
        {
                $this->db->where('email', $this->input->post('email'));
                $query = $this->db->get('users');
                
                if($query->num_rows == 1)
                {
                        foreach ($query->result() as $user) {
                                $salt = substr($user->password, 0, 40);
                                $conf = substr($salt . $this->Common->chash($salt . $this->input->post('password')), 0, 512);
                                if($conf == $user->password )
                                        return array(true, $user->id);
                        }
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
}


