<?php
$keyUserLogin=false;
if(isset($_SESSION['user-name']) && isset($_SESSION['user-email']) && isset($_SESSION['user-avatar'])){
    // get user infomation
      $keyUserLogin=true;//xac nhan nguoi dung da dang nhap
      $username= $_SESSION['user-name'];
      $useremail= $_SESSION['user-email'];
      $useravatar= $_SESSION['user-avatar'];
      $userId=array();
      if($connect){
        $sql="select id from user where name='".$username."' and email='".$useremail."'";
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
          array_push($userId,$row);
        }
      }
      // echo 'dayyyyyyyyyy';
      // echo '<pre>';print_r($userId);
      $userId=$userId[0]['id'];

      // $userdata=array();
      // if($connect){
      //   $sql='select * from user where id='.$userid;
      //   $result=mysqli_query($connect,$sql);
      //   while($row=mysqli_fetch_array($result)){
      //     array_push($userdata,$row);
      //   }
      // }
      // $userdata=$userdata[0];
      // if(isset($userdata['username'])){
      //   $username=$userdata['username']; 
      // } else  $username="";
      // if(isset($userdata['email'])){
      //   $email=$userdata['email']; 
      // } else  $email="";

  }else{
    $username="GUEST";
    $useremail="guest@gmail.com";
    $useravatar="";
  }
?>