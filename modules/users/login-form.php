<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
            <!-- <input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" /> -->

            <?php
              if(isset($_POST['user-sign-up-email'])){
                  if(trim($_POST['user-sign-up-email'])!=''){
                    echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" value="'.$_POST['user-sign-up-email'].'"/>';
                  }else{
                    echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" value=""/>';
                    echo '<div class="error-login-form2">Vui lòng nhập trường này</div>';
                  }
              }else{
                echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" />';
              }
            ?>
            
            <label for="user-sign-up-password">Mật khẩu</label>
            <?php
              if(isset($_POST['user-sign-up-password'])){
                  if(trim($_POST['user-sign-up-password'])!=''){
                    echo '<input id="user-sign-up-password" type="text" name="user-sign-up-password" placeholder="Mật khẩu" value="'.$_POST['user-sign-up-password'].'"/>';
                  }else{
                    echo '<input id="user-sign-up-password" type="text" name="user-sign-up-password" placeholder="Mật khẩu" value=""/>';
                    echo '<div class="error-login-form2">Vui lòng nhập trường này</div>';
                  }
              }else{
                echo '<input id="user-sign-up-password" type="text" name="user-sign-up-password" placeholder="Mật khẩu" />';
              }
            ?>
            <input type="submit" value="Đăng nhập " />
          </div>
        </form>
        <?php


          $data=array();
          $dataUser=array();
          $dataAdmin=array();
          include_once './modules/handle/connect-database.php';
          if(isset($_POST['user-sign-up-email'])&& trim($_POST['user-sign-up-email'])!='' && isset($_POST['user-sign-up-password']) && trim($_POST['user-sign-up-password'])!='') {
            $email = $_POST['user-sign-up-email'];
            $password = $_POST['user-sign-up-password'];
            if($connect){
              $sql="select password from userlogin where email='".$email."'";
              $result = mysqli_query($connect,$sql);
              while($row = mysqli_fetch_array($result)){
                  array_push($data,$row);
              }
              // echo '<pre>';print_r($data);

              $sql="select * from adminlogin where email='".$email."'";
              $result = mysqli_query($connect,$sql);
              while($row = mysqli_fetch_array($result)){
                  array_push($dataAdmin,$row);
              }
              // echo '<pre>';print_r($dataAdmin);
              // $dataAdmin=$dataAdmin[0];
              // echo $dataAdmin['name'];
              // echo $dataAdmin['email'];
              
              if(count($data)>0){
                $pass=$data[0]['password'];
                if(password_verify($password,$pass)){
                  // echo 'password is valid';
                  $sql="select * from user where id = (select userId from userlogin where email='".$email."')";
                  $result = mysqli_query($connect,$sql);
                  while($row = mysqli_fetch_array($result)){
                      array_push($dataUser,$row);
                      
                  }
                  // echo '<pre>';print_r($dataUser);echo '</pre>';
                  $dataUser=$dataUser[0];
                  $_SESSION['user-name']=$dataUser['name'];
                  $_SESSION['user-email']=$dataUser['email'];
                  $_SESSION['user-avatar']=$dataUser['avatar'];
                  echo '<a class="id" href="trang-chu"/>';
                }
              }else if(count($dataAdmin)>0){
                if(isset($_SESSION['user-email'])) session_destroy();
                echo '<a href="doanh-so-ban-hang" class="id"></a>';
              }else{
                echo '<div class="error-login-form3">Email hoặc mật khẩu không chính xác</div>';
              }
              // echo $pass;
            }
          }

          //   if($connect){
          //     $sql="select * from user where id=(select userId from userlogin where email='".$email."' and password='".$password."')";
          //     $result = mysqli_query($connect,$sql);
          //     while($row = mysqli_fetch_array($result)){
          //         array_push($data,$row);
          //     }
          //     $sql="select * from adminlogin where email='".$email."' and password='".$password."'";
          //     $result = mysqli_query($connect,$sql);
          //     while($row = mysqli_fetch_array($result)){
          //         array_push($dataAdmin,$row);
          //     }
          //     if(!empty($dataAdmin)){
          //       $dataAdmin=$dataAdmin[0];
          //       // echo '<pre>';print_r($dataAdmin);echo '</pre>';
          //       echo '<a href="doanh-so-ban-hang" class="id"></a>';
          //     }else if(!empty($data)){
          //       $data=$data[0];
          //       // echo '<pre>';print_r($data);echo '</pre>';
          //       $_SESSION['user-name']=$data['name'];
          //       $_SESSION['user-email']=$data['email'];
          //       $_SESSION['user-avatar']=$data['avatar'];
          //       echo '<a class="id" href="trang-chu"/>';

          //       // if($data['admin']=='admin'){
          //       //   echo '<a href="doanh-so-ban-hang" class="id"></a>';
          //       // }else{
          //       //   $data=$data['id'];
          //       //   $_SESSION['id']=$data;
          //       //   echo '<a class="id" href="trang-chu"/>';
          //       // }
          //       // echo '<a class="id" href="../handle/login.php?id='.$data.'"/>';
          //     }else {
          //       echo '<div class="error-login-form3">Email hoặc mật khẩu không chính xác</div>';
          //     }
          //   }
          // }
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
