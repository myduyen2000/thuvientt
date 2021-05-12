<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Sach_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
	// 	$this->load->view('Thu_Thu');
		
	// }
	public function sach()
	{
		
		$idd= $this->input->post('iddanhmucs');
		//echo "$idd";
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_sach_model($idd);
		// chuyển biến thành mảng
		$dulieu = array('data_sach' => $dulieu );

		// truyền dữ liệu vào view
	
		 $this->load->view('admin_sach_view',$dulieu);
	}
	public function giaotrinh()
	{
		$idd= $this->input->post('iddanhmucgt');
		//echo "$idd";
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_sach_model($idd);
		// chuyển biến thành mảng
		$dulieu = array('data_sach' => $dulieu );

		// truyền dữ liệu vào view
	
		$this->load->view('admin_sach_view',$dulieu);
	}
	public function tapchi()
	{
		$idd= $this->input->post('iddanhmuctc');
		//echo "$idd";
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_sach_model($idd);
		// chuyển biến thành mảng
		$dulieu = array('data_sach' => $dulieu );

		// truyền dữ liệu vào view
	
		 $this->load->view('admin_sach_view',$dulieu);
	}
	public function truyenkich()
	{
		$idd= $this->input->post('iddanhmuctk');
		//echo "$idd";
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_sach_model($idd);
		// chuyển biến thành mảng
		$dulieu = array('data_sach' => $dulieu );

		// truyền dữ liệu vào view
	
		 $this->load->view('admin_sach_view',$dulieu);
	}



	public function showSachEdit_controller($idedit)
	{
		$this->load->model('Sach_model');
		$ketqua=$this->Sach_model->editSach_model($idedit);
		$ketqua = array('mangketqua' =>$ketqua);
		// truyeenf ket qua vao view
		$this->load->view('EditSach', $ketqua);

	}
	public function editSach_controller()
	{
		$target_dir = "File_upload/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anh"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		

		// Check file size
		if ($_FILES["anh"]["size"] > 5000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["anh"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		$idsach=$this->input->post('idsach');
		$tens= $this->input->post('tensach');
		$idd= $this->input->post('iddanhmuc');
		$sotrang = $this->input->post('sotrang');
		$tentg = $this->input->post('tentacgia');
		$thoigian= $this->input->post('thoigianduocmuon');
		$thoigianxb=$this->input->post('thoigianxuatban');
		$hinhanh= base_url()."File_upload/".basename($_FILES["anh"]["name"]);
		//echo "$hinhanh";
		 if($idsach==null or $tens==null or $idd==null or $sotrang==null or $tentg==null or $thoigian==null or $thoigianxb==null or $hinhanh==null )
		 {
		 	echo '<script>
		 			alert("Vui lòng điền đầy đủ thông tin ");
		 			setTimeout(function(){
		 				window.history.back();
		 			},500);
		 		</script>';
		 }
		 //echo  base_url()."File_upload/".basename($_FILES["anh"]["name"]);
		 else
		 {
		 $this->load->model('Sach_model');
		 $this->Sach_model->updateSach_model($idsach,$tens,$idd,$sotrang,$tentg,$thoigian,$thoigianxb,$hinhanh);
		 //redirect('showSearchSach_view');
		 }
	}
	public function deleteSach_controller($iddd)
	{
		
		//echo $iddd;

		$this->load->model('Sach_model');
		$this->Sach_model->DeleteSach_model($iddd);
		// $this->load->view('');


	}
	public function chitietSach_controller($id)
	{
		$this->load->model('Sach_model');
		$ketqua=$this->Sach_model->Showchitiet_Sach_model($id);
		$ketqua = array('mangketqua' =>$ketqua);
		// truyeenf ket qua vao view
		//var_dump($ketqua);
		$this->load->view('ChitietSach_view', $ketqua);
	}
	


	public function loadLichsuUser($value='')
	{
		$this->load->view('lichsuUser_view');
	}
	public function logout($value='')
	{
		$this->load->view('login_view');
	}
	public function test()
	{
		$i=$this->input->post('sach');
		echo "$i";
	}
	

}

/* End of file admin_Sach_controller.php */
/* Location: ./application/controllers/admin_Sach_controller.php */