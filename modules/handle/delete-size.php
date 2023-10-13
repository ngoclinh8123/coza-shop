<?php
    if(isset($_GET['id'])){
        include_once './modules/handle/connect-database.php';
        $sql='delete from size where id ='.$_GET['id'];
        if(mysqli_query($connect,$sql)){
            header("Location: them-phan-loai?category=size");
        }
    }