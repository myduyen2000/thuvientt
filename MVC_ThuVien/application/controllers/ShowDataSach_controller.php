<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowDataSach_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_model();
		// chuyển biến thành mảng
		$dulieuu = array('datacontroller' => $dulieu );

		// truyền dữ liệu vào view
		
		$this->load->view('Thu_Thu', $dulieuu);



	}

	public function deleteSach_controller($iddd)
	{
		
		//echo $iddd;

		$this->load->model('Sach_model');
		$this->Sach_model->DeleteSach_model($iddd);
		// $this->load->view('');


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
		// if (file_exists($target_file)) {
		//   echo "file đã tồn tại";
		//   $uploadOk = 0;
		// }

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
		//echo  base_url()."File_upload/".basename($_FILES["anh"]["name"]);
		$this->load->model('Sach_model');
		$this->Sach_model->updateSach_model($idsach,$tens,$idd,$sotrang,$tentg,$thoigian,$thoigianxb,$hinhanh	);
	}
	public function sach()
	{
		
		$idd= $this->input->post('iddanhmuc');
		//echo "$idd";
		//load model 
		$this->load->model('Sach_model');
		//gọi hàm 
		$dulieu=$this->Sach_model->showDataSach_sach_model($idd);
		// chuyển biến thành mảng
		$dulieu = array('data_sach' => $dulieu );

		// truyền dữ liệu vào view
	
		 $this->load->view('admin_Sach_view',$dulieu);
	}
	public function showSachEditt_controller($idedit)
	{
		$this->load->model('Sach_model');
		$ketqua=$this->Sach_model->editSach_model($idedit);
		$ketqua = array('mangketqua' =>$ketqua);
		// truyeenf ket qua vao view
		$this->load->view('EditSach', $ketqua);

	}
	public function editSachhs_controller()
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
		if (file_exists($target_file)) {
		  echo "file đã tồn tại";
		  $uploadOk = 0;
		}

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
		//echo  base_url()."File_upload/".basename($_FILES["anh"]["name"]);
		$this->load->model('Sach_model');
		$this->Sach_model->updateSach_model($idsach,$tens,$idd,$sotrang,$tentg,$thoigian,$thoigianxb,$hinhanh	);
	}
	//CHỨC NĂNG TÌM KIẾM Ở TRANG CỦA THỦ THƯ 
	public function search_controller()
	{	
		$ten=$this->input->get('search');
		$this->load->model('Sach_model');
		$ketqua=$this->Sach_model->search_model($ten);
		//var_dump($ketqua);
		$data = array('data' =>$ketqua);
		$this->load->view('showSearch_view', $data);
		//var_dump($data);

	}
	public function searchSach_controller()
	{
		$ten=$this->input->get('search');
		//echo "$ten";
		 $this->load->model('Sach_model');
		 $ketqua=$this->Sach_model->searchSach_model($ten);
		//var_dump($ketqua);
		 $data = array('data' =>$ketqua);
		 $this->load->view('showSearchSach_view', $data);
	}
	public function searchDocgia_controller()
	{
		$ten=$this->input->get('search');
		//echo "$ten";
		 $this->load->model('Sach_model');
		 $ketqua=$this->Sach_model->searchDocgia_model($ten);
		//var_dump($ketqua);
		 $data = array('data' =>$ketqua);
		 $this->load->view('showSearchDocgia_view', $data);
	}






	public function searchCho()
	{
			//$ten=$this->input->_POST('search');
			$ten=$this->input->post('search');
		//echo "$ten";
		 $this->load->model('Sach_model');
		 $ketqua=$this->Sach_model->searchCho_model($ten);
		//var_dump($ketqua);
		 $data = array('data' =>$ketqua);
		 $this->load->view('showSearchCho_view', $data);
	}







	public function showDanhsachcho()
	{
		//$ten=$this->input->get('search');
		 $this->load->model('Sach_model');
		$data = $this->Sach_model->showDachsachcho_model();
		$data = array('datacontroller' => $data );
		//var_dump($data);
		$this->load->view('danhsachcho_view',$data);
	}
	public function chapnhan($idmuon)
	{
		
		 $this->load->model('Sach_model');
		if($this->Sach_model->chapnhan($idmuon)){
			echo '<script>
				alert("Thành công ");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		}
		
		//$this->load->view('danhsachcho_view');
		
	}
	public function khongchapnhan($idmuon)
	{
		 $this->load->model('Sach_model');
		 if($this->Sach_model->khongchapnhan($idmuon))
		 {
		 	echo '<script>
				alert("Xoá yêu cầu thành công ");
				setTimeout(function(){
					window.history.back();
				},500);
			</script>';
		 }




				
	}


}

/* End of file ShowDataSach_controller.php */
/* Location: ./application/controllers/ShowDataSach_controller.php */