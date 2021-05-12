<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sach_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();


//--------------------XỬ LÝ CÁC CHỨC NĂNG QUẢN LÝ SÁCH--------------------------------------------------		
		
	}public function insert($tensach,$id_danhmuc,$sotrang,$tentg,$thoigian,$thoigianxb,$hinhanh)
	{
		$dulieu = array('tensach' => $tensach ,'id_danhmuc' => $id_danhmuc,'sotrang_sach'=>$sotrang,'tentacgia'=>$tentg,'thoigianduocmuon'=>$thoigian,'thoigianxuatban'=>$thoigianxb,'hinhanh'=>$hinhanh );
		$this->db->insert('sach', $dulieu);
		return $this->db->insert_id();
		
	}
	public function showDataSach_model()
	{
		// lấy hết dữ liệu
		$this->db->select('tensach,hinhanh,id_sach');
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$data = $this->db->get('sach');
		//đưa kết quả thành một mảng dữ liệu
		$data= $data->result_array();
		

		// var_dump($data);
		return  $data;
	}

	public function showDataSach_sach_model($id)
	{

		//echo "$id";
		// lấy hết dữ liệu
		$this->db->select('*');
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$this->db->where('id_danhmuc', $id);
		$data = $this->db->get('sach');
		//đưa kết quả thành một mảng dữ liệu
		$data= $data->result_array();
		return $data;
	}
	public function DeleteSach_model($id)
	{
		$this->db->where('id_sach', $id);
		if($this->db->delete('sach'))
		{
			echo '<script>
					alert("Xoá thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';

		}
		else
		{
			echo '<script>
					alert("Xoá thất bại ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
	}


	public function editSach_model($idsua)// Hàm lấy sách  cần update trả về view
	{
		$this->db->select('*');
		$this->db->where('id_sach', $idsua);
		$dulieu= $this->db->get('sach');
		$dulieu=$dulieu->result_array();
		return $dulieu ;
	}
	public function updateSach_model($id,$tensach,$iddanhmuc,$sotrang,$tentacgia,$thoigian,$xuatban,$hinhanh)// hàm update
	{

		



		$dulieu = array('tensach' => $tensach ,'id_danhmuc'=>$iddanhmuc,'sotrang_sach'=>$sotrang,'tentacgia'=>$tentacgia,'thoigianduocmuon'=>$thoigian,'thoigianxuatban'=>$xuatban,'hinhanh'=>$hinhanh);
		$this->db->where('id_sach', $id);
		 if($this->db->update('sach', $dulieu))
		
		{
			 echo '<script>
			 		alert("Thành công ");
			 		setTimeout(function(){
			 			window.history.back();
			 		},500);
			 	</script>';
				//return $this->db->update('sach', $dulieu);
		 }
		 else
		 {
		 	echo '<script>
		 			alert("Thất bại :(( ");
		 			setTimeout(function(){
		 				window.history.back();
		 			},500);
		 		</script>';
		 }
	}
	public function Showchitiet_Sach_model($id)
	{
			
		// lấy hết dữ liệu
		$this->db->select('*');
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$this->db->where('id_sach', $id);
		$data = $this->db->get('sach');
		//đưa kết quả thành một mảng dữ liệu
		$dataa = $data->result_array();
		return $dataa;
	}
	public function insertDocgia_model($iddocgia,$tendocgia,$donvi,$ngaylamthe)
	{
		$pass ='12345';
		$data = array('id_docgia' => $iddocgia,'pass'=>$pass,'ten_docgia'=> $tendocgia,'donvi_docgia'=>$donvi, 'ngaylamthe_docgia'=>$ngaylamthe);
		if($this->db->insert('doc_gia', $data))
		{
			echo '<script>
					alert("Thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
		else
		{
			echo '<script>
					alert("Không thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
		return $this->db->insert_id();
	}


//------------XỬ LÝ CÁC CHỨC NĂNG QUẢN LÝ ĐỘC GIẢ ---------------------------------------
	
	public function showDocgia_model()
	{
		$this->db->select('*');
		$data=$this->db->get('doc_gia');
		$dataa = $data->result_array();

		return $dataa;
	}
	public function deleteDocgia_model($iddocgia)
	{
		
		$this->db->where('id_docgia',$iddocgia);
		if($this->db->delete('doc_gia'))
		{
			echo '<script>
					alert("Xoá thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
		else
		{
			echo '<script>
					alert("Xoá thất bại ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
	}
	public function showDocgia_edit_model($id)
	{
		$this->db->select('*');
		$this->db->where('id_docgia', $id);
		$data=$this->db->get('doc_gia');
		$dataa = $data->result_array();
		return $dataa;
	}
	public function editDocgia_model($id,$ten,$donvi,$ngaylamthe)
	{
		$data = array('ten_docgia'=>$ten,'donvi_docgia'=>$donvi,'ngaylamthe_docgia'=>$ngaylamthe);
		$this->db->where('id_docgia', $id);
	   if($this->db->update('doc_gia', $data))
	   {

	   	echo '<script>
					alert("Sửa thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
				
	   }
	   else
	   {
	   	echo '<script>
					alert("Không thành công ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
	   }
	}


//---------------------------- XỬ LÝ CHỨC NĂNG TÌM KIẾM------------------------------------------- 
   public function search_model($i)
   {
   	$this->db->select('*');
   //	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc',);
   	$this->db->from('sach');
   	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc');
    $this->db->like('ten_danhmuc', $i,'title','both');
    $this->db->or_like('tensach', $i,'title', 'both');
   	$data=$this->db->get();
   

   $data = $data->result_array();
   return $data;

   }
   public function searchSach_model($i)
   {
   	$this->db->select('*');
   //	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc',);
   	$this->db->from('sach');
   	//$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc');
    //$this->db->like('ten_danhmuc', $i, 'after');
    $this->db->or_like('tensach', $i,'title','both');
   	$data=$this->db->get();
   

   $data = $data->result_array();
   return $data;
   }
   public function searchDocgia_model($id)
   {
   	$this->db->select('*');
   //	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc',);
   	$this->db->from('doc_gia');
   	//$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc');
    //$this->db->like('ten_danhmuc', $i, 'after');
    $this->db->or_like('ten_docgia', $id,'title','both');
   	$data=$this->db->get();
   

   $data = $data->result_array();
   return $data;
   }
   public function searchCho_model($id)
   {
   	$i='0';
  	$this->db->select('*');
  
   	$this->db->from('muon');
   	$this->db->where('tinhtrang_muon', $i);
   	$this->db->like('id_docgia', $id,'title','both');
    $this->db->or_like('id_sach', $id,'title','both');
   	$data=$this->db->get();
   	  $data = $data->result_array();
   	 // var_dump($data);
   return $data;
   }


   //--------------------------- XỬ LÝ CHỜ SHOW DANH SÁCH CHỜ DUYỆT ----------------------------
   public function showDachsachcho_model()
   {
   		$value='0';

   		$this->db->select('*');
   		$this->db->from('muon');
   		$this->db->join('sach', 'muon.id_sach = sach.id_sach');
   		$this->db->where('tinhtrang_muon', $value);
   		// $data = $this->db->get('muon');
   		$data=$this->db->get();

   		$data = $data->result_array();
   		//var_dump($data);	
		return $data;




		 // 	$this->db->select('*');
   // //	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc',);
   // 	$this->db->from('sach');
   // 	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc');
   //  $this->db->like('ten_danhmuc', $i, 'after');
   //  $this->db->or_like('tensach', $i, 'after');
   // 	$data=$this->db->get();
   

   // $data = $data->result_array();
   // return $data;

   }
   public function chapnhan($id)
   {
   		// extract($data);
   	$tt='1';
    $this->db->where('id_muon', $id );
    $this->db->update('muon', array('tinhtrang_muon' => $tt));
    return true;
   }
   public function khongchapnhan($id)
   {
   	 	
    	$tt='2';
    $this->db->where('id_muon', $id );
    $this->db->update('muon', array('tinhtrang_muon' => $tt));
    return true;
   }
    

   
}

/* End of file Sach_model.php */
/* Location: ./application/models/Sach_model.php */