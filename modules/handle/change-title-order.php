<?php
    if(isset($_POST['order-choose'])){
        include_once './modules/handle/connect-database.php';
        $ids=explode('|',$_POST['order-choose']);
        array_shift($ids);
        $ids=implode(',',$ids);
        $title=$_POST['choose-title'];
        // echo $title;
        if($connect){
            $sql="update orders set status='".$title."' where id in(".$ids.")";
            if(mysqli_query($connect,$sql)) echo '<a href="danh-sach-don-hang"></a>';
        }
    }else{
        echo '<a href="danh-sach-don-hang"></a>';
    }
?>

<script>
    if(document.querySelector("a")){
        document.querySelector("a").click()
    }
</script>
