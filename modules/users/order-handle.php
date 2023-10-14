<?php
    // session_start();
    ini_set('display_errors',1);
    
    if(isset($_SESSION['user-email'])){
        if(isset($_POST['bill-user'])){
            include_once './modules/users/header-html-tag.php';
            include_once './modules/handle/connect-database.php';
            if($connect){
                $addressId=$_POST['bill-user'];
                // echo 'address-id: '.$addressId;
                // $phone=$_POST['bill-phone'];
                // $address=$_POST['bill-address'];

                $itemBuy=$_POST['item-buy'];
                // echo '<pre>';print_r($itemBuy);echo '</pre>';
                $messages=$_POST['message'];
                // echo '<pre>';print_r($messages);echo '</pre>';

                $product=array();
                foreach($itemBuy as $key => $value){
                    $newValue=$value.'-'.$messages[$key];
                    array_push($product,$newValue);
                }
                $product=implode('|',$product);

                // echo '<pre>';print_r($product);echo '</pre>';

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $time=date("d/m/Y H:i:s");
                
                $price=$_POST['bill-total'];

                $day=explode("/",explode(" ",$time)[0])[0];
                $month=explode("/",explode(" ",$time)[0])[1];
                $year=explode("/",explode(" ",$time)[0])[2];
                $timedetail=explode(" ",$time)[1];

                // echo $day;
                // echo $month;
                // echo $year;
                // echo $timedetail;


                $sql="insert into orders(addressId,product,price,day,month,year,time,status) value(".$addressId.",'".$product."','".$price."','".$day."','".$month."','".$year."','".$timedetail."','1')
                        ";
                    if(mysqli_query($connect,$sql)){
                        echo '<div class="order-sucess-wrap"><div class="order-sucess-content"><div class="order-sucess-title"><span>Đơn hàng của bạn đã được gửi cho người bán</span></div><a href="trang-chu">Quay lại</a></div></div>';
                }else {
                    echo '<div class="order-sucess-wrap"><div class="order-sucess-content"><div class="order-sucess-title"><span>Có lỗi xảy ra khi gửi đơn hàng của bạn :(</span></div><a href="trang-chu">Quay lại</a></div></div>';
                }
            }
            include_once './modules/users/footer-html-tag.php';
        }else{
            header("Location:trang-chu");
        }
    }else{
        header("Location:trang-chu");
    }
?>

