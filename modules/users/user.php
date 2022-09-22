<?php
    // ini_set('display_errors',1);
    if(isset($_SESSION['user-email'])){
        include_once './modules/handle/connect-database.php';
        include_once './modules/users/header-html-tag.php';
        include_once './modules/users/header-top.php';
        include_once './modules/users/header.php';


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
            <a href="">
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
            <a href="" class="uo-item active">
                <span>Tất cả</span>
            </a>
            <a href="" class="uo-item">
                <span>Chờ xác nhận</span>
            </a>
            <a href="" class="uo-item">
                <span>Chờ lấy hàng</span>
            </a>
            <a href="" class="uo-item">
                <span>Đang giao hàng</span>
            </a>
            <a href="" class="uo-item">
                <span>Hoàn thành</span>
            </a>
        </div>

        <!-- user with no order -->
        <!-- <div class="uo-row-no-item"><span>Bạn chưa có đơn hàng nào</span></div> -->

        <a href="" class="uo-order">
            <div class="uo-status">Chờ xác nhận</div>
            <div class="uo-o-item row">
                <div class="col c-1">
                    <div class="uoo-item-image">
                        <img src="./includes/images/220829kCz0XKqmE.jpg" alt="">
                    </div>
                </div>
                <div class="col c-4">
                    <div class="uoo-item-desc">
                        <div class="uoo-item-name">
                            <span>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lo Lorem ipsum dolor sit m dolor sit amet Lo Lorem ipsum dolor sitamet Lo</span>
                        </div>
                        <div class="uoo-item-amount">
                            <span>SL : </span><span style="color:red">1</span>
                        </div>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-size">
                        <span>Phân loại hàng :</span>
                        <span>Size </span><span style="color:red">S</span>,
                        <span style="color:red">Xanh</span>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-price">
                        <span style="color:red">39000</span><span> VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="uo-o-item row">
                <div class="col c-1">
                    <div class="uoo-item-image">
                        <img src="./includes/images/220829kCz0XKqmE.jpg" alt="">
                    </div>
                </div>
                <div class="col c-4">
                    <div class="uoo-item-desc">
                        <div class="uoo-item-name">
                            <span>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lo Lorem ipsum dolor sit m dolor sit amet Lo Lorem ipsum dolor sitamet Lo</span>
                        </div>
                        <div class="uoo-item-amount">
                            <span>SL : </span><span style="color:red">1</span>
                        </div>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-size">
                        <span>Phân loại hàng :</span>
                        <span>Size </span><span style="color:red">S</span>,
                        <span style="color:red">Xanh</span>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-price">
                        <span style="color:red">39000</span><span> VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="uo-price">
                <span>Tổng số tiền : </span>
                <span class="uo-price-total">289000</span><span> VNĐ</span>
            </div>
        </a>
        <a href="" class="uo-order">
            <div class="uo-status">Chờ xác nhận</div>
            <div class="uo-o-item row">
                <div class="col c-1">
                    <div class="uoo-item-image">
                        <img src="./includes/images/220829kCz0XKqmE.jpg" alt="">
                    </div>
                </div>
                <div class="col c-4">
                    <div class="uoo-item-desc">
                        <div class="uoo-item-name">
                            <span>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lo Lorem ipsum dolor sit m dolor sit amet Lo Lorem ipsum dolor sitamet Lo</span>
                        </div>
                        <div class="uoo-item-amount">
                            <span>SL : </span><span style="color:red">1</span>
                        </div>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-size">
                        <span>Phân loại hàng :</span>
                        <span>Size </span><span style="color:red">S</span>,
                        <span style="color:red">Xanh</span>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-price">
                        <span style="color:red">39000</span><span> VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="uo-o-item row">
                <div class="col c-1">
                    <div class="uoo-item-image">
                        <img src="./includes/images/220829kCz0XKqmE.jpg" alt="">
                    </div>
                </div>
                <div class="col c-4">
                    <div class="uoo-item-desc">
                        <div class="uoo-item-name">
                            <span>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lo Lorem ipsum dolor sit m dolor sit amet Lo Lorem ipsum dolor sitamet Lo</span>
                        </div>
                        <div class="uoo-item-amount">
                            <span>SL : </span><span style="color:red">1</span>
                        </div>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-size">
                        <span>Phân loại hàng :</span>
                        <span>Size </span><span style="color:red">S</span>,
                        <span style="color:red">Xanh</span>
                    </div>
                </div>
                <div class="col c-3">
                    <div class="uoo-item-price">
                        <span style="color:red">39000</span><span> VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="uo-price">
                <span>Tổng số tiền : </span>
                <span class="uo-price-total">289000</span><span> VNĐ</span>
            </div>
        </a>
    </div>
    
</div>

<?php
        include_once './modules/users/footer.php';
        include_once './modules/users/footer-html-tag.php';
    }else{
        header('Location: trang-chu');
    }
