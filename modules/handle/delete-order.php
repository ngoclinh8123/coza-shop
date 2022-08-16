<?php
    include '../handle/connect-database.php';
    $id=$_POST['id-product-delete'];
    if($connect){
        $sql='delete from orders where id='.$id;
        if(mysqli_query($connect,$sql)){
            echo '<a href="../admin/orders.php"></a>';
        }
    }
?>
<script>
    if(document.querySelector("a")){
        document.querySelector("a").click()
    }
</script>
