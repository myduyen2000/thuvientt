<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docgia_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	 public function index()
	 {
		$this->load->view('them_docgia_view');	
	 }
	public function insert_docgia_controller()
	{
		$iddocgia = $this->input->post('iddocgia');
		$tendocgia = $this->input->post('tendocgia');
		$donvi = $this->input->post('donvi');
		$ngaylamthe = $this->input->post('ngaylamthe');
		if($donvi==null or $iddocgia==null or $ngaylamthe ==null or $tendocgia==null )
		{
			echo '<script>
					alert("Bạn vui lòng nhập đầy đủ thông tin ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
		else
		{
			$this->load->model('Sach_model');
			$this->Sach_model->insertDocgia_model($iddocgia,$tendocgia,$donvi,$ngaylamthe);

		}
		
	
		

	}
	public function showDocgia_controller()
	{
		$this->load->model('Sach_model');
		$data=$this->Sach_model->showDocgia_model();
		$data = array('docgia' => $data);
		
		$this->load->view('showDocgia_view', $data);
		//var_dump($data);
	}
	public function deleteDocgia_controller($iddocgia)
	{
		
		$this->load->model('Sach_model');
		$this->Sach_model->deleteDocgia_model($iddocgia);
	}
	public function showDocgia_edit_controller($id)
	{
		$this->load->model('Sach_model');
		$data=$this->Sach_model->showDocgia_edit_model($id);
		
		$data = array('showData_edit' => $data);

		$this->load->view('EditDocgia_view', $data);

	}
	public function editDocgia_controller()
	{
		$id=$this->input->post('iddocgia');
		$ten=$this->input->post('tendocgia');
		$donvi=$this->input->post('donvi');
		$ngaylamthe=$this->input->post('ngaylamthe');
		if($id==null or $ten == null or $donvi==null or $ngaylamthe == null)
		{
			echo '<script>
					alert("Vui lòng điền đầy đủ thông tin ");
					setTimeout(function(){
						window.history.back();
					},500);
				</script>';
		}
		else
		{
			$this->load->model('Sach_model');
			$this->Sach_model->editDocgia_model($id,$ten,$donvi,$ngaylamthe);
		}
		
	}

}

/* End of file Docgia_controller.php */
/* Location: ./application/controllers/Docgia_controller.php */