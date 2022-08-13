<?php
    include '../handle/connect-database.php';
    $id=$_GET['id'];
    if($connect){
        $sql='delete from address where id='.$id;
        if(mysqli_query($connect,$sql)){
            echo '<a href="../users/add-address.php"></a>';
        }

    }
?>

<script>
    if(document.querySelector("a")){
        document.querySelector("a").click();
    }
</script>
