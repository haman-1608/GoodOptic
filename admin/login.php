<?php
session_start();
include('config/dbconnect.php');
include('user.php');
if(isset($_POST['dangnhap'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $user = checkuser($name, $password);
    if(isset($user)&&(is_array($user))&&(count($user)>0)){
       extract($user);
    if($type == 1){
        header('location: index.php');
    } else {
        header('location: staff.php');
    }
    }else{
        $txt_error = "Tên đăng nhập hoặc mật khẩu không đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="login.css" />
    <title>Trang đăng nhập của quản trị viên</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login.php" class="sign-in-form" method="post">
            <h2 class="title">Đăng nhập</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Tên đăng nhập" name="name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Mật khẩu" name="password"/>
            </div>
            <input type="submit" name="dangnhap" value="Đăng nhập" class="btn solid" />
            <?php 
            if(isset($txt_error)&&($txt_error!="")){
              echo "<font color='red'>".$txt_error."</font>";
            }
            ?>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>