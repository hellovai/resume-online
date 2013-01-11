<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->Common->confirm_login())
			redirect('site/');	

		$data['context'] = "welcome_message";
		$this->load->view('template/main', $data);

		
	}
	
	public function page()
	{
		if($this->uri->segment(3) != false) {
			$data['context'] = $this->uri->segment(3);
			$this->load->view('template/main', $data);
		} else {
			redirect('404');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
