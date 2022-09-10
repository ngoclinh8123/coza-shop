<?php
    $routers=array(
        'trang-chu'=>'modules/users/home.php',
        'tat-ca-san-pham'=>'modules/users/list-all-product.php',
        'dang-nhap'=>'modules/users/login-form.php',
        'dang-ky'=>'modules/users/register-form.php',
        'san-pham'=>'modules/users/product-detail.php',
        'tin-tuc'=>'modules/users/blog.php',
        'gio-hang'=>'modules/users/cart.php',
        'hoa-don'=>'modules/users/bill.php',
        'dia-chi-nhan-hang'=>'modules/users/add-address.php',
        'xu-ly-dat-hang'=>'modules/users/order-handle.php',
        'xu-ly-them-dia-chi'=>'modules/handle/add-address.php',
        'xu-ly-xoa-dia-chi'=>'modules/handle/delete-address.php',
        'thoi-trang-nam'=>'modules/users/list-men-product.php',
        'thoi-trang-nu'=>'modules/users/list-women-product.php',
        'giay-dep'=>'modules/users/list-shoe-product.php',
        'tui-xach'=>'modules/users/list-bag-product.php',
        'dong-ho'=>'modules/users/list-watch-product.php',
        'xu-ly-xoa-don-hang'=>'modules/handle/delete-order.php',
        'xu-ly-doi-trang-thai-don-hang'=>'modules/handle/change-title-order.php',
        'tim-kiem'=>'modules/handle/search.php',

    );

    $routerAdmin=array(
        'danh-sach-san-pham'=>'modules/admin/list-product.php',
        'danh-sach-don-hang'=>'modules/admin/orders.php',
        'doanh-so-ban-hang'=>'modules/admin/turnover.php',
        'xu-li-xoa-san-pham'=>'modules/admin/delete-product.php',
        'them-san-pham'=>'modules/admin/add-product.php',
        'xoa-san-pham'=>'modules/admin/delete-product.php',
        'sua-san-pham'=>'modules/admin/edit-product.php',
    
        'them-nguoi-ban'=>'modules/admin/add-admin.php',
        'don-hang'=>'modules/admin/order-detail.php',
    );
?>
