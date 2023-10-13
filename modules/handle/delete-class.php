<?php
    include_once './modules/handle/connect-database.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($connect){
            $sql='delete from class where id='.$id;
            if(mysqli_query($connect,$sql)){
                // echo '<a href="them-phan-loai"></a>';
                Header("Location:them-phan-loai?category=class");
            }
        }
    }

?>

