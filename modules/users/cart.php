<?php
    // session_start();
    if(isset($_SESSION['user-email'])){
    include_once './modules/users/header-html-tag.php';
?>
    <div class="cart-detail">
       <?php
            include_once './modules/users/header-top.php';
            include_once './modules/handle/connect-database.php';

                // get all product from database
                
                $allProduct=array();
                $dataCart=array();
                if($connect){
                    $sql2='select * from product';
                    $result=mysqli_query($connect,$sql2);
                    while($row=mysqli_fetch_array($result)){
                        array_push($allProduct,$row);
                    }
                    // $sql='select product from  cart where id= (select cartid from user where id='.$userid.')';
                    $sql="select * from cart where userId=(select id from user where email='".$_SESSION['user-email']."')";
                    $result=mysqli_query($connect,$sql);
                    while ($row=mysqli_fetch_array($result)){
                        array_push($dataCart,$row);
                    }
                    // ngan cach cac id san pham bang '|'
                    // $dataCart=explode("|",$dataCart[0]['product']);
                }
                // echo '<pre>';print_r($allProduct);
                // echo '<pre>';print_r($dataCart);

       ?>

      <!-- cart heading -->
      <div class="cart-heading">
          <div class="cart-heading-logo">
            <a href="trang-chu">
                <img src="./includes/images/logo-coza-store.png" alt="">
            </a>
          </div>
          <div class="cart-heading-title">Giỏ Hàng</div>
      </div>

      <!-- cart table head-->
      <form action="hoa-don" method="POST">
        <div class="cart-row-head">
            <div class="cart-col--1">
                <input type="checkbox" name="" value="">
            </div>
            <div class="cart-col--2">
                <p>Sản Phẩm</p>
            </div>
            <div class="cart-col--6">
            </div>
            <div class="cart-col--7">
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
            for($i=0;$i<count($dataCart);$i++){
                // $item=explode("-",$dataCart[$i]);
                foreach($allProduct as $key=>$value){
                if($dataCart[$i]['productId']==$value['id']){
                    $image=explode("|",$value['image'])[0];
                    $path='./includes/images/';
                    $image=$path.$image;
                    $name=$value['name'];
                    $desc=$value['description'];
                    $amount=$dataCart[$i]['amount'];
        ?>
            <div class="cart-row">
                <div class="cart-col--1">
                    <input type="checkbox" name="item-buy[]" value="<?php echo $value['id']."-".$amount ?>">
                </div>
                <div class="cart-col--2">
                    <div class="cart-item-img">
                        <a href="san-pham?id=<?php echo $value['id']; ?>">
                            <img src="<?php echo $image; ?>" alt="">
                        </a>
                    </div>
                    <div class="">
                        <div class="cart-item-desc">
                            <a href="san-pham?id=<?php echo $value['id']; ?>"><?php echo $desc; ?></a>
                        </div>
                        <div class="cart-item-code"><span><?php echo $value['code'] ?></span></div>
                    </div>
                </div>
                <div class="cart-col--6">
                    
                </div>
                <div class="cart-col--7">
                    
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
                    <span class="cart-item-price"><?php echo $value['price']; ?></span>
                    <span> VNĐ</span>
                </div>
                <div class="cart-col--5">
                    <a href="#" onclick="return confirmDelete(<?php echo $i?>);">Xóa</a>
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
    <script>
        function confirmDelete(index) {
                if (confirm("Bạn có muốn xóa sản phẩm này?")) {
                    // If the user clicks "OK," navigate to the delete-product-cart.php with the index.
                    window.location.href = "./handle/delete-product-cart.php?index=" + index;
                }
                // If the user clicks "Cancel" or closes the dialog, the navigation won't happen.
                return false;
            }
    </script>
    <script src="./modules/users/js/cart-detail.js"></script>
<?php
    include './modules/users/footer-html-tag.php';
    }
?>