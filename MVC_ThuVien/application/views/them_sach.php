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
   <title> Thêm Sách </title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
     <div class="input-group">
       <form action="<?php echo base_url(); ?>index.php/ShowDataSach_controller/search_controller" method="get"enctype="multipart/form-data">
    <div class="input-group">
      
      <input type="search"name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
      aria-describedby="search-addon" />
      <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
    </div>
     </form>

    </div>


    <a href="<?php echo base_url(); ?>index.php/ShowDataSach_controller/" class="w3-bar-item w3-button"style="color: white;margin-bottom: 10px;background-color: #2162f3f5!important;margin-top: 60px;"><span class="fa fa-home"></span>  Trang chủ</a>
    <!-- <a href="#" class="w3-bar-item w3-button">Dresses</  a> -->
    
  <!--     <div class="danhmuc"style="background-color: #2162f3f5!important;">
    <a onclick="myAccFunc()" href="javascript:void(0)"style="color:white;margin-bottom: 10px;" class="w3-button w3-block w3-white w3-left-align" id="myBtn">  <!<span class="fa fa-list"> -->  <!-- Quản lý danh mục <i class="fa fa-caret-down"></i> -->
     
    <!-- </a> -->
      <!-- <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium"style="background-color: white;"> --> 

         <!--   <form action="../admin_Sach_controller/sach" id="books-info" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <input type="submit" name="iddanhmuc" id="iddanhmuc" type="text"class="btn btn-primary btn-sm" value='DM001' >
            </div>
           </form>  -->

       <!--     <form action="../admin_Sach_controller/giaotrinh" id="books-info" method="post" enctype="multipart/form-data">
             <div class="input-group mb-3">
              <input type="submit" name="iddanhmucgt" id="iddanhmucc" type="text"class="btn btn-primary btn-sm" value='DM002' >
            </div>
           </form> 

          <form action="../admin_Sach_controller/tapchi" id="books-info" method="post" enctype="multipart/form-data">
             <div class="input-group mb-3">
              <input type="submit" name="iddanhmuctc" id="iddanhmucc" type="text"class="btn btn-primary btn-sm" value='DM003' >
            </div>
          </form> 

            <form action="../admin_Sach_controller/truyenkich" id="books-info" method="post" enctype="multipart/form-data">
             <div class="input-group mb-3">
              <input type="submit" name="iddanhmuctk" id="iddanhmucc" type="text"class="btn btn-primary btn-sm" value='DM004' >
            </div>
           </form> --> 
       
      <!-- </div> -->
    <!-- </div> -->
    <a href="<?php echo base_url(); ?>index.php/Docgia_controller/showDocgia_controller" class="w3-bar-item w3-button"style="color:white;background-color:#2162f3f5!important;margin-bottom: 10px;"> <!-- <span class="fa fa-bell">  --> Quản lý độc giả</a>
    <a href="<?php echo base_url(); ?>index.php/ShowDataSach_controller/showDanhsachcho" class="w3-bar-item w3-button"style="color:white ;background-color: #2162f3f5!important"> <!-- <img src="./img/icon.png"style="height: 20px;width: 20px"> --> Danh sách chờ mượn </a>

  </div>
  <div style=" width: 220px;
    height: 120px;">
  <a href="<?php echo base_url(); ?>index.php/Firt_controller/" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px">Thêm sách</a> 

   <a href="<?php echo base_url(); ?>index.php/Docgia_controller/" class="w3-bar-item w3-button w3-padding"style="color: #2162f3f5!important;font-size: 18px;padding-top: 0px;">Thêm độc giả  </a>
   </div>

</nav>
      </header>
      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
      <!-- !PAGE CONTENT! -->
      <div class="w3-main" style="margin-left:250px">
      <!-- Push down content on small screens -->
      <div class="w3-hide-large" style="margin-top:83px"></div>
      <!-- Top header -->
      <header class="w3-container w3-xlarge"style="color: black;background-color: #2162f3f5!important;margin-bottom:30px;margin-top: 20px;height: 50px;">
         <div class="gg">
            <p class="w3-left"style="background-color: #2162f3f5!important;color: white;margin-top: 10px ">
               THƯ VIỆN ONLINE <!-- <img src="..\webbb\img\THUVIENONLINE.png"> -->
            </p>
            <!-- <p class="w3-right">
               <i class="fa fa-shopping-cart w3-margin-right"style="background-color: #00000003!important;"></i>
               <a class="fa fa-search">logi</a>
               </p> -->
           
         </div>

         <div class="a"style="height: 414px;width: 600px;margin-left: 100px;margin-top: 100px">
          <div><p style="float: center;background-color: #ff5722d9;text-align: center">Thêm Sách</p></div>
            <form action="" id="books-info" method="post" enctype="multipart/form-data">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Tên sách</span>
                  </div>
                  <input name="tensach" id="tensach" type="text" class="form-control" placeholder="" aria-label="nhập tên sách" aria-describedby="basic-addon1">
               </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">ID Danh mục</span>
                  </div>
                  <select name="iddanhmuc" id="iddanhmuc" class="form-control" > 
                    <option value="DM001">Sách(DM001)</option>
                    <option value="DM002">Giáo trình(DM002)</option>
                    <option value="DM003">Tạp chí(DM003)</option>
                    <option value="DM004">Truyện, kịch(DM004)</option>
                  </select>
                  
               </div>
  
  
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Số trang sách </span>
                  </div>
                  <input name="sotrang" id="sotrang" type="number"min='1' class="form-control" placeholder=" " aria-label="username" aria-describedby="basic-addon1">
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Tên tác giả </span>
                  </div>
                  <input name="tentacgia" id="tentacgia" type="text" class="form-control" placeholder="" aria-label="username" aria-describedby="basic-addon1">
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Thời gian được mượn</span>
                  </div>
                  <input name="thoigianduocmuon" id="thoigianduocmuon" type="number"min='1' class="form-control" placeholder=" " aria-label="username" aria-describedby="basic-addon1">
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Thời gian xuất bản</span>
                  </div>
                  <input name="thoigianxuatban" id="thoigianxuatban" type="date" class="form-control" placeholder=" " aria-label="username" aria-describedby="basic-addon1">
               </div>
               <div class="custom-file" >
                <input  name="anh" id="anh" type="file" multiple="multiple" style="opacity: 1;height: 100%; padding: 0.3rem;font-size: 15px;margin: auto; vertical-align: middle;" class="custom-file-input"  id="profile_image">
                  <label class="custom-file-label" for="customFile"style="font-size: 15px"></label>
               </div>
               <input type="submit"  class="btn btn-primary btn-sm" value="Save" />
            </form>
         </div>
      </header>
       <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer"style ="width: 100%;padding-right: 90px;padding-top: 0px;margin-top: 550px;">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">Về chúng tôi</a></p>
        <p><a href="#">E-learning</a></p>
        <p><a href="#">Hỗ trợ</a></p>
        <p><a href="#">Tư vấn tuyển sinh</a></p>
        <p><a href="#">Điều hành tác nghiệp</a></p>

      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Đội ngũ kĩ thuật</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Team44K212.06</p>
        <p><i class="fa fa-fw fa-phone"></i> 0333707059</p>
        <p style = "margin-bottom: 0px"><i class="fa fa-fw fa-envelope"></i> doducanh2904@mail.com</p>
        <p><a style="text-decoration: none" href="https://www.facebook.com/profile.php?id=100043023576264"style = "height: 36px;width: 200px;margin-top: 12px;"><img src=".s/img/iconfb.png"style = "height: 17px;width: 14px;"> facebook</a></p>
       
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>    
          $(document).ready(function(){
              $("#books-info").submit(function(e){
                  e.preventDefault();
                  var tensach = $("#tensach").val();;
                  var iddanhmuc= $("#iddanhmuc").val();
                  var sotrang = $("#sotrang").val();;
                  var tentacgia= $("#tentacgia").val();
                  var thoigianduocmuon = $("#thoigianduocmuon").val();;
                  var thoigianxuatban= $("#thoigianxuatban").val();
                  var anh = $("#anh").val();
                 

                  console.log(tensach + "," + iddanhmuc + "," + sotrang +","+tentacgia+","+thoigianduocmuon+","+thoigianxuatban+","+anh);

                  if(tensach == '' || iddanhmuc == '' || sotrang=='' || tentacgia=='' || thoigianduocmuon=='' || thoigianxuatban=='' || anh ==''){
                    alert('Nhập thiếu thông tin');
                  }
                  else{
                      $.ajax({
                        type: "POST",
                        url: 'insertData_controller',
                        data: {
                          tensach:tensach,
                          iddanhmuc:iddanhmuc,
                          sotrang:sotrang,
                          tentacgia:tentacgia,
                          thoigianduocmuon:thoigianduocmuon,
                          thoigianxuatban:thoigianxuatban,
                          anh:anh
                        },
                        success:function(data)
                        {
                            alert('THÊM SÁCH THÀNH CÔNG ');
                        },
                        error:function(e)
                        {
                            alert('THÊM SÁCH THẤT BẠI ');
                        }
                    });
                  }

                  
              });
          });
      </script>
   </body>
</html>
  