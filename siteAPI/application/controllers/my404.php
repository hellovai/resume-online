<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class my404 extends CI_Controller
{
	public function __construct()
	{
	        parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$data['context'] = 'error_404'; // View name
		$this->load->view('template/main',$data);//loading in my template
	}
}
?>
