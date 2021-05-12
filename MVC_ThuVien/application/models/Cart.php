<?php 
	

	class Cart {
		public $id_sach;
		public $ten_sach;
		public $hinh_anh;
		public $infor;


		function __construct($id_sach,$ten_sach,$hinh_anh,$infor)
		{
			$this->id_sach = $id_sach;
			$this->ten_sach = $ten_sach;
			$this->hinh_anh = $hinh_anh;
			$this->infor = $infor;

		}
		public function getIdSach()
		{
			return $this->id_sach;
		}
		public function getTenSach()
		{
			return $this->ten_sach;
		}
		public function getInfor()
		{
			return $this->infor;
		}
		public function getHinhAnh()
		{
			return $this->hinh_anh;
		}


		public function toString()
		{
		    return 'id_sach='.$this->id_sach.',ten_sach='.$this->ten_sach.',hinh_anh='.$this->hinh_anh.',infor='.$this->infor;
		}
	}



 ?>