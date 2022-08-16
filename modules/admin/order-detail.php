<?php
        include './heading-ad.php';
        include '../handle/function.php';
        include '../handle/connect-database.php';
        $idOrder=$_GET['id'];
        $dataOrder=array();

        if($connect){
            $sql='select * from orders where id='.$idOrder;
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataOrder,$row);
            }
            
        }
        $dataOrder=$dataOrder[0];
        // echo '<pre>';print_r($dataOrder);
        $product=$dataOrder['product'];
        $product=explode('|',$product);

?>
    <div class="order-detail-wrap">
        <div class="od-title">
            <span>Chi tiết đơn hàng</span>
        </div>
        <div class="od-order-id">
            <span>ID đơn hàng : </span>
            <span><?php echo "DH".str_pad($dataOrder['id'],4,'0',STR_PAD_LEFT); ?></span>
        </div>
        <div class="od-address">
            <div class="od-address--title">
                <span>Địa chỉ nhận hàng</span>
            </div>
            <div class="od-address--row">
                <span>Người nhận :</span>
                <span><?php echo $dataOrder['username']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Số điện thoại :</span>
                <span><?php echo $dataOrder['phone']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Địa chỉ :</span>
                <span><?php echo $dataOrder['address']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Thời gian đặt :</span>
                <span><?php echo $dataOrder['day']."-".$dataOrder['month']."-".$dataOrder['year']." ".$dataOrder['timeorder']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Trạng thái : </span>
                <span><?php echo $dataOrder['title']; ?></span>
            </div>
        </div>
        <div class="od-product">
            <div class="od-product--title">
                <span>Sản phẩm</span>
            </div>

            <?php
                //  echo '<pre>';print_r($dataOrder);
                foreach($product as $key=>$value){
                    $item=explode('-',$value);
                    // echo '<pre>';print_r($item);
                    $idProduct=$item[0];
                    $amount=$item[1];
                    $size=$item[2];
                    $color=$item[3];
                    $note=$item[4];

                    $dataProduct=array();
                    $sql='select * from product where id='.$idProduct;
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($result)){
                        array_push($dataProduct,$row);
                    }
                    $dataProduct=$dataProduct[0];
                    $image=explode("|",$dataProduct['productimage'])[0];


                    // echo '<pre>';print_r($dataProduct);echo '</pre>';
            ?>

                        <div class="od-product--row">
                            <!-- <a href="../users/product-detail.php?id=<?php echo $idProduct;?>"> -->
                            <a href="">
                                <div class="row od-product--row-heading">
                                    <div class="col c-1 m-1 l-1"><span>ID</span></div>
                                    <div class="col c-7 m-7 l-4"><span>Sản phẩm</span></div>
                                    <div class="col c-2 m-2 l-1"><span>Chi tiết</span></div>
                                    <div class="col c-2 m-2 l-1"><span>Số lượng</span></div>
                                    <div class="col c-12 m-12 l-5 hide-on-mobile-tablet "><span>Ghi chú</span></div>
                                </div>
                                <div class="row od-product--row-item">
                                    <div class="col c-1 m-1 l-1"><span><?php echo $idProduct;?></span></div>
                                    <div class="col c-7 m-7 l-4 od-product-item">
                                        <div class="od-product-image">
                                            <img src="<?php echo $image ?>" alt="">
                                        </div>
                                        <div class="od-product-name">
                                            <span><?php echo $dataProduct['productname'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col c-2 m-2 l-1">
                                        <span><?php echo $color;?></span>,
                                        <span>Size <?php echo $size;?></span>
                                    </div>
                                    <div class="col c-2 m-2 l-1"><span><?php echo $amount;?></span></div>
                                    <div class="col c-12 m-12 l-5"><span class="od-note-title">Ghi chú : </span><span><?php echo $note;?></span></div>
                                </div>
                            </a>
                        </div>

            <?php
                }
            ?>

        </div>
        <div class="od-price">
            <span class="od-price--title">Tổng thanh toán :</span>
            <span class="od-price-total"><?php echo $dataOrder['price'] ?></span>
            <span class="od-price-unit">VNĐ</span>
        </div>
    </div>

<script src="./js/admin.js"></script>
</body>
</html>