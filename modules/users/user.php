<?php
    ini_set('display_errors',1);
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
            <a href="" class="uo-item">
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
    </div>
    
</div>

<?php
        include_once './modules/users/footer.php';
        include_once './modules/users/footer-html-tag.php';
    }else{
        header('Location: trang-chu');
    }
