<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	function send() {
	
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'lastnameitry@googlemail.com',
			'smtp_pass' => 'vaibhavjoshjonathan',
		);
		
		$this->load->library('email', $config);
	
		
		$this->email->from('lastnameitry@gmail.com', 'Jeffrey Way');
		
		$this->email->reply_to($this->input->post('email'), $this->input->post('name'));
		$this->email->to('kacxdak@gmail.com');

		$this->email->subject('Resume Builder: ' . $this->input->post('subject'));
		$this->email->message($this->input->post('message'));	

		if($this->email->send()) 
			redirect('welcome');
		else
			show_error($this->email->print_debugger());
	}
}
