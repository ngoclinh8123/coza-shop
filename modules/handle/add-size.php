<?php
    if(isset($_POST['add-size'])){
        if(trim($_POST['add-size'])!=''){
            include_once './modules/handle/connect-database.php';
            if($connect){
                $sql="insert into size(size) values ('".$_POST['add-size']."')";
                if(mysqli_query($connect,$sql)){
                    header("Location:them-phan-loai?category=size");
                }
            }

        }else{
            header("Location:them-phan-loai?category=size");
        }
    }else{
        header("Location:them-phan-loai?category=size");
    }