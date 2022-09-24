<?php
    $routers=array(
        'trang-chu'=>'modules/users/home.php',
        'tat-ca-san-pham'=>'modules/users/list-all-product.php',
        'dang-nhap'=>'modules/users/login-form.php',
        'dang-ky'=>'modules/users/register-form.php',
        'san-pham'=>'modules/users/product-detail.php',
        'tin-tuc'=>'modules/users/blog.php',
        'gio-hang'=>'modules/users/cart.php',
        'dia-chi-nhan-hang'=>'modules/users/add-address.php',
        'thoi-trang-nam'=>'modules/users/list-men-product.php',
        'thoi-trang-nu'=>'modules/users/list-women-product.php',
        'giay-dep'=>'modules/users/list-shoe-product.php',
        'tui-xach'=>'modules/users/list-bag-product.php',
        'cua-hang'=>'modules/users/shop.php',
        'dong-ho'=>'modules/users/list-watch-product.php',
        'tim-kiem'=>'modules/handle/search.php',
        'don-hang'=>'modules/users/user.php',

        'xu-ly-dat-hang'=>'modules/users/order-handle.php',
        'hoa-don'=>'modules/users/bill.php',
        'xu-ly-them-dia-chi'=>'modules/handle/add-address.php',
        'xu-ly-xoa-dia-chi'=>'modules/handle/delete-address.php',

    );

    $routerAdmin=array(
        'danh-sach-san-pham'=>'modules/admin/list-product.php',
        'danh-sach-don-hang'=>'modules/admin/orders.php',
        'doanh-so-ban-hang'=>'modules/admin/turnover.php',
        'xu-li-xoa-san-pham'=>'modules/admin/delete-product.php',
        'them-san-pham'=>'modules/admin/add-product.php',
        'xoa-san-pham'=>'modules/admin/delete-product.php',
        'sua-san-pham'=>'modules/admin/edit-product.php',
        'them-phan-loai'=>'modules/admin/add-class.php',
    
        'them-nguoi-ban'=>'modules/admin/add-admin.php',
        'don-hang'=>'modules/admin/order-detail.php',
        'xu-ly-them-phan-loai'=>'modules/handle/add-class.php',
        'xu-ly-xoa-class'=>'modules/handle/delete-class.php',
        'xu-ly-xoa-size'=>'modules/handle/delete-size.php',
        'xu-ly-them-size'=>'modules/handle/add-size.php',
        'xu-ly-xoa-don-hang'=>'modules/handle/delete-order.php',
        'xu-ly-doi-trang-thai-don-hang'=>'modules/handle/change-title-order.php',
        'xu-ly-van-chuyen'=>'modules/handle/ship-order.php',
    );
?>
