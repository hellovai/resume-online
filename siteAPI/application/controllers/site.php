<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site extends CI_Controller {

	public function index()
	{
		$this->load->view('test');
	}

	public function welcome()
	{
		$this->load->model('test');
		$data['values'] = $this->test->getEntries(); 
		$this->load->view('print_stuff',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
