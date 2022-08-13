<?php
    include './connect-database.php';
    if(isset($_POST['order-choose'])){
        $ids=explode('|',$_POST['order-choose']);
        array_shift($ids);
        $ids=implode(',',$ids);
        $title=$_POST['choose-title'];
        echo $title;
        if($connect){
            $sql="update orders set title='".$title."' where id in(".$ids.")";
            if(mysqli_query($connect,$sql)) echo '<a href="../admin/orders.php"></a>';
        }
    }
?>

<script>
    if(document.querySelector("a")){
        document.querySelector("a").click()
    }
</script>
