<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginUser_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo 'this is page login';
		$this->load->library('session');

		if($this->session->userdata('docgia')){
			redirect('User_controller','refresh');
		}
		else{
			$this->load->view('loginUser_view');
		}
		
	}
	public function home()
	{
		$this->load->helper('url');
		$this->load->library('session');

		$id =  $this->input->post('id');
		$pass =  $this->input->post('password');

		$this->load->model('LoginUser');
		$ketqua=$this->LoginUser->checkExists($id,$pass);
		// var_dump($ketqua);
		// die();
		$ar = array('ketqua'=>$ketqua , 'dataCart' => array());

		if( $ketqua){
			if($ketqua['pass'] == $pass ){
				$this->session->set_userdata('docgia', $ar);
				redirect('User_controller','refresh');
			}
			
		}
		else{
			echo '<script>
			alert("Nhập sai thông tin tài khoản hoặc mật khẩu");
			setTimeout(function(){
				window.history.back();
				},500);
				</script>';
			// redirect('Start_controller','refresh');

			}
			
			
			


		}
		public function logout()
		{
			$this->load->helper('url');
			$this->load->library('session');
			$this->session->unset_userdata('docgia');
			redirect('Start_controller','refresh');

		}
	}


	/* End of file ShowDataSach_controller.php */
/* Location: ./application/controllers/ShowDataSach_controller.php */