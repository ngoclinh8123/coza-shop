<?php
    session_start();
    include './header-html-tag.php';
    include '../handle/connect-database.php';
    if($connect){
        $username=$_POST['bill-user'];
        $phone=$_POST['bill-phone'];
        $address=$_POST['bill-address'];
        $userid=$_SESSION['id'];
        $itemBuy=$_POST['item-buy'];
        $messages=$_POST['message'];
        $product=array();
        foreach($itemBuy as $key => $value){
            $newValue=$value.'-'.$messages[$key];
            array_push($product,$newValue);
        }
        $product=implode('|',$product);
        $time=date("d/m/Y H:i:s");
        
        $price=$_POST['bill-total'];

        $day=explode("/",explode(" ",$time)[0])[0];
        $month=explode("/",explode(" ",$time)[0])[1];
        $year=explode("/",explode(" ",$time)[0])[2];
        $timedetail=explode(" ",$time)[1];
        $sql="insert into orders(userId,product,price,address,phone,username,day,month,year,timeorder,title) value(".$userid.",'".$product."','".$price."','".$address."','".$phone."','".$username."','".$day."','".$month."','".$year."','".$timedetail."','dang-lay-hang')";
        if(mysqli_query($connect,$sql)){
            echo '<div class="order-sucess-wrap"><div class="order-sucess-content"><div class="order-sucess-title"><span>Đơn hàng của bạn đã được gửi cho người bán</span></div><a href="../users/home.php">Quay lại</a></div></div>';
        }else {
            echo '<div class="order-sucess-wrap"><div class="order-sucess-content"><div class="order-sucess-title"><span>Có lỗi xảy ra khi gửi đơn hàng của bạn :(</span></div><a href="../users/home.php">Quay lại</a></div></div>';
        }
    }
?>



        

<?php
    include './footer-html-tag.php';
?>

<script>

</script>