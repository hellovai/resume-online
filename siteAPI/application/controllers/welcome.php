<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['context'] = "welcome_message";
		$this->load->view('template/main', $data);
	}
	
	public function logout()
	{
		$this->Common->logout();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
