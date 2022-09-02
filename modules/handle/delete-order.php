<?php
    include './modules/handle/connect-database.php';
    $id=$_POST['id-product-delete'];
    // echo $id;
    if($connect){
        $sql='delete from orders where id='.$id;
        if(mysqli_query($connect,$sql)){
            echo '<a href="danh-sach-don-hang"></a>';
        }
    }
?>
<script>
    if(document.querySelector("a")){
        document.querySelector("a").click()
    }
</script>
