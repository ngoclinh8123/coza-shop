<?php
    include_once './modules/handle/connect-database.php';
    $id=$_GET['id'];
    if($connect){
        $sql='delete from orderaddress where id='.$id;
        if(mysqli_query($connect,$sql)){
            echo '<a href="dia-chi-nhan-hang"></a>';
        }

    }
?>

<script>
    if(document.querySelector("a")){
        document.querySelector("a").click();
    }
</script>
