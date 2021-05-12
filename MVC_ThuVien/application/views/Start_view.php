<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>  <div class="imgcontainer">
    <img src="http://due.udn.vn/portals/_default/skins/dhkt/img/front/logo.png" alt="Avatar" class="avatar">
  </div> </h2>

<form action="<?php echo base_url(); ?>index.php/LoginUser_controller/home" method="post">


  <div class="container">
    <!-- <form action="<?php echo base_url(); ?>index.php/LoginUser_controller"> -->
    <a href="<?php echo base_url(); ?>index.php/LoginController"><button type="button" class="btn btn-primary btn-sm">Đăng nhập Thủ Thư</button></a>
    <!-- </form> -->
<a href="<?php echo base_url(); ?>index.php/LoginUser_controller"><button type="button" class="btn btn-secondary btn-sm">Đănh nhập độc giả</button></a>
  </div>


</form>

</body>
</html>
