<?php
if(isset($_SESSION['id'])){
    // get user infomation
      $userid= $_SESSION['id'];
      $userdata=array();
      if($connect){
        $sql='select * from user where id='.$userid;
        $result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
          array_push($userdata,$row);
        }
      }
      $userdata=$userdata[0];
      if(isset($userdata['username'])){
        $username=$userdata['username']; 
      } else  $username="";
      if(isset($userdata['email'])){
        $email=$userdata['email']; 
      } else  $email="";

  }else $userid=33;
?>