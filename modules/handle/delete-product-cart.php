<?php
    session_start();
    $user_email=$_SESSION['user-email'];
    include_once './modules/handle/connect-database.php';
    $dataCart = array();
    $itemDelete=$_GET['product_id'];
    if($connect){
        $sql="delete from cart where productId=".$itemDelete." and userId= (select id from user where email='".$user_email."')";
        if(mysqli_query($connect,$sql)){
            echo '<a class="link" href="gio-hang"></a>';
        }else echo 'Có lỗi xảy ra !';
    }
?>
<script>
    const link=document.querySelector(".link")
    if(link){
        link.click()
    }
</script>

