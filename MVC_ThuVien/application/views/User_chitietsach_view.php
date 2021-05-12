<?php 
    require('application/models/Cart.php');

    $CI = & get_instance();
    $CI->load->library('session'); 
    if(!$CI->session->userdata('docgia')){
      header('Location:<?php echo base_url(); ?>index.php/LoginUser_controller');
      exit();
     }

 ?>
<!DOCTYPE html>
<html>
<title>Chi tiết sách </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="./css.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>
  .w3-sidebar a {font-family: "Roboto", sans-serif}
  body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px;">

 
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;padding-top: 1px;background-color: white!important;font-family:Times New Roman" id="mySidebar">
   <div class="w3-container w3-display-container w3-padding-16"style="padding-left:0px;">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" style=" margin-top: 0px";><a href="http://due.udn.vn/"><img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/56815997_549747822214529_236112691771473920_n.png?_nc_cat=108&ccb=1-3&_nc_sid=58c789&_nc_ohc=somwRtseBRMAX8-eRQR&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=86821a26efe888a45a0bf5a31ccdcc1b&oe=60B6FEBA"style ="width: 220px;height: 70px;padding-left: 0px"></a><b></b></h3>
  </div>
  <div class="input-group">

  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold;padding-bottom: 30px;">
     <form action="<?php echo base_url(); ?>index.php/User_controller/SearchUser" method="get"enctype="multipart/form-data">
    <div class="input-group">
      
      <input type="search"name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
      aria-describedby="search-addon" />
      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
    </div>
     </form>

    <a href="<?php echo base_url(); ?>index.php/User_controller" class="w3-bar-item w3-button"style="color: white;margin-bottom: 10px;background-color: #2162f3f5!important;margin-top: 60px;"><span class="fa fa-home"></span>  Trang chủ</a>
    <!-- <a href="#" class="w3-bar-item w3-button">Dresses</  a> -->

      <div class="danhmuc"style="background-color: #2162f3f5!important;">
        <a onclick="myAccFunc()" href="javascript:void(0)"style="color:white;margin-bottom: 10px;" class="w3-button w3-block w3-white w3-left-align" id="myBtn">  <!-- <span class="fa fa-list"> -->  Danh mục <i class="fa fa-caret-down"></i>

        </a>
        <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium"style="background-color: white;">

         
          <form action="<?php echo base_url(); ?>index.php/User_controller/ShowSachUser_controller/" id="books-info" method="post" enctype="multipart/form-data">
         <div class="input-group mb-3">
          <input type="submit" name="iddanhmucs" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='Sách' >
        </div>
      </form> 

        <form action="<?php echo base_url(); ?>index.php/User_controller/ShowGTUser_controller/" id="books-info" method="post" enctype="multipart/form-data">
         <div class="input-group mb-3">
          <input type="submit" name="iddanhmucgt" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='Giáo trình' >
        </div>
      </form> 

      <form action="<?php echo base_url(); ?>index.php/User_controller/ShowTCUser_controller/" id="books-info" method="post" enctype="multipart/form-data">
       <div class="input-group mb-3">
        <input type="submit" name="iddanhmuctc" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='Tạp chí' >
      </div>
    </form> 

    <form action="<?php echo base_url(); ?>index.php/User_controller/ShowTKUser_controller/" id="books-info" method="post" enctype="multipart/form-data">
     <div class="input-group mb-3">
      <input type="submit" name="iddanhmuctk" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='Truyện, kịch' >
    </div>
    
  </form> 

</div>
</div>
<a href="<?php echo base_url(); ?>index.php/User_controller/loadthongbao" class="w3-bar-item w3-button"style="color:white;background-color:#2162f3f5!important;margin-bottom: 10px;">Thông báo</a>
  <!-- <a href="#" class="w3-bar-item w3-button"style="color:white ;background-color: #2162f3f5!important"> Hướng dẫn </a> -->

</div>

 <div style=" width: 220px;
    height: 120px;">
  <a href="<?php echo base_url(); ?>index.php/User_controller/cart" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px">cart</a> 

   <a href="<?php echo base_url(); ?>index.php/Lichsu_controller/showLichsuUser0/<?php echo $userInfor['id_docgia']; ?>" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px;padding-top: 0px;">lich su dat sach </a>
   <a href="<?php echo base_url(); ?>index.php/User_controller/thongbaoUser/<?php echo $userInfor['id_docgia']; ?>" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px">Thông báo từ admin</a> 
   </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
	<div class="abc"style="width: 100%;margin-bottom: 20px;">

    <div class="w3-bar-item w3-padding-24 w3-wide"style="font-size: 7px;color: #00bcd4!important;line-height: -3px;background-color: white;;"><a href="http://due.udn.vn/"></a><img src="../../img/LOGO3.png"style="height: 30px;padding-top: 0px"></div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  </div>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header style="width: 100%;overflow-y: hidden; color: black; margin-bottom: 3vh">
    <div style="height: 10vh;background-color: #2162f3f5!important;">
        <p class="w3-left"style="color: white;line-height: 10vh;padding-left: 10px">THƯ VIỆN ONLINE </p>
       
           
        
       

    </div>
    <!-- Image header -->
   <!--  <div class="w3-display-container w3-container">
      <img src="http://due.udn.vn/Portals/0/Banner Truong/tvts_2021.jpg" alt="Jeans" style="width:100%;height: 500px">
      <div class="w3-display-topleft w3-text-white" style="padding:24px 48px;">

      </div>
    </div> -->

  </header>
  


   <?php foreach ($mangketqua as $key => $value): ?>
      
    
    <div >
      <p>ID Sách : <?php echo $value['id_sach'] ?></p>
      <p>Tên Sách : <?php echo $value['tensach'] ?></p>
      <p>ID Danh mục : <?php echo $value['id_danhmuc'] ?></p>
      <p>Số trang  : <?php echo $value['sotrang_sach'] ?></p>
      <p>Tên tác giả : <?php echo $value['tentacgia'] ?></p>
      <p>Thời gian được mượn : <?php echo $value['thoigianduocmuon'] ?> ngày</p>
      <p>Thời gian xuất bản : <?php echo $value['thoigianxuatban'] ?></p>
       <img src="<?php echo $value['hinhanh'] ?>" alt="hình ảnh sách"style='height: 143px;width: 93px'>
    </div>
    <?php endforeach ?>












   <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer"style ="width: 100%;padding-right: 90px;padding-top: 50px;height: ;">
        <div class="w3-row-padding">


          <div class="w3-col s4">
            <h4>About</h4>
            <p><a href="#">Về chúng tôi</a></p>
            <p><a href="#">E-learning</a></p>
            <p><a href="#">Hỗ trợ</a></p>
            <p><a href="#">Tư vấn tuyển sinh</a></p>
            <p><a href="#">Điều hành tác nghiệp</a></p>

          </div>

          <div class="w3-col s4 w3-justify"style = "margin-left: 200px">
            <h4>Đội ngũ kĩ thuật</h4>
            <p><i class="fa fa-fw fa-map-marker"></i> Team44K212.06</p>
            <p><i class="fa fa-fw fa-phone"></i> 0333707059</p>
            <p style = "margin-bottom: 0px"><i class="fa fa-fw fa-envelope"></i> doducanh2904@mail.com</p>
            <p><a style="text-decoration: none" href="https://www.facebook.com/profile.php?id=100043023576264"style = "height: 36px;width: 200px;margin-top: 12px;"><img src="./img/iconfb.png"style = "height: 17px;width: 14px;"> facebook</a></p>

          </div>
        </div>
      </footer>

  <div class="w3-black w3-center w3-padding-24"style="background-color: #2162f3f5!important;">Bản quyền thuộc <a href="http://due.udn.vn/" title="W3.CSS" target="_blank" class="w3-hover-opacity">due.udn.vn</a></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
// document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
