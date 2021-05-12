<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('User');
		$data = $this->User->showSach_model();
		$data = array('datacontroller' => $data);
		// var_dump($data);
		$this->load->view('homeUser', $data);
	}
	public function logout()
	{
		$this->load->view('loginUser_view');
	}
	public function home()
	{
		$this->load->view('homeUser');
	}
	public function cart()
	{
		$this->load->view('Giohang_view');
	}
	public function addGiohang_controller($data)
	{
		require('application/models/Cart.php');	
		$this->load->library('session');
		if($this->session->userdata('docgia')){
			$this->load->model('User');
			$items = $this->User->getOne($data);
			// $hinhanh = str_replace('/','-',$value['hinhanh']);
            $infor = 'http://localhost/MVC_ThuVien/index.php/admin_Sach_controller/chitietSach_controller/'.$data;
			$item = new Cart($items[0]['id_sach'],$items[0]['tensach'],$items[0]['hinhanh'],$infor);

			$ketqua = $this->session->userdata('docgia')['ketqua'];
			$dataCart = $this->session->userdata('docgia')['dataCart'];
			$tontai = [];

			foreach ($dataCart as $key => $value) {
				array_push($tontai, $value->id_sach);

			}
			if(!in_array($data, $tontai) && $data != null)
			{
				array_push($dataCart, $item);
			}
			 $this->session->set_userdata('docgia',array('ketqua'=>$ketqua,'dataCart'=>$dataCart));
			//$ketqua = array('mangketqua' =>$dulieu);
			// var_dump($dulieu);
			// die();
			
			//var_dump($ketqua);
			redirect(base_url().'index.php/User_controller/cart','refresh');
		}
		else{
			echo '<p>Bạn chưa đăng nhập ^^ <a href="'.base_url().'index.php/loginUser_controller"> đăng nhập </a> </p>';
		}
	}
	public function datsach()
	{
		$this->load->view('datsach_view');
	}
	public function insertMuon($data)
	{
		$iddocgia = $this->input->post('iddocgia');
		



		$date = date('Y-m-d H:i:s');
		$this->load->model('User');

		$dataIdExists = [];
		$allDataExists = '';
		$dataExists = $this->User->getAllDatHang();
		foreach ($dataExists as $key => $value) {
			array_push($dataIdExists, $value['id_sach']);

		}

		$dataAll = [];
		for($i = 1 ; $i<= $data ; $i++){
			if(!in_array($this->input->post('idsach'.$i),$dataIdExists)){
				$item = array('idsach'=>$this->input->post('idsach'.$i),
				'soluong'=>$this->input->post('soluong'.$i));
				
				array_push($dataAll,$item);
				$item = null;	
			}
			else{
				$allDataExists .= $this->input->post('idsach'.$i).',';
			}
				
		}
		$allDataExists = substr($allDataExists,0,-1);

		$stMain = "INSERT INTO muon (id_sach,id_docgia,ngaymuon_muon,ngaytra_muon,tinhtrang_muon,soluong_muon) values";
		// print_r($dataAll);
		//$ngaymuon= now();
		//echo "	$ngaymuon";
		//$date = ('now()');
		$s = '';
		$allDataAccept = '';
		foreach ($dataAll as $key => $value) {
			$s .= "('".$value['idsach']."','".$iddocgia."',now(),now(),'0','".$value['soluong']."'),";
			$allDataAccept .=$value['idsach'].',';
		}
		$s = substr($s,0,-1);
		$allDataAccept = substr($allDataAccept,0,-1);
		$stMain .= $s;
		if($s == ''){
			echo '<script>
				alert("Mượn không thành công ('.$allDataExists.') ");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}
		else{
			$this->User->insertMuon($stMain,$allDataAccept);
		}

		
	}



	public function deleteGiohang($data)
	{
		require('application/models/Cart.php');	
		$this->load->library('session');
		if($this->session->userdata('docgia')){

			$ketqua = $this->session->userdata('docgia')['ketqua'];
			$dataCart = $this->session->userdata('docgia')['dataCart'];

			$index=0;
			
			foreach ($dataCart as $key => $value) {
				if($data == $value->getIdSach()){
					$index= $key;
					break;
				}
				
			}

			// xoa phan tu thu index	
			unset($dataCart[$index]);

			$this->session->set_userdata('docgia',array('ketqua'=>$ketqua,'dataCart'=>$dataCart));
			//$ketqua = array('mangketqua' =>$dulieu);
			// var_dump($dulieu);
			// die();
			
			//var_dump($ketqua);
			// print_r($this->session->userdata('docgia'));
			redirect(base_url().'index.php/User_controller/cart','refresh');
		}
	}
	public function thongbaoUser($id)
	{
		//$tt='1';
		$this->load->model('User');
		$data = $this->User->thongbaoUser($id);
		$datakhong= $this->User->thongbaoKhong($id);
		$ketqua = array_merge($data, $datakhong);
		 $ketqua = array('traketqua' =>$ketqua);
		

		   // var_dump($ketqua);
		// truyeenf ket qua vao view
		 //
		 $this->load->view('thongbaoUser_view', $ketqua);
		// $this->load->view('thongbaoUser_view', $data);


	}
	// public function thongbaoKhong($id)
	// {
	// 	$this->load->model('User');
	// 	$data = $this->User->thongbaoKhong($id);
	// 	$ketquatv = array('traketquakhong' =>$data);
	// 	 var_dump($ketquatv);
		// truyeenf ket qua vao view
		// $this->load->view('thongbaoUser_view', $ketqua);
	
	// public function showLichsuUser($id)
	// {
	// 	$this->load->model('User');
	// 	$data = $this->User->thongbaoUser($id);
	// 	$ketqua = array('traketqua' =>$data);
	// 	$dulieu = $this->User->lichsuUser0($id);
	// 	$dulieu = array('dulieutrave' =>$dulieu);
		
	// 	$this->load->view('lichsuUser_view', $ketqua);
		
	// }
	public function showLichsuUser0($id)
	{
		$this->load->model('User');
		$data = $this->User->thongbaoUser($id);
		$datakhong= $this->User->thongbaoKhong($id);
		$ketqua = array_merge($data, $datakhong);
		 $ketqua = array('traketqua' =>$ketqua);
		

		   // var_dump($ketqua);
		// truyeenf ket qua vao view
		 //
		 $this->load->view('lichsuUser_view', $ketqua);
		// $this->load->view('thongbaoUser_view', $data);
	}
	public function ShowSachUser_controller()
	{
		$i=$this->input->post('iddanhmucs');
		$this->load->model('User');
		$data=$this->User->ShowSachUser_model($i);
		$data = array('trave' =>$data);
		
		
		$this->load->view('ShowSachUser_view', $data);
	}
		public function ShowGTUser_controller()
	{
		$i=$this->input->post('iddanhmucgt');
		$this->load->model('User');
		$data=$this->User->ShowSachUser_model($i);
		$data = array('travegt' =>$data);
		//var_dump($data);
		
		$this->load->view('ShowGTUser_view', $data);
	}
		public function ShowTCUser_controller()
	{
		$i=$this->input->post('iddanhmuctc');
		//echo "$i";
		
		 $this->load->model('User');
		 $data=$this->User->ShowSachUser_model($i);
		 $data = array('travetc' =>$data);
		 //var_dump($data);
		
		
		$this->load->view('ShowTCUser_view', $data);
	}
		public function ShowTKUser_controller()
	{
		$i=$this->input->post('iddanhmuctk');
		$this->load->model('User');
		$data=$this->User->ShowSachUser_model($i);
		$data = array('travetk' =>$data);
		
		
		$this->load->view('ShowTK_view', $data);
	}
	public function ShowPass_controller($id)
	{
		$this->load->model('User');
		$data=$this->User->ShowDocgiaedit_model($id);
		//echo "$data";
		$data = array('dulieutrave' =>$data);
		 //var_dump($data);
		
		$this->load->view('DoiPassUser_view', $data);
	}
	public function EditPassUser()
	{	$id = $this->input->post('id');
		$mkc=$this->input->post('mkc');
		$mkm=$this->input->post('mkm');
		$cf=$this->input->post('cf');
		if ($mkm!=$cf) {
			echo '<script>
				alert("Bạn vui lòng confirm lại mật khẩu mới");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}
		else
		{
			$this->load->model('User');
			$this->User->EditPassUser_model($id,$mkm);
		}
	}
	public function SearchUser()
	{
		$ten=$this->input->get('search');
		$this->load->model('User');
		$ketqua=$this->User->SearchUser_model($ten);
		//var_dump($ketqua);
		$data = array('data' =>$ketqua);
		$this->load->view('ShowSearchUser_view', $data);
	}
	public function user_chitietsach($id)
	{
		$this->load->model('Sach_model');
		$ketqua=$this->Sach_model->Showchitiet_Sach_model($id);
		$ketqua = array('mangketqua' =>$ketqua);
		// truyeenf ket qua vao view
		//var_dump($ketqua);
		$this->load->view('User_chitietsach_view', $ketqua);
	}
	public function loadthongbao()
	{
		$this->load->view('thongbao_view');
	}


}

/* End of file User_controller.php */
/* Location: ./application/controllers/User_controller.php */