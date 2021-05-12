<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nguoidung_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//load model 
		// $this->load->model('Sach_model');
		// //gọi hàm 
		// $dulieu=$this->Sach_model->showDataSach_model();
		// // chuyển biến thành mảng
		// $dulieuu = array('datacontroller' => $dulieu );

		// // truyền dữ liệu vào view
		
		// $this->load->view('Nguoidung_view', $dulieuu);
		$this->load->model('Sach_model');
		$data=$this->Sach_model->showDataSach_model();
		$data= array('datacontroller' => $data);
		// var_dump($data);
		$this->load->view('Nguoidung_view', $data);
	}
	public function addGiohang_controller($id)
	{
		// echo "$id";
		$this->load->model('Giohang_model');
		$ketqua=$this->Giohang_model->add($id);
		 $ketqua = array('mangketqua' => $ketqua );

	}

}

/* End of file Nguoidung_controller.php */
/* Location: ./application/controllers/Nguoidung_controller.php */
