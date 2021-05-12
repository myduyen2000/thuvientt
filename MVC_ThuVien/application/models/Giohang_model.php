<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giohang_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function add($id)

	{
		// echo "$id";
		$this->db->select('*');
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$this->db->where('id_sach', $id);
		$data = $this->db->get('sach');
		// var_dump($data);
		
		$data = $data->result_array();
		// return $data;
		var_dump($data);
		$dulieu = array('tensach' ,'id_danhmuc' ,'sotrang_sach','tentacgia','thoigianduocmuon','thoigianxuatban','hinhanh');
		$this->db->insert('gio_hang', $data);
		return $this->db->insert_id();
		
	}


}

/* End of file Giohang_model.php */
/* Location: ./application/models/Giohang_model.php */