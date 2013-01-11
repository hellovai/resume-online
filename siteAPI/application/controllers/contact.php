<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	function send() {
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'lastnameitry@gmail.com';
		$config['smtp_pass'] = 'vaibhavjoshjonathan';
		
		$this->load->library('email', $config);

		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('kacxdak@gmail.com');

		$this->email->subject('Resume Builder: ' . $this->input->post('subject'));
		$this->email->message($this->input->post('message'));	

		if($this->email->send()) 
		redirect('welcome');
		else
			show_error($this->email->print_debugger());
	}
}
