<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lichsu_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
		
	// }
	public function showLichsuUser($id)
	{
		$this->load->model('User');
		$data = $this->User->thongbaoUser($id);
		$ketqua = array('traketqua' =>$data);
	
		
		$this->load->view('lichsuUser_view', $ketqua);
		
	}
	public function showLichsuUser0($id)
	{
		$this->load->model('User');
		$data = $this->User->lichsuUser0($id);
		$data = array('dulieutrave' =>$data);
		//echo "$ketqua";
		
		$this->load->view('lichsuUser_view', $data);
	}

}

/* End of file lichsu_controller.php */
/* Location: ./application/controllers/lichsu_controller.php */