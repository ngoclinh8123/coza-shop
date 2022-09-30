<?php
        include_once './modules/admin/heading-ad.php';
        include_once './modules/handle/function.php';
        include_once './modules/handle/connect-database.php';
        $idOrder=$_GET['id'];
        $dataOrder=array();
        $dataStatus=array();

        if($connect){
            $sql='select * from orders where id='.$idOrder;
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataOrder,$row);
            }
            $dataOrder=$dataOrder[0];
            // echo '<pre>';print_r($dataOrder);
            $dataAddress=array();
            $sql='select * from orderaddress where id='.$dataOrder['addressId'];
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataAddress,$row);
            }

            $sql='select * from orderstatus where id='.$dataOrder['status'];
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataStatus,$row);
            }
        }
        // echo '<pre>';print_r($dataAddress);
        // echo '<pre>';print_r($dataStatus);
        $dataAddress=$dataAddress[0];
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
                <span><?php echo $dataAddress['name']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Số điện thoại :</span>
                <span><?php echo $dataAddress['phone']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Địa chỉ :</span>
                <span><?php echo $dataAddress['address']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Thời gian đặt :</span>
                <span><?php echo $dataOrder['day']."-".$dataOrder['month']."-".$dataOrder['year']." ".$dataOrder['time']; ?></span>
            </div>
            <div class="od-address--row">
                <span>Trạng thái : </span>
                <span><?php echo $dataStatus[0]['name']; ?></span>
            </div>
        </div>
        <div class="od-product">
            <div class="od-product--title">
                <span>Sản phẩm</span>
            </div>
            <div class="od-product--row">
                <div class="row od-product--row-heading">
                    <div class="col c-1"><span>ID</span></div>
                    <div class="col c-4"><span>Sản phẩm</span></div>
                    <div class="col c-2"><span>Chi tiết</span></div>
                    <div class="col c-2"><span>Số lượng</span></div>
                    <div class="col c-3"><span>Ghi chú</span></div>
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
                        $image=explode("|",$dataProduct['image'])[0];
                        $path='./includes/images/';
                        $image=$path.$image;
                        $codeProduct=$dataProduct['code'];


                        // echo '<pre>';print_r($dataProduct);echo '</pre>';
                ?>      
                    <div class="row od-product--row-item">
                        <div class="col c-1"><a href="san-pham?id=<?php echo $idProduct; ?>"><?php echo $codeProduct;?></a></div>
                        <div class="col c-4 od-product-item">
                            <div class="od-product-image">
                                <a href="san-pham?id=<?php echo $idProduct; ?>">
                                    <img src="<?php echo $image ?>" alt="">
                                </a>
                            </div>
                            <div class="od-product-name">
                                <a href="san-pham?id=<?php echo $idProduct; ?>">
                                    <span><?php echo $dataProduct['name'] ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="col c-2">
                            <span><?php echo $color;?></span>,
                            <span>Size <?php echo $size;?></span>
                        </div>
                        <div class="col c-2 "><span><?php echo $amount;?></span></div>
                        <div class="col c-3"><span class="od-note-title">Ghi chú : </span><span><?php echo $note;?></span></div>
                    </div>
                <?php
                    }
                ?>
        </div>

        </div>
        <div class="od-price">
            <span class="od-price--title">Tổng thanh toán :</span>
            <span class="od-price-total"><?php echo $dataOrder['price'] ?></span>
            <span class="od-price-unit">VNĐ</span>
        </div>
    </div>

<script src="./modules/admin/js/admin.js"></script>
</body>
</html>