<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();


	}
	public function checkExists($id)
	{
		// lấy hết dữ liệu
		$this->db->select('id,password,tennhanvien');
		$this->db->where('id',$id);
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$data = $this->db->get('nhan_vien');
		//đưa kết quả thành một mảng dữ liệu
		$data= $data->result_array();

		// return $data[0];

		if($data){
			return $data[0];
		}
		else{
			return null;
		}
	}
	public function showSach_model()
	{
	$this->db->select('tensach,hinhanh,id_sach');
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$data = $this->db->get('sach');
		//đưa kết quả thành một mảng dữ liệu
		$data= $data->result_array();
		

		// var_dump($data);
		return  $data;
	}
	public function getOne($val)
	{
		$this->db->select('tensach,hinhanh,id_sach');
		$this->db->where('id_sach', $val);
		// lấy dữ liệu từ bảng Sach và truyền vào biến data
		$data = $this->db->get('sach');
		//đưa kết quả thành một mảng dữ liệu
		$data = $data->result_array();
		

		// var_dump($data);
		return  $data;
	}
	public function insertMuon($str,$listData)
	{
		// $dulieu = array('id_sach' => $idsach ,'id_docgia'=>$iddocgia,'ngaymuon_muon'=>$date,'ngaytra_muon'=>$date,'tinhtrang_muon'=>$tinhtrang,'soluong_muon'=>$soluong );
		// var_dump($dulieu);
		// die();
		if($this->db->query($str)){
			echo '<script>
				alert("Mượn Thành công các id_sach ('.$listData.')");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}
		else{
			echo '<script>
				alert("Không Thành công ");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}
		// return $this->db->insert_id();	
	}
	public function getAllDatHang()
	{
		
		$data = $this->db->get('muon');
		//đưa kết quả thành một mảng dữ liệu
		$data = $data->result_array();
		

		// var_dump($data);
		return  $data;
	}
	public function thongbaoUser($id)
	{
		 $tt='1';
		
		 $this->db->from('muon');
		 $this->db->join('sach', 'muon.id_sach = sach.id_sach');
		 $this->db->where('id_docgia', $id);
		  $this->db->where('tinhtrang_muon', $tt);

		 $data=$this->db->get();
		 $data = $data->result_array();

		return  $data;
	}
	public function thongbaoKhong($id)
	{
		 $tt='2';
		
		 $this->db->from('muon');
		 $this->db->join('sach', 'muon.id_sach = sach.id_sach');
		 $this->db->where('id_docgia', $id);
		  $this->db->where('tinhtrang_muon', $tt);
		 $data=$this->db->get();
		 $data = $data->result_array();
		 // var_dump($data);
		 return  $data;

	}
	public function lichsuUser0($id)
	{
		 //$tt='0';
		
		 $this->db->from('muon');
		 $this->db->join('sach', 'muon.id_sach = sach.id_sach');
		 $this->db->where('id_docgia', $id);
		// $this->db->where('tinhtrang_muon', $tt);
		 $data=$this->db->get();
		 $data = $data->result_array();

		return  $data;
	}
	public function ShowSachUser_model($ten)
	{
		$this->db->select('*');
		 $this->db->from('danh_muc');
		 $this->db->join('sach', 'danh_muc.id_danhmuc = sach.id_danhmuc');
		 $this->db->where('ten_danhmuc', $ten);
		 // $this->db->where('tinhtrang_muon', $tt);
		 $data=$this->db->get();
		 $data = $data->result_array();

		return  $data;
	}
	public function ShowDocgiaedit_model($id)
	{
		 $this->db->select('*');
		
		 $this->db->where('id_docgia', $id);
		// $this->db->where('tinhtrang_muon', $tt);
		 $data=$this->db->get('doc_gia');

		 $data = $data->result_array();
		// var_dump($data);

		return  $data;
	}
	public function EditPassUser_model($id,$mkm)
	{


		$this ->db->set( 'pass' , $mkm ); 
		$this ->db->where( 'id_docgia' ,  $id ); 

		if($this ->db->update('doc_gia'))
		{

			echo '<script>
			alert("Sửa thành công ");
			setTimeout(function(){
				window.history.back();
				},500);
				</script>';
				//return ($this ->db->update('doc_gia');
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

	   public function SearchUser_model($i)
	   {
	   		$this->db->select('*');
   //	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc',);
		   	$this->db->from('sach');
		   	$this->db->join('danh_muc', 'sach.id_danhmuc = danh_muc.id_danhmuc');
		    $this->db->like('ten_danhmuc', $i,'title','both');
		    $this->db->or_like('tensach', $i,'title','both');
		   	$data=$this->db->get();
		   

		   $data = $data->result_array();
		   return $data;
	   }
	
	// public function showLichsuUser_model($id)
	// {
	// 		 $tt='1';
	// 	$this->db->select('*');
	// 	 $this->db->from('muon');
	// 	 $this->db->join('sach', 'muon.id_sach = sach.id_sach');
	// 	 $this->db->where('id_docgia', $id);
	// 	 $this->db->where('tinhtrang_muon', $tt);
	// 	 $data=$this->db->get();
	// 	 $data = $data->result_array();

	// 	return  $data;
	// }
	
}	

/* End of file Sach_model.php */
/* Location: ./application/models/Sach_model.php */