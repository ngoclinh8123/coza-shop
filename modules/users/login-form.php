<?php 
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sheeta Shop</title>
    <link rel="icon" href="./includes/images/logo-icon-bird.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="./modules/users/css/style.css" />
    <link rel="stylesheet" href="./modules/users/css/base.css" />
  </head>
  <body>
    <div class="login-form">
      <div class="login-form-block f-c-c">
        <form action="" method="post">
          <div class="login-form-logo">
            <img src="./image/logo-coza-store.png" alt="" />
          </div>
          <div class="sign-in-form-title">Đăng nhập vào Coza Shop</div>
          <div class="login-form-content">
            <label for="user-sign-up-email">Email</label>
            <?php
              if(isset($_POST['user-sign-up-email'])){
                // if empty then error
                  if(trim($_POST['user-sign-up-email'])!=''){
                    echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" value="'.$_POST['user-sign-up-email'].'"/>';
                  }else{
                    echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" value=""/>';
                    echo '<div class="error-login-form2">Vui lòng nhập trường này</div>';
                  }
              }else{
                // default

                echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" />';
              }
            ?>
            
            <label for="user-sign-up-password" style="margin-top:24px">Mật khẩu</label>
            <?php
              if(isset($_POST['user-sign-up-password'])){
                // if empty then error
                  if(trim($_POST['user-sign-up-password'])!=''){
                    echo '<input id="user-sign-up-password" type="password" name="user-sign-up-password" placeholder="Mật khẩu" value="'.$_POST['user-sign-up-password'].'"/>';
                  }else{
                    echo '<input id="user-sign-up-password" type="password" name="user-sign-up-password" placeholder="Mật khẩu" value=""/>';
                    echo '<div class="error-login-form2">Vui lòng nhập trường này</div>';
                  }
              }else{
                // default
                echo '<input id="user-sign-up-password" type="password" name="user-sign-up-password" placeholder="Mật khẩu" />';
              }
            ?>
            <input type="submit" value="Đăng nhập " style="margin-top:24px"/>
          </div>
        </form>
        <?php


          $data=array();
          $dataUser=array();
          $dataAdmin=array();
          include_once './modules/handle/connect-database.php';
          // if data set properly then submit
          if(isset($_POST['user-sign-up-email'])&& trim($_POST['user-sign-up-email'])!='' && 
          isset($_POST['user-sign-up-password']) && trim($_POST['user-sign-up-password'])!='') {
            $email = $_POST['user-sign-up-email'];
            $password = $_POST['user-sign-up-password'];
            if($connect){
              // get only hashed password 
              $sql="select password from userlogin where email='".$email."'";
              $result = mysqli_query($connect,$sql);
              while($row = mysqli_fetch_array($result)){
                  array_push($data,$row);
              }

              $sql="select * from adminlogin where email='".$email."'";
              $result = mysqli_query($connect,$sql);
              while($row = mysqli_fetch_array($result)){
                  array_push($dataAdmin,$row);
              }

              
              // neu data nhap vao cua nguoi dung
              if(count($data)>0){
                // ?
                $pass=$data[0]['password'];
                // Verify hashed password
                if(password_verify($password,$pass)){
                  // remove prev session
                  session_unset();
                  $sql="select * from user where id = (select userId from userlogin where email='".$email."')";
                  $result = mysqli_query($connect,$sql);
                  while($row = mysqli_fetch_array($result)){
                      array_push($dataUser,$row);
                      
                  }
                  $dataUser=$dataUser[0];
                  
                  // make new session with new data
                  $_SESSION['user-name']=$dataUser['name'];
                  $_SESSION['user-email']=$dataUser['email'];
                  $_SESSION['user-avatar']=$dataUser['avatar'];


                  echo '<a class="id" href="trang-chu"/>';
                }
              }else if(count($dataAdmin)>0){
                // remove old session
                session_unset();

                $_SESSION['admin-email']=$email;
                echo '<a href="doanh-so-ban-hang" class="id"></a>';
              }else{
                // khi không phải cả admin cả users
                echo '<div class="error-login-form3">Email hoặc mật khẩu không chính xác</div>';
              }
            }
          }
        ?>
        
        <div class="login-form-bottom">
          Bạn chưa có tài khoản ?
          <a href="dang-ky">Đăng ký </a>
        </div>
      </div>
    </div>
    
  
<script>
        const errorLink=document.querySelector('.id');
        if(errorLink){
            errorLink.click()
        }
        const loginErrorLink=document.querySelector('.error-login-form3')
        const emailInput=document.querySelector('#user-sign-up-email')
        const passwordInput=document.querySelector('#user-sign-up-password')
        if(loginErrorLink){
          emailInput.style.border='1px solid red'
          passwordInput.style.border='1px solid red'
        }
</script>
  </body>
</html>
