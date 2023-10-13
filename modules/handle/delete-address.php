<?php
    include_once './modules/handle/connect-database.php';
    if(isset($_GET['id'])){
        if($connect){
            $sql='delete from orderaddress where id='.$id;
            if(mysqli_query($connect,$sql)){
                echo '<a href="dia-chi-nhan-hang"></a>';
            }else echo '<a href="dia-chi-nhan-hang"></a>';

        }
    }else{
        header("location:trang-chu");
    }
?>

<script>
    if(document.querySelector("a")){
        document.querySelector("a").click();
    }
</script>
