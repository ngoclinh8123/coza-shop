<?php
    session_start();
    $userid=$_SESSION['id'];
    include './connect-database.php';
    $dataCart = array();
    $itemDelete=$_GET['index'];
    if($connect){
        $sql='select product from  cart where id= (select cartid from user where id='.$userid.')';
        $result=mysqli_query($connect,$sql);
        while ($row=mysqli_fetch_array($result)){
            array_push($dataCart,$row);
        }
        // ngan cach cac id san pham bang '|'
        $dataCart=explode("|",$dataCart[0]['product']);
    }
    array_splice($dataCart,$itemDelete,1);
    $newData=implode("|",$dataCart);
    if($connect){
        $sql="update cart set product='".$newData."' where id=(select cartid from user where id=".$userid.")";
        if(mysqli_query($connect,$sql)){
            echo '<a class="link" href="../users/cart.php"></a>';
        }else echo 'Có lỗi xảy ra !';
    }
?>
<script>
    const link=document.querySelector(".link")
    if(link){
        link.click()
    }
</script>

