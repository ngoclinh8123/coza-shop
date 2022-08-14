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
        </div>
        <div class="od-product">
            <div class="od-product--title">
                <span>Sản phẩm</span>
            </div>
            <div class="od-product--row">
                <div class="row od-product--row-heading">
                    <div class="col c-1 m-1 l-1"><span>ID</span></div>
                    <div class="col c-7 m-7 l-4"><span>Sản phẩm</span></div>
                    <div class="col c-2 m-2 l-1"><span>Màu sắc</span></div>
                    <div class="col c-2 m-2 l-1"><span>Size</span></div>
                    <div class="col c-12 m-12 l-5 hide-on-mobile-tablet "><span>Ghi chú</span></div>
                </div>
                <div class="row od-product--row-item">
                    <div class="col c-1 m-1 l-1"><span>35</span></div>
                    <div class="col c-7 m-7 l-4 od-product-item">
                        <div class="od-product-image">
                            <img src="../../includes/images/220531jInk7W1pz.jpg" alt="">
                        </div>
                        <div class="ad-product-name">
                            <span>Lorem ipsum dolor sit amet, consectetur adipis Lorem ipsum dolor sit</span>
                        </div>
                    </div>
                    <div class="col c-2 m-2 l-1"><span>Xanh den</span></div>
                    <div class="col c-2 m-2 l-1"><span>Size M</span></div>
                    <div class="col c-12 m-5 l-5"><span class="od-note-title">Ghi chú : </span><span>Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit</span></div>
                </div>
            </div>
        </div>
    </div>

<script src="./js/admin.js"></script>
</body>
</html>