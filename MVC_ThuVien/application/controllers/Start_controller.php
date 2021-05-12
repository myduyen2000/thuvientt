<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Start_view');
		

	}

}

/* End of file test_controller.php */
/* Location: ./application/controllers/test_controller.php */