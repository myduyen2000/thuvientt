<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giohang_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Giohang_view');
	}

}

/* End of file Giohang_controller.php */
/* Location: ./application/controllers/Giohang_controller.php */