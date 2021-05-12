<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginUser extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}
	public function checkExists($id)
	{
		// lấy hết dữ liệu
		$this->db->select('id_docgia,pass,ten_docgia');
		$this->db->where('id_docgia',$id);
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$data = $this->db->get('doc_gia');
		//đưa kết quả thành một mảng dữ liệu
		$data= $data->result_array();
		if($data){
			return $data[0];
		}
		else{
			return null;
		}
	}
	
}

/* End of file Sach_model.php */
/* Location: ./application/models/Sach_model.php */