<?php
    ini_set('display_errors',1);
    if(isset($_SESSION['user-email'])){
        include_once './modules/handle/connect-database.php';
        include_once './modules/users/header-html-tag.php';
        include_once './modules/users/header-top.php';
        include_once './modules/users/header.php';

        $dataOrders=array();
        $dataStatus=array();
        $dataProduct=array();

        if($connect){

            $sql="select * from orderstatus order by level";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataStatus,$row);
            }

            $status="0";
            if(isset($_GET['status'])){
                $pagination2=$_GET['status'];
                foreach ($dataStatus as $key => $value){
                    if($value['class']==$pagination2){
                        $status=$value['id'];
                        break;
                    }
                }
            }
            // echo $status;

            $sql="select * from product";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataProduct,$row);
            }

            // echo $status;
            if($status=="0"){
                $sql="select o.id,o.product,o.year,o.month,o.day,o.time,o.price,o.status,a.userId,a.name,a.phone,a.address  from orders as o inner join orderaddress as a on o.addressId=a.id where a.userId=(select id from user where email='".$_SESSION['user-email']."') order by o.id desc ";
            }else{
                $sql="select o.id,o.product,o.year,o.month,o.day,o.time,o.price,o.status,a.userId,a.name,a.phone,a.address  from orders as o inner join orderaddress as a on o.addressId=a.id where a.userId=(select id from user where email='".$_SESSION['user-email']."') and o.status=".$status." order by o.id desc ";
            }
            $result =mysqli_query($connect,$sql);
            while($row = mysqli_fetch_array($result)){
                array_push($dataOrders,$row);
            }
        }
        // echo '<pre>';print_r($dataOrders);

        


?>

<div class="user-wrap">
    <div class="user-nav">
        <div class=" un-item-head">
            <div class="un-name"><span>user name</span></div>
        </div>
        <div class="un-item active">
            <a href="">
                <span>
                    <i class="fas fa-clipboard-list"></i>
                    <span>Đơn mua</span>
                </span>
            </a>
        </div>
        
        <div class="un-item">
            <a href="dia-chi-nhan-hang">
                <span>
                    <i class="fas fa-address-book"></i>
                    <span>Địa chỉ nhận hàng</span>
                </span>
            </a>
        </div>
    </div>

    <!-- user content block -->

    <div class="user-order-block">
        <div class="uo-head">
            <a href="don-hang" class="uo-item <?php if($status==0) echo 'active'; ?>">
                <span>Tất cả</span>
            </a>

            <?php
                foreach ($dataStatus as $key => $value){
            ?>
                <a href="don-hang?status=<?php echo $value['class'] ?>" class="uo-item <?php if($value['id']==$status) echo 'active'; ?>">
                    <span><?php echo $value['name'] ?></span>
                </a>
            <?php
                }
            ?>
        </div>

        <!-- user with no order -->
        <!-- <div class="uo-row-no-item"><span>Bạn chưa có đơn hàng nào</span></div> -->

        <?php
            if(count($dataOrders) > 0){
                foreach ($dataOrders as $key => $value){
        ?>
                    <a href="" class="uo-order">
                        <div class="uo-status">
                            <?php
                                foreach ($dataStatus as $keyStatus=>$valueStatus){
                                    if($value['status']==$valueStatus['id']){
                                        echo '<span>'.$valueStatus['name'].'</span>';
                                    }
                                }
                            ?>
                        </div>

                        <?php
                            $productArr=explode('|',$value['product']);
                            $path='./includes/images/';
                            // echo '<pre>';print_r($productArr);
                            foreach($productArr as $keyProduct=>$valueProduct){
                                $productItem=explode('-',$valueProduct);
                                $idProduct=$productItem[0];
                                $amountProduct=$productItem[1];
                                $sizeProduct=$productItem[2];
                                $colorProduct=$productItem[3];
                                $noteProduct=$productItem[4];
                                foreach ($dataProduct as $keyPr =>$valuePr){
                                    if($valuePr['id']==$idProduct){
                        ?>
                        <div class="uo-o-item row">
                            <div class="col c-1">
                                <div class="uoo-item-image">
                                    <img src="<?php echo $path.explode('|',$valuePr['image'])[0]; ?>" alt="">
                                </div>
                            </div>
                            <div class="col c-4">
                                <div class="uoo-item-desc">
                                    <div class="uoo-item-name">
                                        <span><?php echo $valuePr['name'] ?></span>
                                    </div>
                                    <div class="uoo-item-amount">
                                        <span>SL : </span><span style="color:red"><?php echo $amountProduct ?></span>
                                    </div>
                                    <div class="uoo-item-size">
                                        <span>Phân loại hàng :</span>
                                        <span>Size </span><span style="color:red"><?php echo $sizeProduct ?></span>,
                                    <span style="color:red"><?php echo $colorProduct ?></span>
                                </div>
                                </div>
                            </div>
                            <div class="col c-5">
                                <div class="uoo-item-address">
                                    <div class="uoo-item-address-row">
                                        <span>Người nhận : </span><span><?php echo $value['name']; ?></span>
                                    </div>
                                    <div class="uoo-item-address-row">
                                        <span>SĐT : </span><span><?php echo $value['phone']; ?></span>
                                    </div>
                                    <div class="uoo-item-address-row">
                                        <span>Địa chỉ : </span><span><?php echo $value['address']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col c-2">
                                <div class="uoo-item-price">
                                    <span style=""><?php echo $valuePr['price'] ?></span><span> VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                            }
                        ?>

                        <div class="uo-price">
                            <span>Tổng số tiền : </span>
                            <span class="uo-price-total"><?php echo $value['price'] ?></span><span> VNĐ</span>
                        </div>
                    </a>
        <?php
                }
            }else{
                echo '<div class="uo-row-no-item"><span>Bạn chưa có đơn hàng nào</span></div>';
            }
        ?>
    </div>
    
</div>

<?php
        include_once './modules/users/footer.php';
        include_once './modules/users/footer-html-tag.php';
    }else{
        header('Location: trang-chu');
    }
