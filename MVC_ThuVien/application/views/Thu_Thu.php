


  <?php 
          $CI = & get_instance();
          $CI->load->library('session');  //change from $this->load->library('session');
          // print_r($CI->session->userdata('user'));
          if(!$CI->session->userdata('user'))
          {
            header('Location:http://localhost/MVC_ThuVien/index.php/LoginController');
          }
          else{
              $userInfor = $CI->session->userdata('user');}
              
               // $userInfor);

        ?>




<!DOCTYPE html>
<html>
<title>ADMIN </title>
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
    <form action="<?php echo base_url(); ?>index.php/ShowDataSach_controller/search_controller" method="get"enctype="multipart/form-data">
    <div class="input-group">
      
      <input type="search"name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
      aria-describedby="search-addon" />
      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
    </div>
     </form>

    <a href="<?php echo base_url(); ?>index.php/ShowDataSach_controller" class="w3-bar-item w3-button"style="color: white;margin-bottom: 10px;background-color: #2162f3f5!important;margin-top: 60px;"><span class="fa fa-home"></span>  Trang ch???</a>
    <!-- <a href="#" class="w3-bar-item w3-button">Dresses</	a> -->

    	<div class="danhmuc"style="background-color: #2162f3f5!important;">
        <a onclick="myAccFunc()" href="javascript:void(0)"style="color:white;margin-bottom: 10px;" class="w3-button w3-block w3-white w3-left-align" id="myBtn">  <!-- <span class="fa fa-list"> -->  Qu???n l?? danh m???c <i class="fa fa-caret-down"></i>

        </a>
        <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium"style="background-color: white;">

         <form action="<?php echo base_url(); ?>index.php/Admin_Sach_controller/sach" id="books-info" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <input type="submit" name="iddanhmucs" id="iddanhmucc" type="text"class="btn btn-primary btn-sm" value='DM001' >
          </div>
        </form> 

        <form action="<?php echo base_url(); ?>index.php/Admin_Sach_controller/giaotrinh" id="books-info" method="post" enctype="multipart/form-data">
         <div class="input-group mb-3">
          <input type="submit" name="iddanhmucgt" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='DM002' >
        </div>
      </form> 

      <form action="<?php echo base_url(); ?>index.php/Admin_Sach_controller/tapchi" id="books-info" method="post" enctype="multipart/form-data">
       <div class="input-group mb-3">
        <input type="submit" name="iddanhmuctc" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='DM003' >
      </div>
    </form> 

    <form action="<?php echo base_url(); ?>index.php/Admin_Sach_controller/truyenkich" id="books-info" method="post" enctype="multipart/form-data">
     <div class="input-group mb-3">
      <input type="submit" name="iddanhmuctk" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='DM004' >
    </div>
  </form> 

</div>
</div>
<a href="<?php echo base_url(); ?>index.php/Docgia_controller/showDocgia_controller" class="w3-bar-item w3-button"style="color:white;background-color:#2162f3f5!important;margin-bottom: 10px;"> <!-- <span class="fa fa-bell">  --> Qu???n l?? ?????c gi???</a>
  <a href="<?php echo base_url(); ?>index.php/ShowDataSach_controller/showDanhsachcho" class="w3-bar-item w3-button"style="color:white ;background-color: #2162f3f5!important"> <!-- <img src="./img/icon.png"style="height: 20px;width: 20px"> --> Danh s??ch ch??? m?????n </a>

</div>
<div style=" width: 220px;
height: 120px;">
<a href="<?php echo base_url(); ?>index.php/Firt_controller/" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px">Th??m s??ch</a> 

<a href="<?php echo base_url(); ?>index.php/Docgia_controller/" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px;padding-top: 0px;">Th??m ?????c gi???  </a>
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
        <p class="w3-left"style="color: white;line-height: 10vh;padding-left: 10px">TH?? VI???N ONLINE </p>
       <?php 
          $CI = & get_instance();
          $CI->load->library('session');  //change from $this->load->library('session');
          // print_r($CI->session->userdata('user'));
          if($CI->session->userdata('user')){
              $userInfor = $CI->session->userdata('user');
              
               // $userInfor);

        ?>
        


            <span style="color: white;line-height: 10vh;text-align: center;margin-left: 550px">Nh??n Vi??n: <?php echo $userInfor['tennhanvien']; ?></span>
             <a href="<?php echo base_url(); ?>index.php/LoginController/logout" style = "float: right;font-size: 16px;color: white;text-decoration: none;line-height: 10vh; padding-right: 10px">Logout </a>
          <?php 
              
          }
          else{

            ?>
             <a href="<?php echo base_url(); ?>index.php/LoginController" style = "float: right;font-size: 16px;color: white;text-decoration: none;line-height: 10vh; padding-right: 10px">Login </a>
            <?php
          }
          
       ?>
       

    </div>
    <!-- Image header -->
    <div class="w3-display-container w3-container">
      <img src="https://scontent.xx.fbcdn.net/v/t1.15752-0/s600x600/181042042_1304505549944329_1007169513424385560_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=58c789&_nc_ohc=arVcvwFh5RsAX-1-mtH&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&tp=7&oh=57e911310f892e2c20c26d1aefccd041&oe=60B602EA" alt="???nh" style="width:100%;height: 500px">
      <div class="w3-display-topleft w3-text-white" style="padding:24px 48px;">

      </div>
    </div>

  </header>

 <div class="container" style="max-width: 100%">
        <div class="row text-center">
           <form action="ShowDataSach_controller/"></form>
           <?php foreach ($datacontroller as $key => $value): ?>
            <?php if ($key==8 ):break; ?>
            <?php endif ?>
            

            <div class="col-3 text-center" style="margin-bottom: 5vh">
                <div class="w3-display-container">
                  <a href="<?php echo base_url(); ?>index.php/Admin_Sach_controller/chitietSach_controller/<?php echo $value['id_sach'] ?>">
                    <img src="<?php echo $value['hinhanh'] ?>" style="width: 50%;height: auto">
                  </a>
                  <p style="margin-bottom: 0"><?php echo $value['tensach'] ?></p>
                  <a href="<?php echo base_url(); ?>index.php/Admin_Sach_controller/deleteSach_controller/<?php echo $value['id_sach'] ?>">Xo??</a>   
                  <a href="<?php echo base_url(); ?>index.php/Admin_Sach_controller/showSachEdit_controller/<?php echo $value['id_sach'] ?>">S???a</a>
                </div>
            </div>
            
          <?php endforeach ?> 
        </div>

      </div>

    



   <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer"style ="width: 100%;padding-right: 90px;padding-top: 50px;height: ;">
        <div class="w3-row-padding">


          <div class="w3-col s4">
            <h4>About</h4>
            <p><a href="#">V??? ch??ng t??i</a></p>
            <p><a href="#">E-learning</a></p>
            <p><a href="#">H??? tr???</a></p>
            <p><a href="#">T?? v???n tuy???n sinh</a></p>
            <p><a href="#">??i???u h??nh t??c nghi???p</a></p>

          </div>

          <div class="w3-col s4 w3-justify"style = "margin-left: 200px">
            <h4>?????i ng?? k?? thu???t</h4>
            <p><i class="fa fa-fw fa-map-marker"></i> Team44K212.06</p>
            <p><i class="fa fa-fw fa-phone"></i> 0333707059</p>
            <p style = "margin-bottom: 0px"><i class="fa fa-fw fa-envelope"></i> doducanh2904@mail.com</p>
            <p><a style="text-decoration: none" href="https://www.facebook.com/profile.php?id=100043023576264"style = "height: 36px;width: 200px;margin-top: 12px;"><img src="./img/iconfb.png"style = "height: 17px;width: 14px;"> facebook</a></p>

          </div>
        </div>
      </footer>

  <div class="w3-black w3-center w3-padding-24"style="background-color: #2162f3f5!important;">B???n quy???n thu???c <a href="http://due.udn.vn/" title="W3.CSS" target="_blank" class="w3-hover-opacity">due.udn.vn</a></div>

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
