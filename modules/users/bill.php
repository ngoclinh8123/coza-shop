<?php
    session_start();
    include './header-html-tag.php';
    include '../handle/connect-database.php';
    include '../handle/get-user-info.php';
?> 
<div class="bill-wrap">
    <?php
        $itemBuy=array();
        $itemBuyString="";
        if(isset($_POST['item-buy'])){
            $itemBuy=$_POST['item-buy'];
            $itemBuyNewArray=array();
            foreach($itemBuy as $key=>$value){
                array_push($itemBuyNewArray,explode('-',$value)[0]);
            }
            $itemBuyString=implode(',',$itemBuyNewArray);
        }else if(isset($_GET['item'])){
            $itemBuy=$_GET['item'];
            $itemBuyString=explode('-',$itemBuy)[0];
        }
        // echo '<pre>';print_r($itemBuy);echo '</pre>';
        // echo '<pre>';print_r($userdata);echo '</pre>';
        
        
        $dataProduct=array();
        if($connect){
            $sql="select * from product where id in(".$itemBuyString.")";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataProduct,$row);
            }
        }
        // echo '<pre>';print_r($dataProduct);echo '</pre>';
        
        $name="";
        $phone="";
        $address="";
        $dataAddress=array(); 
        if($connect){
            $sql='select * from address where userId ='.$userdata['id'];
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                array_push($dataAddress,$row);
            }
        }
        // nếu không có dữ liệu địa chỉ trước thì lấy từ mặc định của user
        // echo '<pre>';print_r($dataAddress);echo '</pre>';
        if(count($dataAddress)==0){
            
        }
    ?>
    <div class="bill-head">
        <div class="bill-head-img">
            <a href="./home.php">
                <img src="../../includes/images/logo-coza-store.png" alt="" />
            </a>
        </div>
        <div class="bill-head-title">
            <span>Thanh Toán</span>
        </div>
    </div>
    <form action="./order-handle.php" method="post" class="bill-body">
        <div class="bill-row">
            <div class="row row-address-title">
                <div class="bill-row-title col c-8">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Địa Chỉ Nhận Hàng</span>
                </div>
                <div class="bill-row-edit-address">
                    <a href="./add-address.php">Thiết lập địa chỉ</a>
                </div>
            </div>

            <?php if(count($dataAddress) > 0){ ?>

                <div class="row bill-address-default">
                    <div class="col c-3">
                        <div class="bill-user bill-user-default"><?php echo $dataAddress[0]['username'] ?></div>
                        <input type="text" name="bill-user" hidden class="bill-user-input" value="<?php echo $dataAddress[0]['username'] ?>">
                        <div class="bill-phone bill-phone-default"><?php echo $dataAddress[0]['phone'] ?></div>
                        <input type="text" name="bill-phone" hidden class="bill-phone-input" value="<?php echo $dataAddress[0]['phone'] ?>">
                    </div>
                    <div class="col c-7">
                        <span class="bill-address bill-address-extra"><?php echo $dataAddress[0]['address'] ?></span>
                        <input type="text" name="bill-address" hidden class="bill-address-input" value="<?php echo $dataAddress[0]['address'] ?>">
                    </div>
                    <div class="col c-2">
                        <span class="bill-edit-address">Thay đổi</span>
                    </div>
                </div>

            <?php } ?>
                
            <div class="bill-aa-container">
                <?php
                    for($i=0;$i<count($dataAddress);$i++){
                ?>
                    <div class="aa-row">
                        <?php
                            if($i==0){
                                echo '<input type="radio" name="bill-aa-address" value="'.$dataAddress[$i]['id'].'" id="bill-aa-address--'.$dataAddress[$i]['id'].'" checked="checked">';
                            }else{
                                echo '<input type="radio" name="bill-aa-address" value="'.$dataAddress[$i]['id'].'" id="bill-aa-address--'.$dataAddress[$i]['id'].'">';
                            }
                        ?>
                        <label for="bill-aa-address--<?php echo $dataAddress[$i]['id'] ?>" class="">
                            <span class="bill-user"><?php echo $dataAddress[$i]['username']; ?></span>
                            <span class="bill-span">(</span><span class="bill-phone"><?php echo $dataAddress[$i]['phone']; ?></span><span class="bill-span">) - </span>
                            <span class="bill-address"><?php echo $dataAddress[$i]['address']; ?></span>
                        </label>
                    </div>
                <?php
                    }
                ?>
                <div class="aa-row">
                    <span class="aa-change-confirm">Hoàn thành</span>
                    <span class="aa-change-return">Trở lại</span>
                </div>
            </div>
        </div>
        <div class="bill-row">
            <div class="bill-product-title">
                <span>Sản Phẩm</span>
            </div>
        </div>
        
        <?php
            $image="";
            $name="";
            $price="";
            $amount="";
            $size="";
            $color="";
            $idProduct="";
            if(isset($_POST['item-buy'])){
                foreach ($itemBuy as $key=>$value){
                    $idProduct=explode("-",$value)[0];
                    $amount=explode("-",$value)[1];
                    $size=explode("-",$value)[2];
                    $color=explode("-",$value)[3];
                    foreach($dataProduct as $key2=>$value2){
                        if($idProduct==$value2['id']){
                            $image=explode("|",$value2['productimage'])[0];
                            $name=$value2['productname'];
                            $price=$value2['productprice'];

        ?>
                                <div class="bill-row">
                                    <div class="row bill-row-product">
                                        <input type="text" name="item-buy[]" value="<?php echo $value ?>" hidden>
                                        <div class="col c-1">
                                            <div class="bill-product-img">
                                                <img src="<?php echo $image ?>" alt="" />
                                            </div>
                                        </div>
                                        <div class="col c-5">
                                            <div class="bill-product-name">
                                                <span><?php echo $name; ?></span
                                                >
                                            </div>
                                        </div>
                                        <div class="col c-3">
                                            <div class="bill-product-detail">
                                                <span class="bill-product-detail-size">Size <?php echo $size; ?></span
                                                ><span>,</span>
                                                <span class="bill-product-detail-color"><?php echo $color; ?></span>
                                            </div>
                                        </div>
                                        <div class="col c-1">
                                            <div class="bill-product-amount">
                                                <span>Số lượng :</span><span class="bill-product-amount-tag"><?php echo $amount; ?></span>
                                            </div>
                                        </div>
                                        <div class="col c-2">
                                        <div class="bill-product-price">
                                            <span class="bill-product-price-tag"><?php echo $price; ?></span>
                                            <span>VNĐ</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row bill-row-message">
                                        <span class="bill-row-message-title">Lời nhắn :</span>
                                        <input
                                        type="text"
                                        class="bill-row-message-input"
                                        placeholder="Lưu ý cho người bán..." name="message[]"
                                        />
                                    </div>
                                </div>
        
        <?php
                    }
                }
            }


            }else if(isset($_GET['item'])){
                $dataProduct=$dataProduct[0];
                $image=explode("|",$dataProduct['productimage'])[0];
                $name=$dataProduct['productname'];
                $price=$dataProduct['productprice'];
                $amount=explode("-",$_GET['item'])[1];
                $size=explode("-",$_GET['item'])[2];
                $color=explode("-",$_GET['item'])[3];
                $idProduct=explode("-",$_GET['item'])[0];
        ?>
                    <div class="bill-row">
                        <div class="row bill-row-product">
                            <input type="text" name="item-buy[]" value="<?php echo $value ?>" hidden>
                            <div class="col c-1">
                                <div class="bill-product-img">
                                    <img src="<?php echo $image ?>" alt="" />
                                </div>
                            </div>
                            <div class="col c-5">
                                <div class="bill-product-name">
                                    <span><?php echo $name; ?></span
                                    >
                                </div>
                            </div>
                            <div class="col c-3">
                                <div class="bill-product-detail">
                                    <span class="bill-product-detail-size">Size <?php echo $size; ?></span
                                    ><span>,</span>
                                    <span class="bill-product-detail-color"><?php echo $color; ?></span>
                                </div>
                            </div>
                            <div class="col c-1">
                                <div class="bill-product-amount">
                                    <span>Số lượng :</span><span class="bill-product-amount-tag"><?php echo $amount; ?></span>
                                </div>
                            </div>
                            <div class="col c-2">
                            <div class="bill-product-price">
                                <span class="bill-product-price-tag"><?php echo $price; ?></span>
                                <span>VNĐ</span>
                            </div>
                            </div>
                        </div>
                        <div class="row bill-row-message">
                            <span class="bill-row-message-title">Lời nhắn :</span>
                            <input
                            type="text"
                            class="bill-row-message-input"
                            placeholder="Lưu ý cho người bán..." name="message[]"
                            />
                        </div>
                    </div>
        <?php
            }
        ?>

        <div class="bill-row">
            <div class="row bill-row-bottom">
                <div class="col c-8"></div>
                <div class="col c-2">Tổng tiền hàng</div>
                <div class="col c-2">
                <span class="bill-total-price">0</span>
                <input type="text" name="bill-total-price" class="name-total-price-input" hidden>
                <span>VNĐ</span>
                </div>
            </div>
            <div class="row bill-row-bottom">
                <div class="col c-8"></div>
                <div class="col c-2">Phí vận chuyển</div>
                <div class="col c-2">
                <span class="ship">30000</span>
                <span>VNĐ</span>
                </div>
            </div>
            <div class="row bill-row-bottom">
                <div class="col c-8"></div>
                <div class="col c-2">Tổng thanh toán</div>
                <div class="col c-2">
                <span class="bill-total">0</span>
                <input type="text" name="bill-total" class="bill-total-input" hidden value="0">
                <span>VNĐ</span>
                </div>
            </div>
            <div class="row bill-row-copyright">
                <div class="col c-9">
                    <span
                        >Nhấn "Đặt hàng" đồng nghĩa với việc bạn tuân theo
                        <a href="">Điều khoản</a></span
                    >
                </div>
                <div class="col c-3">
                    
                        <input type="text" value="" name="confirm" hidden>
                        <input type="submit" value="Đặt hàng" />
                

                    <!-- insert into orders(userId,product,price,address,phone,username,timeorder) values(1,"12-sizeS-do|14-size39-den","358000","ngoc hoi, dong da, ha noi","0242334","ngoc anh","13:12:30-24/12/2022") -->
                </div>
            </div>
        </div>
    </form>
</div>
<script src="./js/bill.js"></script>
<?php
    include './footer-html-tag.php';
?>