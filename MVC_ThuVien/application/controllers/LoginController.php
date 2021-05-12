<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo 'this is page login';
		$this->load->library('session');

		if($this->session->userdata('user')){
			redirect('ShowDataSach_controller','refresh');
		}
		else{
			$this->load->view('login_view');
		}
		
	}
	public function processLogin()
	{
		$this->load->helper('url');
		$this->load->library('session');

		$id =  $this->input->post('id');
		$pass =  $this->input->post('password');

		$this->load->model('User');
		$ketqua=$this->User->checkExists($id,$pass);
		if($ketqua){
			if($ketqua['password'] == $pass){
			$this->session->set_userdata('user', $ketqua);
			redirect('ShowDataSach_controller','refresh');
		}
	}
		else{
			echo '<script>
				alert("Nhập sai thông tin tài khoản hoặc mật khẩu");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}


	}
	public function logout()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('Start_controller','refresh');
	
	}
}


/* End of file ShowDataSach_controller.php */
/* Location: ./application/controllers/ShowDataSach_controller.php */