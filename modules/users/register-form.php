<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./modules/users/css/style.css" />
    <link rel="stylesheet" href="./modules/users/css/base.css" />
    <link rel="stylesheet" href="./includes/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
  </head>
  <body>
    <div class="login-form">
      <div class="login-form-block f-c-c">
        <form action="" method="post">
          <div class="login-form-logo">
            <img src="./image/logo-coza-store.png" alt="" />
          </div>
          <div class="sign-up-form-title">Đăng ký tài khoản</div>
          <div class="login-form-content">
            <label for="user-sign-up-name">Tên của bạn?</label>
            
            <?php
              if(isset($_POST['user-sign-up-name']) && trim($_POST['user-sign-up-name'])!=''){
                echo '<input id="user-sign-up-name" type="text" name="user-sign-up-name" placeholder="Tên của bạn" value="'.$_POST['user-sign-up-name'].'"/>';
              }else{
                echo '<input id="user-sign-up-name" type="text" name="user-sign-up-name" placeholder="Tên của bạn" value=""/>';
                echo '<span class="error-login-form">Vui lòng nhập trường này</span>';
              } 
            ?>
            
            <label for="user-sign-up-email">Email</label>
            <?php
              $flagEmail=true;
              if(isset($_POST['user-sign-up-email']) && trim($_POST['user-sign-up-email'])!=''){
                echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" value="'.$_POST["user-sign-up-email"].'"/>';
                $pattern="#^[a-z][a-z0-9_\.]{2,32}@[a-z0-9]{3,}(\.[a-z0-9]{1,4}){1,2}$#";
                $subject =$_POST['user-sign-up-email'];
                if(!preg_match($pattern, $subject)){
                  $flagEmail=false;
                  echo '<span class="error-login-form">Email không hợp lệ</span>';
                }else echo '';
              }else{
                echo '<input id="user-sign-up-email" type="text" name="user-sign-up-email" placeholder="Địa chỉ email" />';
                echo '<span class="error-login-form">Vui lòng nhập trường này</span>';
              } 
            ?>
            
            <?php
              if(isset($_POST['user-sign-up-password']) && trim($_POST['user-sign-up-password'])!=''){
                echo '<input id="user-sign-up-password" type="text" name="user-sign-up-password" placeholder="Mật khẩu" value="'.$_POST["user-sign-up-password"].'"/>';

              }else{
                echo '<input id="user-sign-up-password" type="text" name="user-sign-up-password" placeholder="Mật khẩu" />';
                echo '<span class="error-login-form">Vui lòng nhập trường này</span>';
              } 
            ?>
            <span>Gợi ý: Mật khẩu cần có ít nhất 8 ký tự</span>
            <input type="submit" value="Đăng ký " />
          </div>
        </form>
        <div class="login-form-bottom">
          Bạn đã có tài khoản ?
          <a href="dang-nhap">Đăng nhập </a>
        </div>
      </div>
    </div>

    
    <!-- <div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đăng ký tài khoản thành công</div><a href="./login-form.php">Đăng nhập</a></div></div> -->
    <?php
        include_once './modules/handle/connect-database.php';
        include_once './modules/handle/function.php';
      if(isset($_POST['user-sign-up-name']) && trim($_POST['user-sign-up-name'])!='' && isset($_POST['user-sign-up-email']) && trim($_POST['user-sign-up-email'])!='' && isset($_POST['user-sign-up-password']) && trim($_POST['user-sign-up-password'])!='' && $flagEmail){
        $name=$_POST['user-sign-up-name'];
        $email=$_POST['user-sign-up-email'];
        $password=$_POST['user-sign-up-password'];
        $password=password_hash($password,PASSWORD_BCRYPT);
        

        if($connect){
          $flag=false;
          $flagAdmin=false;
          $sql="select * from user where email='".$email."'";
          $userList=array();
          $result=mysqli_query($connect,$sql);
          while($row=mysqli_fetch_array($result)){
            array_push($userList,$row);
          }
          $sql="select * from adminlogin where email='".$email."'";
          $adminList=array();
          $result=mysqli_query($connect,$sql);
          while($row=mysqli_fetch_array($result)){
            array_push($adminList,$row);
          }
          // echo '<pre>';print_r($userList);
          // echo '<pre>';print_r($adminList);
          if(count($userList)>0 || count($adminList)>0){
            $flag=true;
          }
          if($flag){
            echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Tài khoản đã tồn tại</div></div></div>';
          }else{
            // $cartid=randomString(15);
            // // $cartid='1';
            // $to = $email;
            

            // modal xac minh password
            // echo '<div class="modal-email"><div class="modal-email-content"><form action="xac-minh-mat-khau" method="post"><div class="modal-email-title"><span>Hãy nhập mã xác minh được gửi tới email <span>'.$email.'</span></span></div><div class="modal-email-input"><input type="text" name="email-confirm"></div><span class="modal-email-submit--fake">Xác minh</span><input type="submit" value="Xác minh" class="modal-email-submit"></form></div></div>';


            $sql="insert into user(name,email,avatar) values ('".$name."','".$email."','')";

            if(mysqli_query($connect,$sql)){
              $sql='select max(id) from user';
              $result=mysqli_query($connect,$sql);
              $arrTemp=array();
              while($row=mysqli_fetch_array($result)){
                array_push($arrTemp,$row);
              }
              $userId=$arrTemp[0][0];
              // echo $userId;
              $sql="insert into userlogin(userId,email,password) values(".$userId.",'".$email."','".$password."')";
              if(mysqli_query($connect,$sql)){
                echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đăng ký tài khoản thành công</div><a href="dang-nhap">Đăng nhập</a></div></div>';
              }
            }

            // // $sql="insert into user(username,email,password,cartid,admin) values('".$name."','".$email."','".$password."','".$cartid."','admin')";
            // $sql2="insert into cart(id,product) values ('".$cartid."','')";
            // if(mysqli_query($connect,$sql2) && mysqli_query($connect,$sql)){
            //   echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đăng ký tài khoản thành công</div><a href="dang-nhap">Đăng nhập</a></div></div>';
            // }else{
            //   echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Có lỗi xảy ra</div><a href="dang-ky">Thử lại</a></div></div>';
            // }
          }
          // foreach($userList as $key=>$value){
          //   if( $value['password']==$password && $value['email']==$email){
          //       $flag=true;       
          //       break;
          //   }
          // }
          // if($flag){
          //   echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Tài khoản đã tồn tại</div></div></div>';
          // }else{
            // $cartid=randomString(15);
            // // $cartid='1';
            // $sql="insert into user(username,email,password,cartid) values('".$name."','".$email."','".$password."','".$cartid."')";
            // // $sql="insert into user(username,email,password,cartid,admin) values('".$name."','".$email."','".$password."','".$cartid."','admin')";
            // $sql2="insert into cart(id,product) values ('".$cartid."','')";
            // if(mysqli_query($connect,$sql2) && mysqli_query($connect,$sql)){
              // echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Đăng ký tài khoản thành công</div><a href="dang-nhap">Đăng nhập</a></div></div>';
            // }else{
              // echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Có lỗi xảy ra</div><a href="dang-ky">Thử lại</a></div></div>';
            // }
          // }
        }else{
              echo '<div class="register-success-form"><div class="register-success-content"><i class="fas fa-times"></i><div class="register-success-title">Có lỗi xảy ra</div><a href="dang-ky">Thử lại</a></div></div>';
        }

      }
    ?>
    <script>
      const modalSuccess = document.querySelector(".register-success-form");
      const exitModalSuccess = document.querySelector(".register-success-form i");
      exitModalSuccess.onclick = function () {
        modalSuccess.style.display = "none";
      };
    </script>
  </body>
</html>
