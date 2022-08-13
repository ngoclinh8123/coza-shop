<?php
    session_start();
    include './header-html-tag.php';
?>
    <div class="cart-detail">
       <?php
            include './header-top.php';
            include '../handle/connect-database.php';

                // get all product from database
                $userid=$_SESSION['id'];
                $allProduct=array();
                $dataCart=array();
                if($connect){
                    $sql2='select * from product';
                    $result=mysqli_query($connect,$sql2);
                    while($row=mysqli_fetch_array($result)){
                        array_push($allProduct,$row);
                    }
                    $sql='select product from  cart where id= (select cartid from user where id='.$userid.')';
                    $result=mysqli_query($connect,$sql);
                    while ($row=mysqli_fetch_array($result)){
                        array_push($dataCart,$row);
                    }
                    // ngan cach cac id san pham bang '|'
                    $dataCart=explode("|",$dataCart[0]['product']);
                }
                // echo '<pre>';print_r($allProduct);
                // echo '<pre>';print_r($dataCart);

       ?>

      <!-- cart heading -->
      <div class="cart-heading">
          <div class="cart-heading-logo">
            <a href="./index.html">
                <img src="../../includes/images/logo-coza-store.png" alt="">
            </a>
          </div>
          <div class="cart-heading-title">Giỏ Hàng</div>
      </div>

      <!-- cart table head-->
      <form action="./bill.php" method="POST">
        <div class="cart-row-head">
            <div class="cart-col--1">
                <input type="checkbox" name="" value="">
            </div>
            <div class="cart-col--2">
                <p>Sản Phẩm</p>
            </div>
            <div class="cart-col--6">
                <p>Size</p>
            </div>
            <div class="cart-col--7">
                <p>Màu sắc</p>
            </div>
            <div class="cart-col--3">
                <p>Số lượng</p>
            </div>
            <div class="cart-col--4">
                <p>Số Tiền</p>
            </div>
            <div class="cart-col--5">
                <p>Thao tác</p>
            </div>
        </div>

        <?php
            for($i=1;$i<count($dataCart);$i++){
                $item=explode("-",$dataCart[$i]);
                foreach($allProduct as $key=>$value){
                if($item[0]==$value['id']){
                    $image=explode("|",$value['productimage'])[0];
                    $name=$value['productname'];
                    $size=$item[1];
                    $color=$item[2];
                    $desc=$value['productdescription'];
                    $amount=$item[3];
        ?>
            <div class="cart-row">
                <div class="cart-col--1">
                    <input type="checkbox" name="item-buy[]" value="<?php echo $value['id']."-".$amount."-".$size."-".$color; ?>">
                </div>
                <div class="cart-col--2">
                    <div class="cart-item-img">
                        <a href="./product-detail.php?id=<?php echo $value['id']; ?>">
                            <img src="<?php echo $image; ?>" alt="">
                        </a>
                    </div>
                    <div class="cart-item-desc">
                        <a href="./product-detail.php?id=<?php echo $value['id']; ?>"><?php echo $desc; ?></a>
                    </div>
                </div>
                <div class="cart-col--6">
                    <span>Size</span>
                    <span><?php echo $item[1]; ?></span>
                </div>
                <div class="cart-col--7">
                    <span><?php echo $item[2]; ?></span>
                </div>
                <div class="cart-col--3">
                    <div class="cart-item-dec cart-item-button">
                        <span>-</span>
                    </div>
                    <div class="cart-item-amount cart-item-button">
                        <span class=""><?php echo $amount; ?></span>
                    </div>
                    <div class="cart-item-inc cart-item-button">
                        <span>+</span>
                    </div>
                </div>
                <div class="cart-col--4">
                    <span class="cart-item-price"><?php echo $value['productprice']; ?></span>
                    <span> VNĐ</span>
                </div>
                <div class="cart-col--5">
                    <a href="../handle/delete-product-cart.php?index=<?php echo $i?>">Xóa</a>
                </div>
            </div>

        <?php  
                    }
                }
            }
        ?>

        <div class="cart-row-foot">
            <div class="cart-select-all">
                <input type="checkbox">
                <span>Chọn Tất Cả( <span class="total-item-tag">0</span> )</span>
            </div>
            <div class="cart-mony-total">
                <span>Tổng Thanh Toán(</span>
                <span class="total-item-select">0</span>
                <span>Sản Phẩm):</span>
                <p class="cart-total-price">0</p>
                <p>VNĐ</p>
            </div>
            <div class="cart-buy-button">
                <span class="fakeButton">Mua hàng</span>
                <input type="submit" value="Mua hàng">
            </div>
        </div>

      </form>
    </div>
    <script src="./js/cart-detail.js"></script>
<?php
    include './footer-html-tag.php';
?>