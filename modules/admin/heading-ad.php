<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kênh người bán</title>
    <link rel="icon" href="./includes/images/logo-icon-cat.png" type="image/x-icon" />

    <link rel="stylesheet" href="./includes/fonts/poppins/Poppins-Regular.ttf">
    <link rel="stylesheet" href="./includes/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./modules/admin/css/style.css">
    <link rel="stylesheet" href="./modules/users/css/grid.css">
    <link rel="stylesheet" href="./modules/admin/css/reponsive.css">
    
</head>
<body>
    <div class="ad-wrap">
        <div class="ad-heading"></div>
        <div class="ad-body">
            <!-- navigation -->
            <div class="ad-nav">
                <div class="ad-nav-wrap">
                    <div class="ad-nav-logo-wrap">
                        <a href=".">
                            <div class="ad-nav-img">
                                <img src="./includes/images/logo-coza-store.png" alt="">
                            </div>
                        </a>
                    </div>
                    <!-- <div class="ad-nav-heading">Kênh Người Bán</div> -->
                    <div class="ad-nav-item">
                        <span class="ad-nav-item-title">Thống kê</span>
                        <div class="ad-subnav-list">
                            <div class="ad-subnav-item"><a href="doanh-so-ban-hang">Doanh số bán hàng</a></div>
                        </div>
                    </div>
                    <div class="ad-nav-item">
                        <span class="ad-nav-item-title">Sản phẩm</span>
                        <div class="ad-subnav-list">
                            <div class="ad-subnav-item"><a href="danh-sach-san-pham">Tất cả sản phẩm</a></div>
                            <div class="ad-subnav-item"><a href="them-san-pham">Thêm sản phẩm</a></div>
                            <div class="ad-subnav-item"><a href="them-phan-loai">Thêm phân loại</a></div>
                        </div>
                    </div>
                    <div class="ad-nav-item">
                        <span class="ad-nav-item-title">Đơn hàng</span>
                        <div class="ad-subnav-list">
                            <div class="ad-subnav-item"><a href="danh-sach-don-hang">Đơn đặt hàng</a></div>
                        </div>
                    </div>
                    <div class="ad-nav-item">
                        <span class="ad-nav-item-title">Khách hàng</span>
                        <div class="ad-subnav-list">
                            <div class="ad-subnav-item"><a href="">Danh sách khách hàng</a></div>
                        </div>
                    </div>
                    <div class="ad-nav-item">
                        <span class="ad-nav-item-title">Tài khoản</span>
                        <div class="ad-subnav-list">
                            <div class="ad-subnav-item"><a href="them-nguoi-ban">Thêm người bán</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                ini_set('display_errors','off');
            ?>