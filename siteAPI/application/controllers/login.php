<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['content_view'] = "jonathan";
		
		$this->load->view('template/main', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
